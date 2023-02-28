<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPricestock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'unit_price',
        'discount_amount',
        'quantity',
        'selling_price',
    ];
    //validation rule
    public $rules = [
        'product'=>'required',
        'unitprice'=>'required',
        'discountamount'=>'required',
        'quantity'=>'required',
        'sellingprice'=>'required'
    ];
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
