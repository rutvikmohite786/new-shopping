<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'dropDownId','image'];

    //validation rule
    public $rules = [
        'name' => 'required',
        'category'=>'required'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
    public function product(){
        return $this->hasMany(Product::class,'sub_categories_id');
    }
}
