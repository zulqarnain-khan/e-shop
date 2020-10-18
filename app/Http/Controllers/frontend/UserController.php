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
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
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

    public function account($slug)
    {
        $data['categories'] = $this->categories;
        $data['customer'] = Customer::where('slug','=', $slug)->first()->toArray();
        return view('frontend.user.profile',$data); 
    }

    public function index()
    {
        $data['categories'] = $this->categories;
        return view('frontend.user.login',$data);
    }

    public function social(Request $request , $social_login)
    {
        $user = Socialite::driver($social_login)->user();
        $customer = new Customer ;

        if($social_login == 'google')
        {
            $is_user = Customer::where('gmail_id','=',$user['id'])->get()->toArray();
            $first_name = $user['given_name'];
            $last_name = $user['family_name'];
            $customer->gmail_id = $user['id'];
        }
        elseif($social_login == 'facebook')
        {
            $is_user = Customer::where('facebook_id','=',$user['id'])->get()->toArray();
            $res= explode(" ",$user['name']);
            $first_name = $res[0];
            $last_name = $res[1];
            $customer->facebook_id = $user['id'];
        }
        
        if($is_user)
        {
            Session::put('user',$is_user);
            return redirect('/');
        }

        $is_email = Customer::where('email','=',$user['email'])->get()->toArray();
        
        if($is_email)
        {
            return response(['success' => false,'message' => 'you are signup from another Social site'], Response::HTTP_FORBIDDEN);
        }

        $customer->fname = $first_name;
        $customer->lname = $last_name;
        $customer->email = $user['email']; 
        $customer->password = $user['id'];
        $slug = $this->createSlug($first_name.$last_name);
        $customer->slug  = $slug ;
        if ($customer->save()) {
            $customer = array(
                    'id'=>$customer->id,
                    'name'=>$first_name.' '.$last_name,
                    'email'=>$user['email'],
                    'created_at'=>$request->created_at,
                    'slug'=> $slug
                );
            Session::put('user',$customer);
            Mail::to($user['email'])->send(new mailtrap($customer));
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = $this->categories;
        return view('frontend.user.signup',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerAuth $request)
    {
        $user = new Customer;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $slug = $this->createSlug($request->fname.$request->lname);
        $user->slug  = $slug ;
        if ($user->save()) {
            $user = array(
                    'id'=>$user->id,
                    'name'=>$request->fname.' '.$request->lname,
                    'email'=>$request->email,
                    'created_at'=>$request->created_at,
                    'slug'=> $slug
                );
            Session::put('user',$user);
            Mail::to($request->email)->send(new mailtrap($user));
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = Customer::where('email','=',$request->email)->first();
        if($user && Hash::check($request->password,$user['password']))
        {
            $user = array(
                    'id'=>$user['id'],
                    'name'=>$user['fname'].' '.$user['lname'],
                    'email'=>$user['email'],
                    'created_at'=>$request->created_at,
                    'slug'=>$user['slug']
                );
            Session::put('user',$user);
            return back();
        }
        return back();
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
    public function logout(Request $request)
    {

        session()->forget('user');
        return redirect()->back()->with('success', 'Cart is Empty Now');
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


    public function redirectToProvider($social_login)
    {
        return Socialite::driver($social_login)->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver($social_login)->user();
        //$user->token;
    }
}
