<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','image'];
    
    //validation rule
    public $rules = [
        'name' => 'required',
    ];

    public $rules2 = [
        'img' => 'required',
    ];
    public function subcategory()
    {
        return $this->hasOne(SubCategory::class);
    }
    public function subcategorymany()
    {
        return $this->hasMany(SubCategory::class,'categories_id');
    }
}
