@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/product/store" method="post" id="product" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Add Product</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Product">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Subcategory</label>
            <select class="form-control" id="exampleFormControlSelect1" name="subcategory">
                <option value="">Select Option</option>
                @foreach($subcategory as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('subcategory'))
            <span class="text-danger">{{ $errors->first('subcategory') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="brand">Select brand</label>
            <select class="form-control" id="brand" name="brand">
                <option value="">Select Option</option>
                @foreach($brand as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
        <button id="rowAdder" type="button" class="btn btn-dark">
            <span class="bi bi-plus-square-dotted">
            </span> Add Image
        </button>
        <br><br>
        <div id="newinput"></div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/product/index.js')}}"></script>
@endsection
@endsection
