<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['fname' , 'lname' , 'email' , 'password' ];
    public function customer_details(){
    	return $this->hasMany(Customer_Details::class,'customer_id','id');
    }
}
