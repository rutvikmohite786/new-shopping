<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderBaner extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description', 'image', 'link'];

  //validation rule
  public $rules = [
    'name' => 'required',
    'desc' => 'required',
    'link' => 'required'
  ];
  public $rules2 = [
    'name' => 'required',
    'desc' => 'required',
    'img' => 'mimes:jpeg,jpg,png,gif|required',
    'link' => 'required'
  ];
}
