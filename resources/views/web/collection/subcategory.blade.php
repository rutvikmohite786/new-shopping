@extends('layouts.web')
@section('content')
<style>
    .img-fluid{
        height: 345px !important;

    }
    </style>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user/new">Home</a></li>
                    <li class="breadcrumb-item"><a href="/user/new">Category</a></li>
                    <li class="breadcrumb-item active">Subcategory</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Categories  -->
<div class="categories-shop">
    <div class="container">
        <div class="row">
          @foreach($subcategory as $key => $value)
            <div class="col-lg-{{$subcategory->count()>2 ? 4 : 6 }} col-md-{{$subcategory->count()>2 ? 4 : 6 }}">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{ asset('/images/subcategory/'.$value->image) }}" alt="" />
                    <a class="btn hvr-hover" href="subcategoryId={{$value->id}}">{{$value->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Categories -->
@endsection
