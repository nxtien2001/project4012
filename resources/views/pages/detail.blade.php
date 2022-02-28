@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>{{$product->name}}</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<br><br>
@if(session('success'))
<div class="text-success" style="font-size: 20px;">{{session('success')}}. <a href="{{route('wishPage')}}">Đi tới danh sách sán phẩm yêu thích</a> </div>
@endif
<!--breadcrumbs area end-->


<!--product wrapper start-->
<div class="product_details">
    <div class="row">
        <div class="col-lg-5 col-md-6">
            <div class="product_tab fix">
                <div class="product_tab_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="" role="tab" aria-controls="p_tab1" aria-selected="false"><img src="assets\img\cart\cart.jpg" alt=""></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="" role="tab" aria-controls="p_tab2" aria-selected="false"><img src="assets\img\cart\cart2.jpg" alt=""></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="" role="tab" aria-controls="p_tab3" aria-selected="false"><img src="assets\img\cart\cart4.jpg" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content produc_tab_c">
                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                        <div class="modal_img">
                            <a href=""><img src="{{asset('upload/product/'.$product->image)}}" alt=""></a>
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
                        <li><a href=""><i class="fa fa-star"></i></a></li>
                        <li><a href=""><i class="fa fa-star"></i></a></li>
                        <li><a href=""><i class="fa fa-star"></i></a></li>
                        <li><a href=""><i class="fa fa-star"></i></a></li>
                        <li><a href=""><i class="fa fa-star"></i></a></li>
                        <li><a href=""> Write a review </a></li>
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
                    <span class="price">{{number_format($product->price)}}đ</span>
                    @endif
                </div>
                <div class="box_quantity mb-20">
                    <form action="#">
                        <label>quantity</label>
                        <input min="0" max="10" value="1" type="number">
                    </form>
                    <a href="" data-url="{{route('AddCart',['id'=>$product->id])}}" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                    <a href="{{route('addtowishlist',['id'=>$product->id])}}" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a>
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
                            <li><a href="">{{$att->value}}</a></li>
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
                        <li><a href=""><i class="fa fa-rss"></i></a></li>
                        <li><a href=""><i class="fa fa-vimeo"></i></a></li>
                        <li><a href=""><i class="fa fa-tumblr"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
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
                            <a class="active" data-toggle="tab" href="" role="tab" aria-controls="info" aria-selected="false">Đánh giá</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="" role="tab" aria-controls="sheet" aria-selected="false">Thông số</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="" role="tab" aria-controls="reviews" aria-selected="false">Chi tiết sản phẩm</a>
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
                                    <li><a href=""><i class="fa fa-star"></i></a></li>
                                    <li><a href=""><i class="fa fa-star"></i></a></li>
                                    <li><a href=""><i class="fa fa-star"></i></a></li>
                                    <li><a href=""><i class="fa fa-star"></i></a></li>
                                    <li><a href=""><i class="fa fa-star"></i></a></li>
                                </ul>
                                <strong>Posthemes</strong>
                                <p>09/07/2018</p>
                            </div>
                        </div>
                        <style type="text/css">
                            .style_comment {
                                border: 1px solid #ddd;
                                border-radius: 10px;
                                background-color: #F0F0F9;
                            }
                        </style>
                        <div class="row style_comment">
                            @foreach($cmt as $c)
                            <div class="col-12">

                                <div class="col-2">
                                    <img src="{{asset('frontend\img\avatar.png')}}" height="70px" alt="">
                                </div>
                                <div class="col-8">
                                    <p> <b>{{$c->name}}</b> </p>
                                    <p>{{$c->content}}</p>
                                </div>
                                <div class="col-2">
                                    <p>{{$c->created_at->format('d/m/Y')}}</p>
                                    <a href="#">Trả lời</a>
                                </div>
                                <!-- bình luận con -->
                                <div class="col-12">

                                    <div class="col-2">
                                        <img src="{{asset('frontend\img\avatar.png')}}" height="70px" alt="">
                                    </div>
                                    <div class="col-8">
                                        <p> <b>{{$c->name}}</b> </p>
                                        <p>{{$c->content}}</p>
                                    </div>
                                    <div class="col-2">
                                        <p>{{$c->created_at->format('d/m/Y')}}</p>
                                        <a href="#">Trả lời</a>
                                    </div>

                                </div>
                            </div>
                            @endforeach
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
                    </div>
                    <div class="product_review_form">
                        <div id="fb-root" class="col-12"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="FhqBo5y2"></script>
                        <div class="fb-comments" data-href="https://www.facebook.com/thoitrangZENO" data-width="1000" data-numposts="5"></div>
                    </div>


                    <div class="tab-pane fade" id="sheet" role="tabpanel">
                        <div class="product_d_table">
                            <form action="#">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="first_child">Compositions</td>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Styles</td>
                                            <td>Girly</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Properties</td>
                                            <td>Short Dress</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="product_info_content">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
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


<!--new product area start-->
<div class="new_product_area product_page">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3>Sản phẩm liên quan</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            @foreach($related as $lq)
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="{{url('/chi-tiet-san-pham/'. $lq->slug . '/' . $lq->id . '.html' )}}"><img src="{{asset('upload/product/' . $lq->image)}}" width="250px" height="250px" alt=""></a>
                        <div class="img_icone">
                            <img src="assets\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="" data-url="{{route('AddCart',['id'=>$lq->id])}}" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        @if($lq->sale_price > 0)
                        <span class="product_price">{{number_format($lq->sale_price)}}đ</span>
                        <del>
                            <p class="old-price">{{number_format($lq->price)}}đ</p>
                        </del>
                        @else
                        <span class="old-price">{{number_format($lq->price)}}đ</span>
                        @endif
                        <h3 class="product_title"><a href="single-product.html">{{$lq->name}}</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="{{route('addtowishlist',['id'=>$lq->id])}}" title=" Add to Wishlist ">Add to Wishlist</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng nhập ngay</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label autocomplete="off" for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="">
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div><br><br>
@endsection