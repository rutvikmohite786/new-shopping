<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Code</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if($color->count()>0)
    @foreach($color as $key => $value)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$value->name}}</td>
      <td>{{$value->code}}</td>
      <td>
      <a type="button" href="/color/edit/{{$value->id}}" class="btn btn-primary update">update</a>
      <a type="button" href="/color/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
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
