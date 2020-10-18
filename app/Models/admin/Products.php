<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function category(){
    	return $this->belongsTo(Categories::class,'category_id','id')->select();
    }
    public function subcategory(){
    	return $this->belongsTo(SubCategory::class,'sub_category_id','id')->select();
    }
    public function brands(){
    	return $this->belongsTo(Brands::class,'brand_id','id')->select();
    }
}
