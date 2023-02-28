@extends('layouts.app')
@section('content')
<style>
.fileinput{
    display:none
}
</style>
<div class="container">
    <form action="/category/update" method="post" id="categoryform" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Update Category</label>
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Enter Category">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
         <div class="form-group">
          <img class="img" src="{{ asset('images/category/'.$data->image) }}">
         </div>
        <div class="form-group fileinput">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
              @if ($errors->has('img'))
            <span class="text-danger">{{ $errors->first('img') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-primary updateimg">Cliek here for update image</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/category/index.js')}}"></script>
@endsection
@endsection
