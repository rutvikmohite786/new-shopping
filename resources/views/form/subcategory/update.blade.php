@extends('layouts.app')
@section('content')
<style>
    .fileinput{
    display:none
}
</style>
<div class="container">
    <form action="/subcategory/update" method="post" id="subcategoryform" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Sub Category</label>
            <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Enter Sub Category">
            <input type="hidden" name="id" value="{{$data->id}}">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category">
                <option value="">Select Option</option>
                @foreach($category as $key => $value)
                <option value="{{ $value->id }}" {{ $value->id == $data->category->id ? 'selected' : ''}}>{{ $value->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('category'))
            <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
        </div>
        <div class="form-group">
            <img class="img" src="{{ asset('images/subcategory/'.$data->image) }}">
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
<script src="{{asset('js/subcategory/index.js')}}"></script>
@endsection
@endsection
