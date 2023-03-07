<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'color_id',
        'product_id',
        'attribute_id',
        'attribute_value',
        'selling_price',
        'quantity'
    ];

     //validation rule
     public $rules = [
        'color' => 'required',
        'product'=>'required',
        'atter'=>'required',
        'attervalue'=>'required',
        'sellingprice'=>'required',
        'quantity'=>'required'
    ];
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function color()
    {
        return $this->hasOne(Color::class,'id','color_id');
    }
    public function atter()
    {
        return $this->hasOne(Attribute::class,'id','attribute_id');
    }

}
