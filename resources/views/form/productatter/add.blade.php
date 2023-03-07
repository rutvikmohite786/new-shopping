@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/atter/product/store" method="post" id="atterform">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Attribute Value</label>
            <input type="text" name="attervalue" class="form-control" placeholder="Enter Product">
            @if ($errors->has('attervalue'))
            <span class="text-danger">{{ $errors->first('attervalue') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" name="quantity"  class="form-control" placeholder="Enter Product">
            @if ($errors->has('quantity'))
            <span class="text-danger">{{ $errors->first('quantity') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Selling Price</label>
            <input type="text" name="sellingprice" class="form-control" placeholder="Enter Product">
            @if ($errors->has('sellingprice'))
            <span class="text-danger">{{ $errors->first('sellingprice') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select color</label>
            <select class="form-control" id="exampleFormControlSelect1" name="color">
                <option value="">Select Option</option>
                @foreach($color as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
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
                <option value="{{$value->id}}">{{$value->name}}</option>
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
                <option value="{{$value->id}}">{{$value->name}}</option>
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
