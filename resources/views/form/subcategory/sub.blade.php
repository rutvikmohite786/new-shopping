@extends('layouts.app')
@section('content')
@if (session('message'))
    <div class="alert alert-success" id="message">
        {{ session('message') }}
    </div>
@endif

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sub Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">SubCategory</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">
    <!-- Button trigger modal -->
    <a type="button" href="/subcategory/add" class="btn btn-primary open-model">
        Add Sub Category
    </a>

    <div class="addcategory">
        @include('form.subcategory.stable')
    </div>
 
</div>
{{ $sub->onEachSide(5)->links() }}
@section('footer')
<script src="{{asset('js/subcategory/index.js')}}"></script>
@endsection
@endsection
