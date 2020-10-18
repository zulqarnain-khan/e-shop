<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAuth extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (session('cart')) {
            return [
                'fname' => 'required|min:3|max:10',
                'lname' => 'required|min:3|max:10'
            ];
        }
        else {
            return [
                'fname' => 'required|min:3|max:10',
                'lname' => 'required|min:3|max:10',
                'email' => 'required|email|unique:customers,email',
                'password' => ['required' , 'min:3' , 'max:15'],
                're_password' => 'required|same:password',
            ];
        }
        
    }

    public function messages()
    {
        if (session('cart')) {
            return [
                'fname.required' => 'First Name is required',
                'lname.required' => 'Last Name is required.'
            ];
        }
        else {
            return [
                'fname.required' => 'First Name is required',
                'lname.required' => 'Last Name is required.',
                'email.required' => 'Email is required.',
                'email.unique' => 'This email has already been taken.Please use another',
                "password.required"    => "Password field is required.",
                're_password.required' => 'Confirm Password field is required.',
                're_password.same' => 'Password Not Matched.Please confirm password again',
            ];
        }
        
    }
}
