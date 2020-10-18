<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function subcategories(){
    	return $this->hasMany(SubCategory::class,'category_id','id');
    }
    public function brands(){
    	return $this->hasMany(Brands::class,'category_id','id');
    }
}
