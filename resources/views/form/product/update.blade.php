@extends('layouts.app')
@section('content')
<style>
.img{
    width:290px;
    height:200px;
}
</style>
<div class="container">
    <form action="/product/update" method="post" id="product" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Product</label>
            <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Enter Sub Category">
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Sub Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="subcategory">
                <option value="">Select Option</option>
                @foreach($subcategory as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                <option value="{{ $value->id }}" {{ $value->id == $data->subcategory->id ? 'selected' : ''}}>{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="brand">Select brand</label>
            <select class="form-control" id="brand" name="brand">
                <option value="">Select Option</option>
                @foreach($brand as $key => $value)
                <option value="{{$value->id}}" @if(isset($data->brand)) {{$value->id == $data->brand->id ? 'selected' : ''  }}@endif>{{$value->name}}</option>
                @endforeach
            </select>
        </div>
         <button id="rowAdder" type="button" class="btn btn-dark">
            <span class="bi bi-plus-square-dotted">
            </span> Add Image
        </button><br><br>
         <div id="newinput"></div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <br>
      @foreach($data->images as $key => $img)
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ asset('images/'.$img->name) }}" class="img" alt="no image found" title="job image">
            </div>
            <div class="col-sm-6">
                 <a type="button" href="/product/image/edit/{{$img->id}}" class="btn btn-primary update">update</a>
                 <a type="button" href="/product/image/delete/{{$img->id}}" class="btn btn-danger delete">delete</a>
            </div>
        </div>
        <br>
      @endforeach
</div>
@section('footer')
<script src="{{asset('js/product/index.js')}}"></script>
@endsection
@endsection
