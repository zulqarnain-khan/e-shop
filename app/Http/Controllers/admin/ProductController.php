<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Products;
use App\Models\admin\Brands;
use App\Models\admin\Categories;
use App\Models\admin\SubCategory;
use Illuminate\Http\Request;
use App\Image;
use App\Http\Requests\StoreImage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotReadableException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use App\Http\Requests\ProductValidation;
use File;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Products::with('subcategory','category','brands')->get();
        return view('admin.products.list',$data);
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
        $data['brands'] = Brands::get();
        return view('admin.products.new_product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidation $request)
    {
        $product = new Products;
        $product->pro_title = $request->pro_title;
        $product->pro_slug  = $this->createSlug($request->pro_title);
        $product->pro_price = $request->pro_price;
        $product->pro_quantity = $request->pro_quantity;
        $product->pro_size = $request->pro_size;
       
        if ($request->hasFile('image')) :
           $path = $request->file('image')->store('/product', 's3');
            $images = Storage::disk('s3')->url($path);
        else:
            $images = '';
        endif;

        $product->pro_img  = $images;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->pro_short_description = $request->pro_short_description;
        $product->pro_long_description = $request->pro_long_description;

        if($product->save()){
            return redirect()->back()->with('message', 'Product added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.products.new_product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Products::where('id','=', $id)->first()->toArray();
        $data['categories'] = Categories::get();
        $data['sub_categories'] = SubCategory::get();
        $data['brands'] = Brands::get();
        return view('admin.products.edit', $data);
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
        $product = Products::find($id);
        $product->pro_title = $request->pro_title;
        $product->pro_slug  = $this->createSlug($request->pro_title,$id);
        $product->pro_price = $request->pro_price;
        $product->pro_quantity = $request->pro_quantity;
        $product->pro_size = $request->pro_size;

        if ($request->hasFile('image')) :
            $path = $request->file('image')->store('/product', 's3');
            $images = Storage::disk('s3')->url($path);
            $product->pro_img  = $images;
        endif;

        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->pro_short_description = $request->pro_short_description;
        $product->pro_long_description = $request->pro_long_description;

        if($product->save()){
            return response(['success' => true,'slug' => $product->slug], Response::HTTP_OK);
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
        Products::where('id', $id)->delete();
        return redirect('admin/products/list');
    }
    public function createSlug($title, $id = 0) {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('pro_slug', $slug)){
            return $slug;
        }
        for ($i = 1; $i <= 10000; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('pro_slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0) {
        return Products::select('pro_slug')->where('pro_slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
