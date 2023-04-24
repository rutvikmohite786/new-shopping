<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
        <div class="row">
            @if($subcategory->count()>0)
            @foreach($subcategory as $key => $value)
            @if(isset($value->product[0]))
            @foreach($value->product as $key2 => $val)

            @if($brand_id!='')
            @if($val->brand == '')

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

            @endif
            @else

            @if(isset($val->attribute[$key2]))
            <input type="hidden" value="{{$val->attribute[$key2]->id}}" id="product_attribute{{$val->id}}">
            @endif

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        @if(isset($val->images[0]))
                        <img src="{{ asset('images/'.$val->images[0]->name) }}" class="img-fluid" alt="Image">
                        @endif
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
                    </div>
                </div>
            </div>

            @endif

            @endforeach

            <div class="container">
                <h1>No Product Found</h1>
            </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>

    <!--grid view-->

    <div role="tabpanel" class="tab-pane fade" id="list-view">

        <div class="list-view-box">
            <div class="row">
                @foreach($subcategory as $key => $value)
                @if($value->product)
                @foreach($value->product as $key2 => $val)

                @if($brand_id!='')
                @if($val->brand == '')
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new"></p>
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

                @endif
                @endif

                @endforeach
                @endif
                @endforeach
            </div>
        </div>
    </div>

</div>
