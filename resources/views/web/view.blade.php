@extends('layouts.web')
@section('content')
<!-- Start All Title Box -->
<style>
    .price-box-bar button {
        padding: 10px 20px;
        font-weight: 700;
        color: #ffffff;
        border: none;
    }

    .activeAttr {
        background-color: #d33b33
    }
    .activeatter{
        border:solid 4px black
    }

</style>
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop Detail</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Detail </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <input type="hidden" id="product_id" value="{{$produtDetail->id}}">
                        @foreach($produtDetail->images as $key => $value)
                        <div class="carousel-item {{$key==0 ? 'active' : ''}}"> <img class="d-block w-100" src="{{ asset('images/'.$value->name) }}" alt="First slide"> </div>
                        @endforeach
                        {{-- <div class="carousel-item"> <img class="d-block w-100" src="images/big-img-02.jpg" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/big-img-03.jpg" alt="Third slide"> </div> --}}
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                    <ol class="carousel-indicators">
                        @foreach($produtDetail->images as $key => $value)
                        <li data-target="#carousel-example-1" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}}">
                            <img class="d-block w-100 img-fluid" src="{{ asset('images/'.$value->name) }}" alt="" />
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2>{{$produtDetail->name}}</h2>
                    <h5> <del>$ 60.00</del> ${{$produtDetail->attribute[0]->selling_price}}</h5>
                    <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span>
                        <p>
                            <h4>Short Description:</h4>
                            <p>{{$produtDetail->name}} </p>
                            <form action="{{route('web.payment.detail')}}" method="get">
                                <input type="hidden" name="id" value="{{$produtDetail->id}}">
                                <input type="hidden" name="attribute_id" id="attribute_id" value="{{$produtDetail->attribute[0]->id}}">
                                @csrf
                                @foreach($attribute as $key => $value)
                                <ul>
                                    <h2>{{$value->value}}</h2>
                                    @foreach($value->attribute as $key2 => $val)
                                    <li>
                                    <input type="radio" id="atter{{$key}}" name="atter[{{$key}}]" data-id="{{$val->id}}" value="HTML">
                                    <label for="html{{$key}}">{{$val->attribute_value}}</label><br>
                                        {{-- <div class="form-group size-st">
                                            <a class="btn hvr-hover attributeval" data-id="{{$val->id}}">{{$val->attribute_value}}</a>
                                        </div> --}}
                                    </li>
                                    @endforeach
                                </ul>
                                @endforeach
                                <div>
                                    <div class="subtitle my-3 theme-text">Colors:</div>
                                    <div class="select-colors d-flex">
                                        @foreach($color as $key => $value)
                                        <button type="button" class="btn ">{{$value->name}}</button>
                                        @endforeach

                                    </div>
                                </div>
                                <br>
                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <button class="btn hvr-hover" data-fancybox-close="">Buy Now</button>
                                        <a class="btn hvr-hover {{$userCart->count()>0 ? 'remove-cart' : 'add-cart' }}" data-fancybox-close="" href="javascript:void(0)">{{$userCart->count()>0 ? 'Remove from cart' : 'Add to cart'}}</a>
                                    </div>
                                </div>
                                <form>

                                    <div class="add-to-btn">
                                        <div class="add-comp">
                                            <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                            <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                                        </div>
                                        <div class="share-bar">
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                            <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <h5> $9.79</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <h5> $9.79</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <h5> $9.79</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <h5> $9.79</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <h5> $9.79</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="{{ asset('images/'.$produtDetail->images[0]->name) }}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <h5> $9.79</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <h5> $9.79</h5>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>Lorem ipsum dolor sit amet</h4>
                                <h5> $9.79</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->

@endsection
@section('footer')
<script>
    $(".add-cart").click(function() {
        let quantity = $('#quantity').val();
        let attribute_id = $('#attribute_id').val();
        console.log(attribute_id);
        let product_id = $('#product_id').val()
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
                $('.add-cart').text('Remove from cart')
                //$(".add-cart").attr('class', 'btn hvr-hover remove-cart');

                $(".add-cart").toggleClass('add-cart remove-cart');
                console.log(data.data.product.images[0])
                var url = 'http://127.0.0.1:8000'
                var html = '<li><a href="#" class="photo"><img src=' + url + '/' + data.data.product.images[0].path + ' class="cart-thumb" alt="" /></a><h6><a href="#">' + data.data.product.name + '</a></h6><p>8x - <span class="price">90</span></p></li>'
                $('.cart-list').append(html)
            }
            , error: function(data) {
                console.log(data)
            }
        });

    });

    $(".remove-cart").click(function() {
        let quantity = $('#quantity').val();
        let attribute_id = $('#attribute_id').val();
        console.log(attribute_id);
        let product_id = $('#product_id').val()
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

    $(".attributeval").click(function() {
        $(this).css('border', "solid 4px black");  
        $(this).addClass('activeatter')
        let quantity = $('#quantity').val();
        let attribute_id = $('#attribute_id').val();
        let attribute_val = $(this).data('id')
        console.log(attribute_id, attribute_val);
        let product_id = $('#product_id').val()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post"
            , url: '/user/change/atter'
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

    $("input[type='radio']").change(function(){
        let quantity = $('#quantity').val();
        let attribute_val = $(this).data('id')
        console.log(attribute_id, attribute_val);
        let product_id = $('#product_id').val()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post"
            , url: '/user/change/atter'
            , data: {
                'product_id': product_id
                , 'quantity': quantity
                , 'product_attribute_id': attribute_val
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

</script>
@endsection
