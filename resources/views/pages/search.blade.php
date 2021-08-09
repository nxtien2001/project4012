@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>shop fullwidth</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--pos home section-->
<div class=" pos_home_section shop_section shop_fullwidth">
    <div class="row">
        <div class="col-12">
            <!--banner slider start-->
            <div class="banner_slider fullwidht  mb-35">
                <img src="assets\img\banner\bannner10.jpg" alt="">
            </div>
            <!--banner slider start-->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!--shop toolbar start-->
            <div class="shop_toolbar mb-35">
                <div class="list_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="select_option">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-6">
                                <label>Tìm kiếm theo</label>
                            </div>
                            <div class="col-3">
                                <select class="form-control" name="order_by" id="">
                                    <option value="">Sắp xế theo</option>
                                    @foreach(config('common.product_order_by') as $k => $val)
                                    <option value="{{$k}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-danger">Tìm kiếm</button>
                            </div>
                        </div>
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
                    @foreach($products as $p)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a href="{{url('/chi-tiet-san-pham/'. $p->slug . '/' . $p->id . '.html' )}}"><img src="{{asset('upload/product/' . $p->image)}}" width="250px" height="250px" alt=""></a>
                                <div class="img_icone">
                                    <img src="assets\img\cart\span-new.png" alt="">
                                </div>
                                <div class="product_action">
                                    <a href=""> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <span class="product_price">{{number_format($p->price) }}</span>
                                <h3 class="product_title"><a href="single-product.html">{{$p->name}}</a></h3>
                            </div>
                            <div class="product_info">
                                <ul>
                                    <li><a href="" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="list" role="tabpanel">
                @foreach($products as $pro)
                <div class="product_list_item mb-35">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-5 col-sm-6">
                            <div class="product_thumb">
                                <a href="single-product.html"><img src="{{asset('upload/product/' . $pro->image)}}" alt=""></a>
                                <div class="img_icone">
                                    <img src="assets\img\cart\span-new.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-7 col-sm-6">
                            <div class="list_product_content">
                                <div class="product_ratting">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="list_title">
                                    <h3><a href="">{{$pro->name}}</a></h3>
                                </div>
                                <p class="design"> {{$pro->short_content}}</p>

                                <p class="compare">
                                    <input id="select1" type="checkbox">
                                    <label for="select1">Select to compare</label>
                                </p>
                                <div class="content_price">
                                    @if($pro->sale_price > 0)
                                    <i style="font-size: 17px;"><del>
                                            {{number_format($pro->price)}}đ
                                        </del></i>
                                    <span class="product_price">{{number_format($pro->sale_price)}}đ</span>
                                    @else
                                    <span class="product_price">{{number_format($pro->price)}}đ</span>
                                    @endif
                                </div>
                                <div class="add_links">
                                    <ul>
                                        <li><a href="#" title="add to cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                        <li><a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a></li>

                                        <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!--shop tab product end-->

    <!--pagination style start-->
    <!-- <div class="pagination_style shop_page">
        <div class="item_page">
            <form action="#">
                <label for="page_select">show</label>
                <select id="page_select">
                    <option value="1">9</option>
                    <option value="2">10</option>
                    <option value="3">11</option>
                </select>
                <span>Products by page</span>
            </form>
        </div>
        <div class="page_number">
            <span>Pages: </span>
            <ul>
                <li>«</li>
                <li class="current_number">1</li>
                <li><a href="#">2</a></li>
                <li>»</li>
            </ul>
        </div>
    </div> -->
    <!--pagination style end-->
</div>
<div class="row">
    <div class="col-sm-7 text-right right">
        {{$products->appends(request()->all())->links()}}
    </div>
</div>
<br><br>
@endsection