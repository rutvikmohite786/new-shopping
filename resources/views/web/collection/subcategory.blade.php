@extends('layouts.web')
@section('content')
<style>
    .img-fluid{
        height: 345px !important;

    }
    </style>

<!-- Start Categories  -->
<div class="categories-shop">
    <div class="container">
        <div class="row">
          @foreach($subcategory as $key => $value)
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{ asset('/images/category/'.$value->image) }}" alt="" />
                    <a class="btn hvr-hover" href="subcategoryId={{$value->id}}">{{$value->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Categories -->
@endsection
