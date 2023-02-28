@extends('layouts.app')
@section('content')
<div class="container">
    <img src="{{ asset('images/'.$data->name) }}" class="img" alt="job image" title="job image">
    <form action="/product/image/update" method="post" id="product" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" value="{{$data->id}}" name="id">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
