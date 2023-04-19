<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

     //validation rule
     public $rules = [
        'name' => 'required',
        'desc'=>'required',
        'img'=>'mimes:jpeg,jpg,png,gif|required'
    ];
    public $rules2 = [
        'name' => 'required',
        'desc'=>'required',
    ];
    public function product()
    {
        return $this->hasOne(Product::class);
    }

}
