@extends('frontend.frontend-master')
@section('content')

<div class="row">
    <!--banner slider start-->
    <div class="col-12">
        <div class="banner_slider slider_two">
            <div class="slider_active owl-carousel">
                <div class="single_slider" style="background-image: url(frontend/img/slider/slider_2.png)">
                    <div class="slider_content">
                        <div class="slider_content_inner">
                            <h1>fashion for you</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Cumque eligendi quia, ratione porro, nemo non.</p>
                            <a href="">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="single_slider" style="background-image: url(frontend/img/slider/slide_4.png)">
                    <div class="slider_content">
                        <div class="slider_content_inner">
                            <h1>fashion for you</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Cumque eligendi quia, ratione porro, nemo non.</p>
                            <a href="">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="single_slider" style="background-image: url(frontend/img/slider/slider_3.png)">
                    <div class="slider_content">
                        <div class="slider_content_inner">
                            <h1>fashion for you</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Cumque eligendi quia, ratione porro, nemo non.</p>
                            <a href="">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--banner slider start-->
    </div>
</div>
<div>
    @if(session('order'))
    <div class="text-success">{{session('order')}}</div>
    @endif
    @if(session('success'))
    <div class="text-success" style="font-size: 20px;">{{session('success')}}. <a href="{{route('wishPage')}}">Đi tới danh sách sán phẩm yêu thích</a> </div>
    @endif
</div>
<!--new product area start-->
<div class="new_product_area product_two">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3>Sản phẩm mới</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            @foreach($newProducts as $n)
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="{{url('/chi-tiet-san-pham/'. $n->slug . '/' . $n->id . '.html' )}}"><img src="{{asset('upload/product/' . $n->image)}}" width="250px" height="250px" alt=""></a>
                        <div class="img_icone">
                            <img src="frontend\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="" data-url="{{route('AddCart',['id'=>$n->id])}}" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">{{number_format($n->price)}} đ</span>
                        <h3 class="product_title"><a href="{{url('/chi-tiet-san-pham/'. $n->slug . '/' . $n->id . '.html' )}}">{{$n->name}}</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="{{route('addtowishlist',['id'=>$n->id])}}" title=" Add to Wishlist ">Add to Wishlist</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="new_product_area product_two">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3>Sản phẩm khuyến mãi</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            @foreach($sale_products as $sale)
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="{{url('/chi-tiet-san-pham/'. $sale->slug . '/' . $sale->id . '.html' )}}"><img src="{{asset('upload/product/' . $sale->image)}}" width="250px" height="250px" alt=""></a>
                        <div class="img_icone">
                            <img src="frontend\img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="" data-url="{{route('AddCart',['id'=>$sale->id])}}" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        @if($sale->sale_price > 0)
                        <i style="font-size: 17px;"><del>
                                {{number_format($sale->price)}}đ
                            </del></i>
                        <span class="product_price">{{number_format($sale->sale_price)}}đ</span>
                        @else
                        <span class="product_price">{{number_format($sale->price)}}đ</span>
                        @endif
                        <h3 class="product_title"><a href="{{url('/chi-tiet-san-pham/'. $sale->slug . '/' . $sale->id . '.html' )}}">{{$sale->name}}</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="{{route('addtowishlist',['id'=>$sale->id])}}" title=" Add to Wishlist ">Add to Wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!--featured product area start-->
<div class="new_product_area product_two">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3>Sản phẩm nổi bật</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            @foreach($topProducts as $top)
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="{{url('/chi-tiet-san-pham/'. $top->slug . '/' . $top->id . '.html' )}}"><img src="{{asset('upload/product/' . $top->image)}}" width="250px" height="250px" alt=""></a>
                        <div class="product_action">
                            <a href="" data-url="{{route('AddCart',['id'=>$top->id])}}" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        @if($top->sale_price > 0)
                        <i style="font-size: 17px;"><del>
                                {{number_format($top->price)}}đ
                            </del></i>
                        <span class="product_price">{{number_format($top->sale_price)}}đ</span>
                        @else
                        <span class="product_price">{{number_format($top->price)}}đ</span>
                        @endif
                        <h3 class="product_title"><a href="{{url('/chi-tiet-san-pham/'. $top->slug . '/' . $top->id . '.html' )}}">{{$top->name}}</a></h3>
                    </div>
                    <div class="product_info">
                        <ul>
                            <li><a href="{{route('addtowishlist',['id'=>$sale->id])}}" title=" Add to Wishlist ">Add to Wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--featured product area start-->

<!--blog area start-->
<div class="blog_area blog_two">
    <div class="row">
        @foreach($post as $p)
        <div class="col-lg-4 col-md-6">
            <div class="single_blog">
                <div class="blog_thumb">
                    <a href=""><img src="{{asset('upload/product/' . $p->image)}}" width="300px" height="250px" alt=""></a>
                </div>
                <div class="blog_content">
                    <div class="blog_post">
                        <ul>
                            <li>
                                <!-- <a href="#">Tech</a> -->
                            </li>
                        </ul>
                    </div>
                    <h3><a href="">{{$p->description}}</a></h3>
                    <div class="post_footer">
                        <div class="post_meta">
                            <ul>
                                <li>{{ $p->created_at->format('d/m/Y')}}</li>
                                <!-- <li>3 Comments</li> -->
                            </ul>
                        </div>
                        <div class="Read_more">
                            <a href="">Read more <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--blog area end-->

<!--brand logo strat-->
<div class="brand_logo brand_two">
    <div class="block_title">
        <h3>Brands</h3>
    </div>
    <div class="row">
        <div class="brand_active owl-carousel">
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="frontend\img\brand\brand1.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="frontend\img\brand\brand2.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="frontend\img\brand\brand3.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="frontend\img\brand\brand4.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="frontend\img\brand\brand5.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="single_brand">
                    <a href="#"><img src="frontend\img\brand\brand6.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--brand logo end-->
@endsection