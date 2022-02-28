@extends('layout')
@section('title','Thông tin đơn hàng')
@section('content')
<br><br>
<div class="row">
    <div class="col-md-6">
        <h3>Thông tin chi tiết đơn hàng</h3>
    </div>
</div>
<br>
<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Số lượng</th>
            <th>Đơn giá</th>
            <th>Ngày tạo</th>
        </tr>
    </thead>
    <tbody>
        @php
        $total = 0;
        @endphp
        @foreach($invoice->invoiceDetails as $key => $item)
        @php

        $total += $item->quantity * $item->unit_price;
        @endphp
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$item->product->name}}</td>
            <td>
                <img src="{{asset('upload/product/' . $item->product->image)}}" alt="" width="80px" height="80px">
            </td>
            <td>{{$item->quantity}}</td>
            <td>{{number_format($item->unit_price)}} đ</td>
            <td>{{date('d-m-Y', strtotime($item->created_at));}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5">Phí ship</td>
            <td>30,000 đ</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan="5">Tổng tiền đơn hàng</td>
            <td>{{number_format($total + 30000)}} đ</td>
        </tr>
    </tbody>
</table>
@endsection