@extends('layouts.app')
@section('content')
@if (session('message'))
<div class="alert alert-success" id="message">
    {{ session('message') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-success" id="error">
    {{ session('error') }}
</div>
@endif
<div class="content-header">
    <div class="container-fluid">
        <div class="input-group">
            <div class="form-outline">
                <input type="search" id="form1" class="form-control" />
                <label class="form-label" for="form1">Search</label>
            </div>
            <button type="button" style="height:40px;" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>&nbsp;
             <button type="button" style="height:40px;" class="btn btn-primary">
               Filter
            </button>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">
    <!-- Button trigger modal -->
    <a type="button" href="/user/add" class="btn btn-primary open-model">
        Add User
    </a>

    <div class="addcategory">
        @include('form.user.table')
    </div>
</div>
{{ $user->onEachSide(5)->links() }}
@endsection
