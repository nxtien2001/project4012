<div class="header_area">
    <!--header top-->
    <div class="header_top">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="switcher">
                    <ul>
                        <li class="languages"><a href=""><img src="frontend\img\logo\fontlogo.jpg" alt=""> English <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_languages">
                                <li><a href=""><img src="frontend\img\logo\fontlogo.jpg" alt=""> English</a></li>
                                <li><a href=""><img src="frontend\img\logo\fontlogo2.jpg" alt=""> French </a></li>
                            </ul>
                        </li>

                        <li class="currency"><a href=""> Currency : $ <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_currency">
                                <li><a href=""> Dollar (USD)</a></li>
                                <li><a href=""> Euro (EUR) </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header_links">
                    <ul>
                        @php
                        $qty = App\Models\Wishlist::where('user_id',Auth::id())->get();
                        $wish = App\Models\Wishlist::where('user_id',Auth::id())->get();
                        @endphp
                        <li><a href="{{route('login')}}" title="Login">Đăng nhập</a></li>
                        <li><a href="{{route('getResign')}}" title="Login">Đăng kí</a></li>
                        <li><a href="{{route('ShowCart')}}" title="My cart">Giỏ hàng ( {{count($qty)}} )</a></li>
                        @auth
                        <li><a href="" title="Login">Chào <b>{{ Auth::user() ->name}}</b> </a></li>
                        <li><a href="{{route('wishPage')}}" title="wishlist">Yêu thích ( {{count($wish)}} )</a></li>
                        <li><a href="{{route('auth.logout')}}" title="Login">Logout</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--header top end-->

    <!--header middel-->
    <div class="header_middel">
        <div class="row align-items-center">
            <!--logo start-->
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="frontend\img\logo\logo.jpg.png" alt=""></a>
                </div>
            </div>
            <!--logo end-->
            <div class="col-lg-9 col-md-9">
                <div class="header_right_info">
                    <div class="search_bar">
                        <form action="{{URL::to('search/')}}" method="get">
                            <input name="key" autocomplete="off" placeholder="Search..." type="text">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- <div class="shopping_cart">
                        <a href="#"><i class="fa fa-shopping-cart"></i> 2Items - $209.44 <i class="fa fa-angle-down"></i></a>
                        <div class="mini_cart">
                            <div class="cart_item">
                                <div class="cart_img">
                                    <a href="#"><img src="frontend\img\cart\cart.jpg" alt=""></a>
                                </div>
                                <div class="cart_info">
                                    <a href="#">lorem ipsum dolor</a>
                                    <span class="cart_price">$115.00</span>
                                    <span class="quantity">Qty: 1</span>
                                </div>
                                <div class="cart_remove">
                                    <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                </div>
                            </div>
                            <div class="cart_item">
                                <div class="cart_img">
                                    <a href="#"><img src="frontend\img\cart\cart2.jpg" alt=""></a>
                                </div>
                                <div class="cart_info">
                                    <a href="#">Quisque ornare dui</a>
                                    <span class="cart_price">$105.00</span>
                                    <span class="quantity">Qty: 1</span>
                                </div>
                                <div class="cart_remove">
                                    <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                </div>
                            </div>
                            <div class="shipping_price">
                                <span> Shipping </span>
                                <span> $7.00 </span>
                            </div>
                            <div class="total_price">
                                <span> total </span>
                                <span class="prices"> $227.00 </span>
                            </div>
                            <div class="cart_button">
                                <a href="checkout.html"> Check out</a>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <div class="header_bottom">
        <div class="row">
            <div class="col-12">
                <div class="main_menu_inner">
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{route('home')}}">Home</a>
                                </li>
                                </li>
                                @foreach($categories as $cate)
                                <li><a href="#">{{$cate->name}}</a>
                                    <div class="mega_menu jewelry">
                                        <div class="mega_items jewelry">
                                            @include('frontend.menuChild',['cate'=>$cate])
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <li><a href="">contact us</a></li>

                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-menu d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="{{route('home')}}">Home</a>
                                    <div>
                                        <div>
                                            <ul>
                                                <li><a href="{{route('home')}}">Home 1</a></li>
                                                <li><a href="index-2.html">Home 2</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="">blog</a>
                                    <div>
                                        <div>
                                            <ul>
                                                <li><a href="">blog details</a></li>
                                                <li><a href="">blog fullwidth</a></li>
                                                <li><a href="">blog sidebar</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="">contact us</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>