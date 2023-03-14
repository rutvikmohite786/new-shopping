<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Sub Category</th>
      <th scope="col">Product</th>
      <th scope="col">Brand</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if($product->count()>0)
    @foreach($product as $key => $value)
    <tr class="">
      <th scope="row">{{$key+1}}</th>
      <td>{{$value->subcategory->category->name}}</td>
      <td>{{$value->subcategory->name}}</td>
      <td>{{$value->name}}</td>
      <td>{{isset($value->brand) ? $value->brand->name : 'null'}}</td>
      <td>
      <a type="button" href="/product/edit/{{$value->id}}" class="btn btn-primary update">update</a>
      <a type="button" href="/product/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
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