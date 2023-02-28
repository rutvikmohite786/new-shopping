@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/subcategory/update" method="post" id="subcategoryform">
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
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@section('footer')
<script src="{{asset('js/subcategory/index.js')}}"></script>
@endsection
@endsection
