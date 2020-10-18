<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Mail;
use App\Mail\mailtrap;
use App\Models\admin\Products;
use App\Models\admin\Brands;
use App\Models\admin\Categories;
use App\Models\admin\SubCategory;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Requests\CustomerAuth;
use Illuminate\Support\Str;
use App\Models\frontend\Customer;
use App\Models\frontend\Customer_Details;
use App\Models\frontend\Order;
use Symfony\Component\HttpFoundation\Response;

class Checkout extends Controller
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
        $data['customer_details'] = array();
        if (session('user')) {
            $data['customer_details'] = Customer_Details::where('customer_id','=',session('user')['id'])->first();
        }
        return view('frontend.checkout',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerAuth $request)
    {   
        if (!session('user')) {
            $user = new Customer;
        }
        else {
            $user = Customer::find(session('user')['id']);
        }

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        if (!session('user')) { 
            $user->email = $request->email;
        }
        else{
            $user->email = session('user')['email'];
        }
        $user->password = Hash::make($request->password);
        if (!session('user')) { 
            $slug = $this->createSlug($request->fname.$request->lname);
        }
        else {
            $slug = $this->createSlug($request->fname.$request->lname,session('user')['id']);
        }
        $user->slug  = $slug;
        if ($user->save()) {
            $detail = Customer_Details::where('customer_id','=',$user->id)->get()->toArray();

            if ($detail) {
                $details = Customer_Details::find($detail[0]['id']);
            }
            else {
                $details = new Customer_Details;
            }
            
            $details->customer_id = $user->id;
            $details->billing_mobile = $request->billing_mobile;
            $details->billing_telephone = $request->billing_telephone;
            $details->billing_fax = $request->billing_fax;
            $details->billing_company = $request->billing_company;
            $details->billing_address1 = $request->billing_address1;
            $details->billing_address2 = $request->billing_address2;
            $details->billing_city = $request->billing_city;
            $details->billing_post_code = $request->billing_post_code;
            $details->billing_country = $request->billing_country;
            $details->billing_region_state = $request->billing_region_state;

            if ($details->save()) {
                if (!session('user')) { 
                    Mail::to($request->email)->send(new mailtrap($user));
                }
                $user_data = array(
                    'id'=>$user->id,
                    'name'=>$request->fname.' '.$request->lname,
                    'email'=>$request->email,
                    'created_at'=>$request->created_at,
                    'slug'=> $slug
                );
                Session::put('user',$user_data);
                return response(['success' => true,'message' => $user->id], Response::HTTP_OK);
            }
            return
            response([
                'success' => false,
                'message' => ''
            ], Response::HTTP_FORBIDDEN);
        }
        return
            response([
                'success' => false,
                'message' => ''
            ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['categories'] = $this->categories;
        return view('frontend.order-success',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $user_id=$id;
        $detail = Customer_Details::where('customer_id','=',$user_id)->first();

        $details= Customer_Details::find($detail['id']);
        $details->delivery_fname = $request->delivery_fname;
        $details->delivery_lname = $request->delivery_lname;
        $details->delivery_email = $request->delivery_email;
        $details->delivery_mobile = $request->delivery_mobile;
        $details->delivery_telephone = $request->delivery_telephone;
        $details->delivery_fax = $request->delivery_fax;
        $details->delivery_company = $request->delivery_company;
        $details->delivery_address1 = $request->delivery_address1;
        $details->delivery_address2 = $request->delivery_address2;
        $details->delivery_city = $request->delivery_city;
        $details->delivery_post_code = $request->delivery_post_code;
        $details->delivery_country = $request->delivery_country;
        $details->delivery_region_state = $request->delivery_region_state;

        if($details->save()){
            return response(['success' => true,'message' => $user_id], Response::HTTP_OK);
        }
    }

    public function save_order(Request $request)
    {
        $order= new Order;
        $order->customer_id = $request->user_id;
        $order->same_delivery = $request->same_delivery;
        $order->FlatShippingRate = $request->FlatShippingRate;
        $order->shipping_comments = $request->shipping_comments;
        $order->CashOnDelivery = $request->CashOnDelivery;
        $order->payment_comments = $request->payment_comments;
        $order->order_no = mt_rand(1000,9999);
        $order->cart = json_encode(session('cart'));
        $order->total_amount = $request->total_amount;

        if ($order->save()) {
            session()->forget('cart');
            return response(['success' => true,'message' => $order->id], Response::HTTP_OK);
        }
            return
            response([
                'success' => false,
                'message' => ''
            ], Response::HTTP_FORBIDDEN);
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
        return Customer::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
}
