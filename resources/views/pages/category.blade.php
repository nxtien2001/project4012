@extends('frontend.frontend-master')
@section('content')

<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>{{$category->name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div><br><br>
@if(session('success'))
<div class="text-success" style="font-size: 20px;">{{session('success')}}. <a href="{{route('wishPage')}}">Đi tới danh sách sán phẩm yêu thích</a> </div>
@endif
<!--breadcrumbs area end-->

<!--pos home section-->
<div class=" pos_home_section shop_section shop_fullwidth">
    <div class="row">
        <div class="col-12">
            <!--shop toolbar start-->
            <div class="shop_toolbar mb-35">
                <div class="page_amount">
                    <p><b>{{$category->name}}</b> </p>
                </div>
                <div class="select_option">
                    <form action="#">
                        <label>Lọc theo</label>
                        <select name="orderby" id="short">
                            <option value="1">Giá: Giảm dần</option>
                            <option value="1">Giá: Tăng dần</option>
                        </select>
                    </form>
                </div>
            </div>
            <!--shop toolbar end-->
        </div>
    </div>

    <!--shop tab product-->
    <div class="shop_tab_product shop_fullwidth">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="large" role="tabpanel">
                <div class="row">
                    @foreach($product as $p)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="{{url('/chi-tiet-san-pham/'. $p->slug . '/' . $p->id . '.html' )}}"><img src="{{asset('upload/product/'.$p->image)}}" width="250px" height="250px" alt=""></a>
                                <div class="img_icone">
                                    <img src="assets\img\cart\span-new.png" alt="">
                                </div>
                                <div class="product_action">
                                    <a href="" data-url="{{route('AddCart',['id'=>$p->id])}}" class="add_to_cart"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                @if($p->sale_price > 0)
                                <i style="font-size: 17px;"><del>
                                        {{number_format($p->price)}}đ
                                    </del></i>
                                <span class="product_price">{{number_format($p->sale_price)}}đ</span>
                                @else
                                <span class="product_price">{{number_format($p->price)}}đ</span>
                                @endif
                                <h3 class="product_title"><a href="single-product.html">{{$p->name}}</a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="{{route('addtowishlist',['id'=>$p->id])}}" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!--shop tab product end-->

    <!--pagination style start-->
    <div class="pagination_style shop_page">
        <div class="page_number">
            <!-- <span>Pages: </span>
            <ul>
                <li>«</li>
                <li class="current_number">1</li>
                <li><a href="#">2</a></li>
                <li>»</li>
            </ul> -->
            {{$product->links()}}
        </div>
    </div>
    <!--pagination style end-->
</div>

@endsection