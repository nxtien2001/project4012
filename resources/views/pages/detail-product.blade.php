@extends('frontend.frontend-master')
@section('content')

<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Chi tiết sản phẩm</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--product wrapper start-->
<div class="product_details">
    <div class="row">
        <div class="col-lg-5 col-md-6">
            <div class="product_tab fix">
                <div class="product_tab_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="assets\img\cart\cart.jpg" alt=""></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2" aria-selected="false"><img src="assets\img\cart\cart2.jpg" alt=""></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3" aria-selected="false"><img src="assets\img\cart\cart4.jpg" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content produc_tab_c">
                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{{asset('upload/product/'.$product->image)}}" alt=""></a>
                            <div class="img_icone">
                                <img src="assets\img\cart\span-new.png" alt="">
                            </div>
                            <div class="view_img">
                                <a class="large_view" href="{{asset('upload/product/'.$product->image)}}"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-7 col-md-6">
            <div class="product_d_right">
                <h1>{{$product->name}}</h1>
                <div class="product_ratting mb-10">
                    <ul>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"> Đánh giá </a></li>
                    </ul>
                </div>
                <div class="product_desc">
                    <p>{{$product->short_content}}</p>
                </div>

                <div class="content_price mb-15">
                    @if($product->sale_price > 0)
                    <span class="product_price">{{number_format($product->sale_price)}}đ</span>
                    <span class="old-price">{{number_format($product->price)}}đ</span>
                    @else
                    <span class="old-price">{{number_format($product->price)}}đ</span>
                    @endif
                </div>
                <div class="box_quantity mb-20">
                    <form action="#">
                        <label>quantity</label>
                        <input min="0" max="100" value="1" type="number" name="quantity">
                    </form>
                    <a href="" data-url="" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                    <a href="" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
                </div>
                <div class="product_d_size mb-20">
                    <label for="group_1">size</label>
                    <select name="size" id="group_1">
                        @foreach($product->attributes as $att)
                        @if($att->name == 'size')
                        <option value="">{{$att->value}}</option>
                        @endif
                        @endforeach

                    </select>
                </div>

                <div class="sidebar_widget color">
                    <h2>Choose Color</h2>
                    <div class="widget_color">
                        <ul>
                            @foreach($product->attributes as $att)
                            @if($att->name == 'color')
                            <li><a href="#">{{$att->value}}</a></li>
                            @endif
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="product_stock mb-20">
                    <p>Còn lại:</p>
                    <span> {{$product->quantity}} sản phẩm </span>
                </div>
                <div class="wishlist-share">
                    <h4>Share on:</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!--product details end-->


<!--product info start-->
<div class="product_d_info">
    <div class="row">
        <div class="col-12">
            <div class="product_d_inner">
                <div class="product_info_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Đánh giá</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Chi tiết sản phẩm</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <div class="product_info_content">
                            <p></p>
                        </div>
                        <div class="product_info_inner">
                            <div class="product_ratting mb-10">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                                <strong>Posthemes</strong>
                                <p>09/07/2018</p>
                            </div>
                            <!-- <div class="product_demo">
                                <strong>demo</strong>
                                <p>That's OK!</p>
                            </div> -->
                        </div>
                        <style type="text/css">
                            .style_comment {
                                border: 1px solid #ddd;
                                border-radius: 10px;
                                background-color: #F0F0F9;
                            }
                        </style>
                        <div class="row style_comment">
                        </div><br>
                        <div class="product_review_form">
                            <form action="#" method="post">
                                @csrf
                                <h2>Thêm bình luận</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <label for="author">Name</label>
                                        <input id="author" name="name" type="text">

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label for="email">Email </label>
                                        <input id="email" name="email" type="text">
                                    </div>
                                    <div class="col-12">
                                        <label for="review_comment">Your review </label>
                                        <textarea name="content" id="review_comment"></textarea>
                                    </div>

                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="product_review_form">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="Nl9m2NHP"></script>
                            <div class="fb-comments" data-href="http://127.0.0.1:8000" data-width="1000" data-numposts="5"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="product_info_content">
                            <p>{!!$product->long_content!!}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->


<!--new product area start-->
<div class="new_product_area product_page">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3> 11 other products category:</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product1.jpg" alt=""></a>
                        <div class="img_icone">
                            <img src="assets\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$50.00</span>
                        <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product2.jpg" alt=""></a>
                        <div class="hot_img">
                            <img src="assets\img\cart\span-hot.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$40.00</span>
                        <h3 class="product_title"><a href="single-product.html">Quisque ornare dui</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product3.jpg" alt=""></a>
                        <div class="img_icone">
                            <img src="assets\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$60.00</span>
                        <h3 class="product_title"><a href="single-product.html">Sed non turpiss</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product4.jpg" alt=""></a>
                        <div class="hot_img">
                            <img src="assets\img\cart\span-hot.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$65.00</span>
                        <h3 class="product_title"><a href="single-product.html">Duis convallis</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product6.jpg" alt=""></a>
                        <div class="img_icone">
                            <img src="assets\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$50.00</span>
                        <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--new product area start-->


<!--new product area start-->
<div class="new_product_area product_page">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3> Related Products</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product6.jpg" alt=""></a>
                        <div class="img_icone">
                            <img src="assets\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$50.00</span>
                        <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product5.jpg" alt=""></a>
                        <div class="hot_img">
                            <img src="assets\img\cart\span-hot.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$40.00</span>
                        <h3 class="product_title"><a href="single-product.html">Quisque ornare dui</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product4.jpg" alt=""></a>
                        <div class="img_icone">
                            <img src="assets\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$60.00</span>
                        <h3 class="product_title"><a href="single-product.html">Sed non turpiss</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product3.jpg" alt=""></a>
                        <div class="hot_img">
                            <img src="assets\img\cart\span-hot.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$65.00</span>
                        <h3 class="product_title"><a href="single-product.html">Duis convallis</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="single-product.html"><img src="assets\img\product\product2.jpg" alt=""></a>
                        <div class="img_icone">
                            <img src="assets\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">$50.00</span>
                        <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--new product area start-->

@endsection