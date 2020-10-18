<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Products;
use App\Models\admin\Brands;
use App\Models\admin\Categories;
use App\Models\admin\SubCategory;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public $categories;
    public function __construct()
    {
        $this->categories = $data['categories'] = Categories::with('subcategories','brands')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = $this->categories;
        $data['products'] = Products::with('subcategory','category','brands')->get();
        return view('frontend.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($cat = '', $sub = '', $bra = '')
    {
        $this->cat = $data['cat_slug'] = $cat;
        $this->sub = $data['sub_slug'] = $sub;
        $this->bra = $data['bra_slug'] = $bra;
        $data['cat_name'] = '';
        $data['s_cat_name'] = '';
        $data['bra_name'] = '';
        if ($this->cat != '' && $this->sub =='' && $this->bra == '') {
            $category = Categories::where('slug', '=', $this->cat)->orderBy('id', 'desc')->first();
            if (empty($category)) {
                abort(404);
            }
            $data['cat_name'] = $category->name;
            $data['products'] = Products::with( 'category','subcategory','brands')
            ->where('category_id','=',$category->id)
            ->orderBy('id', 'DESC')->paginate(9);
        }
        else if($this->cat != '' && $this->sub !='' && $this->bra == '') {
            $category = Categories::where('slug', '=', $this->cat)->orderBy('id', 'desc')->first();
            if (empty($category)) {
                abort(404);
            }
            $data['cat_name'] = $category->name;
            $s_category = SubCategory::where('slug', '=', $this->sub)->orderBy('id', 'desc')->first();
            if (empty($s_category)) {
                abort(404);
            }
            $data['s_cat_name'] = $s_category->name;
            $data['products'] = Products::with( 'category','subcategory','brands')
            ->where('category_id','=',$category->id)
            ->where('sub_category_id','=',$s_category->id)
            ->orderBy('id', 'DESC')->paginate(9);
        }
        else if($this->cat != '' && $this->sub !='' && $this->bra != '') {
            $category = Categories::where('slug', '=', $this->cat)->orderBy('id', 'desc')->first();
            if (empty($category)) {
                abort(404);
            }
            $data['cat_name'] = $category->name;
            $s_category = SubCategory::where('slug', '=', $this->sub)->orderBy('id', 'desc')->first();
            if (empty($s_category)) {
                abort(404);
            }
            $data['s_cat_name'] = $s_category->name;
            $brand = Brands::where('slug', '=', $this->bra)->orderBy('id', 'desc')->first();
            if (empty($s_category)) {
                abort(404);
            }
            $data['bra_name'] = $brand->name;
            $data['products'] = Products::with( 'category','subcategory','brands')
            ->where('category_id','=',$category->id)
            ->where('sub_category_id','=',$s_category->id)
            ->where('brand_id','=',$brand->id)
            ->orderBy('id', 'DESC')->paginate(9);
        }
        $data['categories'] = $this->categories;
        return view('frontend.product.product-list',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = strtolower($request->get('term'));
        $products  = Products::select('pro_title as name')->whereRaw('lower(pro_title)  like (?)',["%{$search}%"])->orderBy('id', 'DESC')->get()->toArray();
        $Categories = Categories::select('name')->whereRaw('lower(name)  like (?)',["%{$search}%"])->get()->toArray();
        $SubCategory = SubCategory::select('name')->whereRaw('lower(name)  like (?)',["%{$search}%"])->get()->toArray();
        $brands = Brands::select('name')->whereRaw('lower(name)  like (?)',["%{$search}%"])->get()->toArray();
        $result = array_merge($products,$Categories,$SubCategory,$brands);
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doSearch(Request $request)
    {
        $data['cat_slug'] = ''; $data['sub_slug'] = ''; $data['bra_slug'] = '';
        $data['cat_name'] = ''; $data['s_cat_name'] = ''; $data['bra_name'] = '';

        $this->search = $data['search'] = strtolower($request->get('s')?$request->get('s'):'');
        $this->min = $data['min'] = $request->get('min')?$request->get('min'):0;
        $this->max = $data['max'] = $request->get('max')?$request->get('max'):100000000;

        $category = Categories::whereRaw('lower(name)  like (?)',["%{$this->search}%"])->pluck('id')->toArray();
        $SubCategory = SubCategory::whereRaw('lower(name)  like (?)',["%{$this->search}%"])->pluck('id')->toArray();
        $brands = Brands::whereRaw('lower(name)  like (?)',["%{$this->search}%"])->pluck('id')->toArray();

        $data['products'] = Products::with('category','subcategory','brands')
        ->orWhereIn('category_id',$category)
        ->orWhereIn('sub_category_id',$SubCategory)
        ->orWhereIn('brand_id',$brands)
        ->orWhere('pro_title', 'LIKE', '%'. $this->search. '%')
        ->where('pro_price', '>=', $this->min)
        ->where('pro_price', '<=', $this->max)
        ->orderBy('id', 'DESC')
        ->paginate(9);
        $data['categories'] = $this->categories;
        return view('frontend.product.product-list',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product'] = Products::with('subcategory','category','brands')->where('id','=',$id)->first();
        $view = view("frontend.product.show-quick-view",$data)->render();
        return response(['success' => true,'view' => $view], Response::HTTP_OK);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function single($slug)
    {
        $data['cat_slug'] = ''; $data['sub_slug'] = ''; $data['bra_slug'] = '';
        $data['categories'] = $this->categories;
        $data['product'] = Products::with('subcategory','category','brands')->where('pro_slug','=',$slug)->first();

        $category = Categories::where('id', '=', $data['product']->category_id)->orderBy('id', 'desc')->first();
        if ($category) {
            $data['cat_slug'] = $category->slug;
        }
        $SubCategory = SubCategory::where('id', '=', $data['product']->sub_category_id)->orderBy('id', 'desc')->first();
        if ($SubCategory) {
            $data['sub_slug'] = $SubCategory->slug;
        }
        $brand = Categories::where('id', '=', $data['product']->brand_id)->orderBy('id', 'desc')->first();
        if ($brand) {
            $data['bra_slug'] = $brand->slug;
        }
        
        $data['products'] = Products::with('subcategory','category','brands')->get();
        return view("frontend.product.single",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
