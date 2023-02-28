<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Atteribute value</th>
      <th scope="col">Product</th>
      <th scope="col">Color</th>
      <th scope="col">Product Atteribute Value</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if($atterProduct->count()>0)
    @foreach($atterProduct as $key => $value)
    <tr class="">
      <th scope="row">{{$key+1}}</th>
      <td>{{$value->atter->value}}</td>
      <td>{{$value->product->name}}</td>
      <td>{{$value->color->name}}</td>
      <td>{{$value->attribute_value}}</td>
      <td>{{$value->selling_price}}</td>
      <td>
      <a type="button" href="/atter/product/edit/{{$value->id}}" class="btn btn-primary update">update</a>
      <a type="button" href="/atter/product/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
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