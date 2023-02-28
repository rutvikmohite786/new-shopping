<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'sub_categories_id'];
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
}
