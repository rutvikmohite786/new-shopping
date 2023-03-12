<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Subcategory</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if($sub->count()>0)
    @foreach($sub as $key => $value)
    <tr class="">
      <th scope="row">{{$key+1}}</th>
      <td>{{$value->category->name}}</td>
      <td>{{$value->name}}</td>
      <td><img class="img" src="{{ asset('images/subcategory/'.$value->image) }}">
      <td>
      <a type="button" href="/subcategory/edit/{{$value->id}}" class="btn btn-primary update">update</a>
      <a type="button" href="/subcategory/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
     </td>
    </tr>
    @endforeach
    @else
    <tr>
    <td>
    <h4>No data found</h4>
    </td>
    </tr>
    @endif
  </tbody>
</table>