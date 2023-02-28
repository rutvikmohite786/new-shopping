<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'dropDownId'];

    //validation rule
    public $rules = [
        'name' => 'required',
        'category'=>'required'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
