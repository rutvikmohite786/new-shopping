@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/attribute/store" method="post" id="attributeform">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Value</label>
            <input type="text" name="value" class="form-control" placeholder="Enter Value">
            @if ($errors->has('value'))
            <span class="text-danger">{{ $errors->first('value') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/attribute/index.js')}}"></script>
@endsection
@endsection
