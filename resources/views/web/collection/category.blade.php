@extends('layouts.web')
@section('content')

<!-- Start All Title Box -->
<input type="hidden" id="sub_id" value="{{$sub_id}}">
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="#">
                            <input class="form-control" placeholder="Search here..." type="text">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Categories</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">

                            @foreach($category as $key => $value)
                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="#sub-men{{$key}}" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men{{$key}}">{{$value->name}} <small class="text-muted">({{$value->subcategorymany->count()}})</small>
                                </a>
                                <div class="collapse {{$value->id == $cat_id ? 'show' : ''}}" id="sub-men{{$key}}" data-parent="#list-group-men">
                                    <div class="list-group">
                                        @foreach($value->subcategorymany as $key => $val)
                                        <a href="subcategoryId={{$val->id}}" class="list-group-item list-group-item-action {{$value->subcategorymany[$key]->id==$sub_id ? 'active' : ''}}">{{$val->name}}<small class="text-muted">({{isset($val->product) ? $val->product->count() : '0'}})</small></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-price-left">
                        <div class="title-left">
                            <h3>Price</h3>
                        </div>
                        <div class="price-box-slider">
                            <div id="slider-range"></div>
                            <p>
                                <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                <button class="btn hvr-hover" type="submit">Filter</button>
                            </p>
                        </div>
                    </div>

                    @if($brand->count()>0)
                    <div class="filter-brand-left">
                        <div class="title-left">
                            <h3>Brand</h3>
                        </div>
                        <div class="brand-box">
                            <ul>
                                @foreach($brand as $key => $value)
                                <li>
                                    <div class="radio radio-danger">
                                        <input class="checkbox" name="survey" id="checkbox" value="{{$value->id}}" type="checkbox">
                                        <label for="checkbox">{{$value->name}}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            <div class="toolbar-sorter-right">
                                <span>Sort by </span>
                                <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                    <option data-display="Select">Nothing</option>
                                    <option value="1">Popularity</option>
                                    <option value="2">High Price → High Price</option>
                                    <option value="3">Low Price → High Price</option>
                                    <option value="4">Best Selling</option>
                                </select>
                            </div>
                            <p>Showing all 4 results</p>
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    @if($subcategory->count()>0)
                                    @foreach($subcategory as $key => $value)
                                    @if(isset($value->product[0]))
                                    @foreach($value->product as $key2 => $val)
                                    @if(isset($val->attribute[$key2]))
                                    <input type="hidden" value="{{$val->attribute[$key2]->id}}" id="product_attribute{{$val->id}}">
                                    @endif
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <div class="products-single fix">
                                            <div class="box-img-hover">
                                                <div class="type-lb">
                                                    <p class="sale">Sale</p>
                                                </div>
                                                {{-- {{dd($val->images)}} --}}
                                                @if(isset($val->images[0]))
                                                <img src="{{ asset('images/'.$val->images[0]->name) }}" class="img-fluid" alt="Image">
                                                @endif
                                                {{-- {{dd($val->cart)}} --}}
                                                <div class="mask-icon">
                                                    <ul>
                                                        <li><a href="product={{$val->id}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                    <a class="cart {{isset($val->cart) ? 'remove-cart' :'add-cart'}}" data-id="{{$val->id}}" href="javascript:void(0)">{{isset($val->cart) ? 'Remove from cart' :'Add to Cart'}}</a>
                                                </div>
                                            </div>
                                            <div class="why-text">
                                                <h4>{{$val->name}}</h4>
                                                {{-- <h5>ss{{$val->attribute[0]->selling_price}}</h5> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="container">
                                        <h1>No Product Found</h1>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="list-view">

                                <div class="list-view-box">
                                    <div class="row">
                                        @foreach($subcategory as $key => $value)
                                        @if($value->product)
                                        @foreach($value->product as $key2 => $val)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="{{ asset('images/'.$val->images[0]->name) }}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                            <div class="why-text full-width">
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                                <h5> <del>$ 60.00</del> $40.79</h5>
                                                <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien, imperdiet quis magna nec, iaculis ultrices ante. Integer vitae suscipit nisi. Morbi dignissim risus sit amet orci porta, eget aliquam purus
                                                    sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis euismod ex volutpat in. Vestibulum eleifend eros ac lobortis aliquet.
                                                    Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut placerat lectus.</p>
                                                <a class="btn hvr-hover" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
@endsection
@section('footer')
<script>
    $(".add-cart").click(function() {
        let quantity = 1
        let product_id = $(this).data('id')
        let attribute_id = $('#product_attribute' + product_id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post"
            , url: '/user/add/card'
            , data: {
                'product_id': product_id
                , 'quantity': quantity
                , 'product_attribute_id': attribute_id
            }
            , dataType: 'json'
            , success: function(data) {
                console.log(data)
            }
            , error: function(data) {
                console.log(data)
            }
        });
    });

    //remove form the cart
    $(".remove-cart").click(function() {
        let quantity = 1
        let product_id = $(this).data('id')
        let attribute_id = $('#product_attribute' + product_id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post"
            , url: '/user/remove/card'
            , data: {
                'product_id': product_id
                , 'quantity': quantity
                , 'product_attribute_id': attribute_id
            }
            , dataType: 'json'
            , success: function(data) {
                console.log(data)
            }
            , error: function(data) {
                console.log(data)
            }
        });
    });

    //remove form the cart
    $(".checkbox").change(function() {
        var checkedValues = $('input:checkbox:checked').map(function() {
            return this.value;
        }).get();
        var sub_id = $('#sub_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post"
            , url: '/user/brand/filter'
            , data: {
                'brand_id': checkedValues
                , 'sub_id': sub_id
            }
            , success: function(data) {
                $('.product-categorie-box').html('')
                $('.product-categorie-box').html(data)
                console.log(data)
            }
            , error: function(data) {
                console.log(data)
            }
        });
    });

    $('#basic').change(function() {
        console.log('hjhjh')
        var price = $('#basic').find(":selected").val();
        var checkedValues = $('input:checkbox:checked').map(function() {
            return this.value;
        }).get();
        var sub_id = $('#sub_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post"
            , url: '/user/brand/filter'
            , data: {
                'brand_id': checkedValues
                , 'sub_id': sub_id,
                'price':price
            }
            , success: function(data) {
                $('.product-categorie-box').html('')
                $('.product-categorie-box').html(data)
                console.log(data)
            }
            , error: function(data) {
                console.log(data)
            }
        });
    });

</script>
@endsection
