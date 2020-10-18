<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category(){
    	return $this->belongsTo(Categories::class,'category_id','id')->select();
    }
}
