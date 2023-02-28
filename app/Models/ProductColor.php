<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','color_id'];
    public $rules = [
        'product' => 'required',
        'color' => 'required'
    ];
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function color()
    {
        return $this->hasOne(Color::class,'id','color_id');
    }
}
