<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'sub_categories_id','brand_id'];
    //validation rule
    public $rules = [
        'name' => 'required',
        'subcategory' => 'required'
    ];
    public function subcategory()
    {
        return $this->hasOne(SubCategory::class, 'id', 'sub_categories_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function attribute()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id')->orderBy('selling_price','DESC');
    }
    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
    public function cart(){
        return $this->hasOne(UserCart::class, 'product_id')->where('user_id',Auth::id());
    }
    public function cartManyProduct(){
        return $this->hasMany(UserCart::class, 'product_id')->where('user_id',Auth::id());   
    }
}
