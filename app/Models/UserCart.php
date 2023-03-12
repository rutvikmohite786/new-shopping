<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'quantity','user_id','product_attribute_id'];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function productatter()
    {
        return $this->hasOne(ProductAttribute::class,'id','product_attribute_id');
    }

}
