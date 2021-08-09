@extends('layout')

@section('title','Thông tin đơn hàng')

@section('content')

<br><br>
@if($invoice != null)
<div class="row">
    <div class="col-md-6">
        <h3>Chi tiết đơn hàng</h3>
    </div>
</div>
<br>
<table class="table table-success table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Số lượng</th>
            <th>Thành tiền</th>
            <th>Ngày tạo</th>
        </tr>
    </thead>
    <tbody>
        @php
        $total = 0;
        @endphp
        @foreach($invoice->invoiceDetails as $key => $item)
        @php
        $total += $item->unit_price;
        @endphp
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$item->product->name}}</td>
            <td>
                <img src="{{asset('upload/product/' . $item->product->image)}}" alt="" width="80px" height="80px">
            </td>
            <td>{{$item->quantity}}</td>
            <td>{{number_format($item->unit_price)}} đ</td>
            <td>{{date('d-m-Y H:i:s', strtotime($item->created_at));}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2" class="table-active">Phí ship</td>
            <td>30,000 đ</td>
        </tr>
        <tr>
            <td colspan="2" class="table-active">Tổng tiền đơn hàng</td>
            <td>{{number_format($total + 30000)}} đ</td>
        </tr>
    </tbody>
</table>
<a href="{{route('admin.invoices.index')}}">
    <button type="submit" class="btn btn-primary">Quay lại</button>
</a>
@else
<h4>Người dùng này chưa có đơn hàng nào. <a href="{{route('admin.invoices.index')}}">Quay lại</a></h4>
@endif
@endsection