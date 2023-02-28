@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/banner/product/store" method="post" id="bannerform" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter brand" id="exampleInputName">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" name="desc" class="form-control" placeholder="Enter decription" id="exampleInputEmail1">
            @if ($errors->has('desc'))
            <span class="text-danger">{{ $errors->first('desc') }}</span>
            @endif
        </div>

         <div class="form-group">
            <label for="exampleInputEmail2">Link</label>
            <input type="text" name="link" class="form-control" placeholder="Enter link" id="exampleInputEmail2">
            @if ($errors->has('link'))
            <span class="text-danger">{{ $errors->first('link') }}</span>
            @endif
        </div>
       
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
              @if ($errors->has('img'))
            <span class="text-danger">{{ $errors->first('img') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/banner/slidder.js')}}"></script>
@endsection
@endsection
