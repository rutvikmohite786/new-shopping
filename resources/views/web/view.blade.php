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
.activeAttr{
    background-color: #d33b33
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
                        <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                            <img class="d-block w-100 img-fluid" src="images/smp-img-01.jpg" alt="" />
                        </li>
                        <li data-target="#carousel-example-1" data-slide-to="1">
                            <img class="d-block w-100 img-fluid" src="images/smp-img-02.jpg" alt="" />
                        </li>
                        <li data-target="#carousel-example-1" data-slide-to="2">
                            <img class="d-block w-100 img-fluid" src="images/smp-img-03.jpg" alt="" />
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2>{{$produtDetail->name}}</h2>
                    <h5> <del>$ 60.00</del> ${{$produtDetail->attribute[0]->selling_price}}</h5>
                    <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span><p>
                            <h4>Short Description:</h4>
                            <p>{{$produtDetail->name}} </p>
                            <form action="{{route('web.payment.detail')}}" method="get">
                            <input type="hidden" name="id" value="{{$produtDetail->id}}">

                            @csrf
                            <ul>
                                <li>
                                    <div class="form-group size-st">
                                        <label class="size-label"></label>
                                        <select id="basic" class="selectpicker show-tick form-control" name="size">
                                            @foreach($produtDetail->attribute as $key => $value) 
                                            <option value="{{$value->id}}">{{$value->attribute_value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group quantity-box">
                                        <label class="control-label">Quantity</label>
                                        <input class="form-control" name="quantity" id="quantity" value="1" min="1" max="20" type="number">
                                    </div>
                                </li>
                            </ul>

                            {{-- @foreach($produtDetail->attribute as $key => $value) 
                            @if($key==0)
                            <h2>{{$value->atter->value}}</h2>
                            <input type="hidden" value="{{$value->id}}" name="attribute_id">
                            @endif
                            <ul class="{{$key == 0 ? 'activeAttr' :'' }}" id="{{$value->atter->id}}">
                                <li>
                                    <div class="form-group size-st">
                                        <label class="size-label">Size</label>
                                        <input class="form-control" id="quantity" value="{{$value->attribute_value}}" type="text">
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group quantity-box">
                                        <label class="control-label">Price</label>
                                        <input class="form-control" id="quantity"  type="text" value="{{$value->selling_price}}">
                                    </div>
                                </li>
                            </ul>
                            @endforeach --}}

                            <div class="price-box-bar">
                                <div class="cart-and-bay-btn">
                                    <button class="btn hvr-hover" data-fancybox-close="" >Buy Now</button>
                                    <a class="btn hvr-hover add-cart" data-fancybox-close="" href="javascript:void(0)">Add to cart</a>
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
        let attribute_id = $('.activeAttr').attr('id');
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
                , 'quantity': quantity,
                'product_attribute_id':attribute_id
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
