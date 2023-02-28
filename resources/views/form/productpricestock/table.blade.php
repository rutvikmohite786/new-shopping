<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Unit price</th>
            <th scope="col">Discount amount</th>
            <th scope="col">Quantity</th>
            <th scope="col">Selling price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($productpricestock->count()>0)
        @foreach($productpricestock as $key => $value)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$value->product->name}}</td>
            <td>{{$value->unit_price}}</td>
            <td>{{$value->discount_amount}}</td>
            <td>{{$value->quantity}}</td>
            <td>{{$value->selling_price}}</td>
            <td>
                <a type="button" href="/pricestock/product/edit/{{$value->id}}" class="btn btn-primary update">update</a>
                <a type="button" href="/pricestock/product/delete/{{$value->id}}" class="btn btn-danger delete">delete</a>
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
