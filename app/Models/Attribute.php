<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name','value'];

    //validation rule
    public $rules = [
        'name' => 'required',
        'value'=>'required'
    ];

    public function attribute()
    {
        return $this->hasMany(ProductAttribute::class);
    }

}
