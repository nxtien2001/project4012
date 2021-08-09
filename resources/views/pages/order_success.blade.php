@extends('frontend.frontend-master')
@section('content')
<div class="error_section">
    <div class="row">
        <div class="col-12">
            <div class="error_form">
                <!-- <h1>404</h1> -->
                <h2>Đặt hàng thành công!</h2>
                <p>Cảm ơn bạn đã mua hàng tại shop!<br> Vui lòng check mail để xác nhận đơn hàng!</p>
                <form action="{{URL::to('search/')}}" method="get">
                    <input name="key" placeholder="Search..." type="text">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <a href="{{url('/')}}">Quay về trang chủ</a>
            </div>
        </div>
    </div>
</div>

@endsection