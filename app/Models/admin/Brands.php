<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    public function category(){
    	return $this->belongsTo(Categories::class,'category_id','id')->select();
    }
    public function subcategory(){
    	return $this->belongsTo(SubCategory::class,'sub_category_id','id')->select();
    }
}
