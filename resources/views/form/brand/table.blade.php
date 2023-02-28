<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Logo</th>
            <th scope="col">Descrption</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($brand->count()>0)
        @foreach($brand as $key => $value)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$value->name}}</td>
            <td><img class="img" src="{{ asset('logo/'.$value->logo) }}">
            </td>
            <td>{{$value->description}}</td>
            <td>
                <a type="button" href="/brand/product/edit/{{$value->id}}" class="btn btn-primary update">update</a>
                <a type="button" href="/brand/product/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
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
