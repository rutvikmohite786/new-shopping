<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Descrption</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($banner->count()>0)
        @foreach($banner as $key => $value)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$value->name}}</td>
            <td><img class="img" src="{{ asset('/images/banner/slider/'.$value->image) }}">
            </td>
            <td>{{$value->description}}</td>
            <td>
                <a type="button" href="/banner/product/edit/{{$value->id}}" class="btn btn-primary update">update</a>
                <a type="button" href="/banner/product/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
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
