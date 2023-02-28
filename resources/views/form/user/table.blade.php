<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if($user->count()>0)
    @foreach($user as $key => $value)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$value->name}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->status->status}}
      <td>
      <a type="button" href="/user/edit/{{$value->id}}" class="btn btn-primary update">update</a>
      <a type="button" href="/user/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
      <a type="button" href="/user/password/reset/{{$value->id}}" class="btn btn-info delete">password reset</a>
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
