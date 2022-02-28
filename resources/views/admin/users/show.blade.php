@extends('layout')

@section('title','Thông tin thành viên')

@section('content')

<br><br>
<div class="row">
    <div class="col-md-6">
        <h3>Thông tin Thành viên</h3>
    </div>
</div>
<br>
<div class="row">
    <div class="col-12">
        <div class="col-6">
            <b>Khách hàng:</b> <label for=""> {{$user->name}}</label><br>
            <b>Email:</b> <label for=""> {{$user->email}}</label>
        </div>
        <div class="col-6">

        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sdt</th>
            <th scope="col">Địa chỉ</th>
            <th>Giá</th>
            <th>Trạng thái đơn hàng</th>
            <th>Ngày tạo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->invoices as $key=>$item)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <th>{{$item->phone}}</th>
            <th>{{$item->address}}</th>
            <th>{{$item->total_price}}</th>
            <th>{{$item->status}}</th>
            <th>{{$item->created_at}}</th>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection