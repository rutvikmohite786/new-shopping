@extends('layouts.app')
@section('content')
<style>
.fileinput{
    display:none
}
</style>
<div class="container">
    <form action="/banner/product/update" method="post" id="bannerform" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="id" value="{{$banner->id}}">
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" value="{{$banner->name}}" name="name" class="form-control" placeholder="Enter banner" id="exampleInputName">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" value="{{$banner->description}}" name="desc" class="form-control" placeholder="Enter decription" id="exampleInputEmail1">
            @if ($errors->has('desc'))
            <span class="text-danger">{{ $errors->first('desc') }}</span>
            @endif
        </div>
         <div class="form-group">
            <label for="exampleInputEmail1">Link</label>
            <input type="text" value="{{$banner->link}}" name="link" class="form-control" placeholder="Enter decription" id="exampleInputEmail1">
            @if ($errors->has('link'))
            <span class="text-danger">{{ $errors->first('link') }}</span>
            @endif
        </div>
          <div class="form-group">
          <img class="img" src="{{ asset('/images/banner/slider/'.$banner->image) }}">
         </div>
        <div class="form-group fileinput">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
              @if ($errors->has('img'))
            <span class="text-danger">{{ $errors->first('img') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-primary updateimg">Cliek here for update image</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/banner/slidder.js')}}"></script>
@endsection
@endsection
