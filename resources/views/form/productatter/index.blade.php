@extends('layouts.app')
@section('content')
@if (session('message'))
    <div class="alert alert-success" id="message">
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger" id="message">
        {{ session('error') }}
    </div>
@endif
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Attribute</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">productattribute</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">
    <!-- Button trigger modal -->
    <a type="button" href="/atter/product/add" class="btn btn-primary open-model">
        Add Attribute
    </a>

    <div class="addcategory">
        @include('form.productatter.table')
    </div>
</div>
{{ $atterProduct->onEachSide(5)->links() }}
@section('footer')
<script src="{{asset('js/product/atter.js')}}"></script>
@endsection
@endsection

