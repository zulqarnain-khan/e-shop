<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Categories;
use App\Models\admin\SubCategory;
use App\Image;
use App\Http\Requests\StoreImage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotReadableException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use File;
use DB;
class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sub_categories'] = SubCategory::with('category')->get();
        return view('admin.sub-categories.index',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Categories::get();
        return view('admin.sub-categories.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isChecked = $request->has('is_head');
        $category= new SubCategory;
        $category->name = $request->name;
        $category->slug  = $this->createSlug($request->name);
        $category->category_id = $request->category_id;
        $category->is_header  = $isChecked;
        if ($request->hasFile('image')) :
            $path = $request->file('image')->store('/product/subcategory', 's3');
            $images = Storage::disk('s3')->url($path);
        else:
            $images = '';
        endif;

        $category->image  = $images;
        
        if($category->save()){
            return response(['success' => true,'slug' => $category->slug], Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = SubCategory::where('id','=', $id)->first()->toArray();
        $categories = Categories::get();
        return view('admin/sub-categories/edit',['subcategory'=>$subcategory,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $isChecked = $request->has('is_head');
        $category= SubCategory::find($id);
        $category->name = $request->name;
        $category->slug  = $this->createSlug($request->name,$id);
        $category->category_id = $request->category_id;
        $category->is_header  = $isChecked;
        if ($request->hasFile('image')) :
            $path = $request->file('image')->store('/product/subcategory', 's3');
            $images = Storage::disk('s3')->url($path);
            
            $category->image  = $images;
        endif;

        if($category->save()){
            return response(['success' => true,'slug' => $category->slug], Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::where('id', $id)->delete();
        return redirect('admin/sub-categories/list');
    }
    public function createSlug($title, $id = 0) {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10000; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0) {
        return SubCategory::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
