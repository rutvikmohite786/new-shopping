@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/atter/product/update" method="post" id="atterform">
        <input type="hidden" name="id" value="{{$atterProduct->id}}">

        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Attribute Value</label>
            <input type="text" value="{{$atterProduct->attribute_value}}" name="attervalue" class="form-control" placeholder="Enter Product">
            @if ($errors->has('attervalue'))
            <span class="text-danger">{{ $errors->first('attervalue') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Selling Price</label>
            <input type="text" name="sellingprice" value="{{$atterProduct->selling_price}}" class="form-control" placeholder="Enter Product">
            @if ($errors->has('sellingprice'))
            <span class="text-danger">{{ $errors->first('sellingprice') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" name="quantity" value="{{$atterProduct->quantity}}" class="form-control" placeholder="Enter Product">
            @if ($errors->has('quantity'))
            <span class="text-danger">{{ $errors->first('quantity') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select color</label>
            <select class="form-control" id="exampleFormControlSelect1" name="color">
                <option value="">Select Option</option>
                @foreach($color as $key => $value)
                <option value="{{$value->id}}" {{ $value->id == $atterProduct->color_id ? 'selected' : ''}}>{{$value->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('color'))
            <span class="text-danger">{{ $errors->first('color') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Select attribute</label>
            <select class="form-control" id="exampleFormControlSelect2" name="atter">
                <option value="">Select Option</option>
                @foreach($atter as $key => $value)
                <option value="{{$value->id}}" {{ $value->id == $atterProduct->attribute_id  ? 'selected' : ''}}>{{$value->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('atter'))
            <span class="text-danger">{{ $errors->first('atter') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect3">Select product</label>
            <select class="form-control" id="exampleFormControlSelect3" name="product">
                <option value="">Select Option</option>
                @foreach($product as $key => $value)
                <option value="{{$value->id}}" {{ $value->id == $atterProduct->product_id  ? 'selected' : ''}}>{{$value->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('product'))
            <span class="text-danger">{{ $errors->first('product') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/product/atter.js')}}"></script>
@endsection
@endsection
