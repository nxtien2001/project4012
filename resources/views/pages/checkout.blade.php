@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Thanh toán</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
        <div class="col-12">
            <div class="user-actions mb-20">
                <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Bạn chưa đăng nhập?
                    <a class="Returning" href="{{route('login')}}" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click vào đây để đăng nhập</a>
                </h3>
            </div>
            <div class="user-actions mb-20">
                <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                    <div class="checkout_info">
                        <form action="#">
                            <input placeholder="Coupon code" type="text">
                            <input value="Apply coupon" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout_form">
        <form action="{{url('/dat-hang')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Chi tiết hóa đơn</h3>
                    <div class="row">
                        <input type="hidden" name="" value="" id="">
                        <div class="col-12 mb-30">
                            <label>Họ và tên <span>*</span></label>
                            <input type="text" value="{{Auth::user()->name}}" name="name">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-30">
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Thôn - Xã - Huyện - Thành Phố">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label>Số điện thoại<span>*</span></label>
                            <input type="text" value="{{old('phone')}}" name="phone">
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label> Email <span>*</span></label>
                            <input type="text" value="{{Auth::user()->email}}" name="email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <textarea class="form-control" id="" name="note" rows="3">{{old('note')}}</textarea>
                                @error('note')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="order_table table-responsive mb-30">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                $key = 0;
                                @endphp
                                @foreach($carts as $item)
                                @php
                                $total += $item['quantity'] * $item['price'];
                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img src="{{asset('upload/product/'. $item['image'])}}" width="80px" height="80px" alt="">
                                    </td>
                                    <td><b>{{$item['name']}}</b></td>
                                    <td><b>{{$item['quantity']}}</b></td>
                                    <td><b>{{number_format($item['quantity'] * $item['price'])}} đ</b></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"> <b>Tổng tiền</b> </td>
                                    <td><strong>{{number_format($total)}}đ</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="4"> <b>Phí ship cố định</b> </td>
                                    <td><strong>30,000 đ</strong></td>
                                </tr>
                                <tr class="order_total">
                                    <td name="" colspan="4"> <b>Tổng tiền thanh toán</b> </td>
                                    <td><strong>{{number_format($total + 30000)}}đ</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="order_button">
                            <button type="submit">Xác nhận đơn hàng</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection