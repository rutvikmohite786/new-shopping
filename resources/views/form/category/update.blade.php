@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/category/update" method="post" id="categoryform">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Update Category</label>
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Enter Category">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/category/index.js')}}"></script>
@endsection
@endsection
