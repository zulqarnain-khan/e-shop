<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Brands;
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

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $data['brands'] = Brands::with('subcategory','category')->get();
        return view('admin.brands.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Categories::get();
        $data['sub_categories'] = SubCategory::get();
        return view('admin.brands.create', $data);
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
        $brand= new Brands;
        $brand->name = $request->name;
        $brand->slug  = $this->createSlug($request->name);
        $brand->category_id = $request->category_id;
        $brand->sub_category_id = $request->sub_category_id;
        $brand->is_header  = $isChecked;
        if ($request->hasFile('image')) :
            $path = $request->file('image')->store('product/brands', 's3');
            $images = Storage::disk('s3')->url($path);
        else:
            $images = '';
        endif;

        $brand->image  = $images;
        if($brand->save()){
            return response(['success' => true,'slug' => $brand->slug], Response::HTTP_OK);
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
        $data['brand'] = Brands::where('id','=', $id)->first()->toArray();
        $data['categories'] = Categories::get();
        $data['sub_categories'] = SubCategory::get();
        return view('admin/brands/edit',$data);
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
        $brand= Brands::find($id);
        $brand->name = $request->name;
        $brand->slug  = $this->createSlug($request->name,$id);
        $brand->category_id = $request->category_id;
        $brand->sub_category_id = $request->sub_category_id;
        $brand->is_header  = $isChecked;
        if ($request->hasFile('image')) :
            $path = $request->file('image')->store('product/brands', 's3');
            $images = Storage::disk('s3')->url($path);
            $brand->image  = $images;
        endif;
        
        if($brand->save()){
            return response(['success' => true,'slug' => $brand->slug], Response::HTTP_OK);
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
        Brands::where('id', $id)->delete();
        return redirect('admin/brands/list');
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
