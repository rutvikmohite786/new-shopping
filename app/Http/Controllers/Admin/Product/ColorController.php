<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use \Exception;

class ColorController extends Controller
{
  public function index()
  {
    $color = Color::paginate(config('const.pagination'));
    return view('form.color.index', compact('color'));
  }
  public function add()
  {
    return view('form.color.add');
  }
  public function store(Request $request)
  {
    $validated = $request->validate([
      'code' => 'required',
      'name' => 'required'
    ]);
    Color::create([
      'code' => $request->code,
      'name' => $request->name
    ]);
    return redirect()->route('index.color')->with('message','Color added');
  }
  public function edit($id)
  {
    try {
      $color = Color::find($id);
    } catch (Exception $exception) {
      return back()->withError($exception->getMessage())->withInput();
    }
    return view('form.color.update', compact('color'));
  }
  public function update(Request $request)
  {
    Color::where('id', $request->id)->update([
      'name' => $request->name,
      'code' => $request->code
    ]);
    return redirect()->route('index.color')->with('message','Color updated');
  }
  public function delete($id)
  {
    Color::where('id', $id)->delete();
    return redirect()->route('index.color');
  }
}
