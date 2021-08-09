@extends('frontend.frontend-master')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Đăng kí</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="row">
        <!--login area start-->

        <!--register area start-->

        <div class="col-lg-12 col-md-6">
            <div class="account_form register">
                <h2>Đăng kí</h2>
                <form action="#" method="post">
                    @csrf
                    <p>
                        <label>Email <span>*</span></label>
                        <input type="text" value="{{old('email')}}" name="email">
                        @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </p>
                    <p>
                        <label>Họ tên khách hàng<span>*</span></label>
                        <input type="text" value="{{old('name')}}" name="name">
                        @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </p>
                    <p>
                        <label>Địa chỉ <span>*</span></label>
                        <input type="text" value="{{old('address')}}" name="address">
                        @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </p>
                    <p>
                        <label>Mật khẩu <span>*</span></label>
                        <input type="password" name="password">
                        @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </p>
                    <div class="form-group">
                        <label for="">Giới tính</label>
                        <br>
                        <select name="gender" class="form-control">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div><br><br>
                    <div class="login_submit">
                        <button type="submit">Đăng kí</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--register area end-->
</div>
@endsection