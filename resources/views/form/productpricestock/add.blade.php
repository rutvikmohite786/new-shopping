@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/pricestock/product/store" method="post" id="productpricestockform">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Product</label>
            <select class="form-control" id="exampleFormControlSelect1" name="product">
                <option value="">Select Option</option>
                @foreach($product as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('product'))
            <span class="text-danger">{{ $errors->first('product') }}</span>
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
            <label for="exampleInputEmail1">Unit Price</label>
            <input type="text" name="unitprice" class="form-control" placeholder="Enter Product">
            @if ($errors->has('unitprice'))
            <span class="text-danger">{{ $errors->first('unitprice') }}</span>
            @endif
        </div>

         <div class="form-group">
            <label for="exampleInputEmail1">discount amount</label>
            <input type="text" name="discountamount" class="form-control" placeholder="Enter Product">
            @if ($errors->has('discountamount'))
            <span class="text-danger">{{ $errors->first('discountamount') }}</span>
            @endif
        </div>

         <div class="form-group">
            <label for="exampleInputEmail1">quantity</label>
            <input type="text" name="quantity" class="form-control" placeholder="Enter Product">
            @if ($errors->has('quantity'))
            <span class="text-danger">{{ $errors->first('quantity') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/product/pricestock.js')}}"></script>
@endsection
@endsection
