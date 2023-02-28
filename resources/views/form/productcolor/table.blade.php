<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Color</th>
      <th scope="col">Product</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if($productcolor->count()>0)
    @foreach($productcolor as $key => $value)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$value->color->name}}</td>
      <td>{{$value->product->name}}</td>
      <td>
      <a type="button" href="/products/color/edit/{{$value->id}}" class="btn btn-primary update">update</a>
      <a type="button" href="/products/color/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
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
