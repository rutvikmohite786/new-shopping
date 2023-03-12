@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/subcategory/store" method="post" id="subcategoryform" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Add Sub Category</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Sub Category">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category">
                <option value="">Select Option</option>
                @foreach($category as $key => $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('category'))
            <span class="text-danger">{{ $errors->first('category') }}</span>
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
<script src="{{asset('js/subcategory/index.js')}}"></script>
@endsection
@endsection
