<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserAuth;
use App\Http\Requests\resetPassword;
use App\User;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Mailsender;
use Illuminate\Support\Facades\Crypt;
use Session;
use URl;
use Socialite;
use Exception;

class AdminConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function getform()
    {
        return view('admin.form');
    }
    public function product()
    {
        return view('admin.show_product');
    }
    public function order()
    {
        return view('admin.show_order');
    }
    public function categories()
    {
        return view('admin.categories');
    }
    public function categories_list()
    {
        return view('admin.categories_list');
    }
    public function brand()
    {
        return view('admin.brand');
    }
    public function brand_list()
    {
        return view('admin.brand_list');
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
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $authSuccess = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($authSuccess) {
            $request->session()->regenerate();
            $user = User::where('email',$request->email)->first();
            Session::put([
                    'id'=>$user['id'],
                    'name'=>$user['name'],
                ]);
            return response(['success' => true,'message' => 'Email and Password verified.You are Redirecting...'], Response::HTTP_OK);
        }
        return
            response([
                'success' => false,
                'message' => 'Email or Password is incorrect.'
            ], Response::HTTP_FORBIDDEN);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.login');
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
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }
}
