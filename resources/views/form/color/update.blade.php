@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/color/update" method="post" id="colorform">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" value="{{$color->name}}" class="form-control" placeholder="Enter Name">
            <input type="hidden" name="id" value="{{$color->id}}">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Code</label>
            <input type="text" name="code" class="form-control" value="{{$color->code}}" placeholder="Enter Code">
            @if ($errors->has('code'))
            <span class="text-danger">{{ $errors->first('code') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/color/index.js')}}"></script>
@endsection
@endsection
