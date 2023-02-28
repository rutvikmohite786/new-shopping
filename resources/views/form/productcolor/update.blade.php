@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/products/color/update" method="post" id="productcolorform">
        @csrf
        <input type="hidden" name="id" value="{{$productcolor->id}}">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Product</label>
            <select class="form-control" id="exampleFormControlSelect1" name="product">
                <option value="">Select Option</option>
                @foreach($product as $key => $value)
                <option value="{{$value->id}}" {{ $value->id == $productcolor->product->id ? 'selected' : ''}}>{{$value->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('product'))
            <span class="text-danger">{{ $errors->first('product') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Select Color</label>
            <select class="form-control" id="exampleFormControlSelect2" name="color">
                <option value="">Select Option</option>
                @foreach($color as $key => $value)
                <option value="{{$value->id}}" {{ $value->id == $productcolor->color->id ? 'selected' : ''}}>{{$value->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('color'))
            <span class="text-danger">{{ $errors->first('color') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/productcolor/index.js')}}"></script>
@endsection
@endsection
