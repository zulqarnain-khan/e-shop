<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Categories;
use Intervention\Image\Exception\NotReadableException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use App\Image;
use App\Http\Requests\StoreImage;
use Illuminate\Support\Facades\Storage;
use File;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Categories::get();
        return view('admin.categories.index',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
        if ($request->hasFile('image')) :
            $path = $request->file('image')->store('product/category', 's3');
            $images = Storage::disk('s3')->url($path, 'public');
        else:
            $images = '';
        endif;
        $category= new Categories;
        $category->name = $request->name;
        $category->slug  = $this->createSlug($request->name);
        $category->image  = $images;
        $category->is_header  = $isChecked;
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
        $category = Categories::where('id','=', $id)->first()->toArray();
        return view('admin/categories/edit',['category'=>$category]);
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
        $category= Categories::find($id);
        $category->name = $request->name;
        $category->slug  = $this->createSlug($request->name,$id);
        $category->is_header  = $isChecked;

        if ($request->hasFile('image')) :
            $path = $request->file('image')->store('product/category', 's3');
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
        Categories::where('id', $id)->delete();
        return redirect('admin/categories/list');
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
        return Categories::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
