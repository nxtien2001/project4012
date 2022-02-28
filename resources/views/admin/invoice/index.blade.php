@extends('layout')

@section('title','Thông tin đơn hàng')

@section('content')
<br>
<h3>Danh sách đơn hàng</h3>
@if(session('message'))
<div class="text-success">{{session('message')}}</div>
@endif
<br>
<table class="table">
    <thead class="thead-dark">
        <tr class="table-warning">
            <th style="color: white;" scope="col">#</th>
            <th style="color: white;" scope="col">Khách hàng</th>
            <th style="color: white;" scope="col">Email</th>
            <th style="color: white;" scope="col">Phone</th>
            <th style="color: white;">Địa chỉ</th>
            <th style="color: white;">Trạng thái</th>
            <th style="color: white;">Action</th>
            <th style="color: white;">Xem chi tiết</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $key => $item)
        <tr class="table-warning">
            <th scope="row">{{$key+1}}</th>
            <td>{{isset($item->user->name) ? $item->user->name : "[Đã xóa]" }}</td>
            <td>{{isset($item->user->email) ? $item->user->email : "[Đã xóa]" }}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->address}}</td>
            <td>
                @if($item->status == config('common.invoice.status.cho_duyet'))
                <a href="{{route('admin.invoices.choduyet' , $item->id)}}">Chờ duyệt</b></a>
                @elseif($item->status == config('common.invoice.status.dang_xu_ly'))
                <a href="{{route('admin.invoices.dangxuly' , $item->id)}}">Đang xử lý</b></a>
                @elseif($item->status == config('common.invoice.status.dang_giao_hang'))
                <a href="{{route('admin.invoices.danggiaohang' , $item->id)}}">Đang giao hàng</b></a>
                @elseif($item->status == config('common.invoice.status.da_giao_hang'))
                <a href="{{route('admin.invoices.dagiaohang' , $item->id)}}">Đã giao hàng</b></a>
                @elseif($item->status == config('common.invoice.status.da_huy'))
                <a href="{{route('admin.invoices.dahuy' , $item->id)}}">Đã hủy</b></a>
                @else($item->status == config('common.invoice.status.chuyen_hoan'))
                <a href="{{route('admin.invoices.chuyenhoan' , $item->id)}}">Hoàn trả</b></a>
                @endif
            </td>
            <td>
                <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                </button>
                <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Xác nhận xóa bản ghi này?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                <form method="POST" action="{{ route('admin.invoices.delete', [ 'id' => $item->id ]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <a class="btn btn-success" href="{{route('admin.invoices.show', ['id'=>$item->id])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-7 text-right text-center-xs">
        {{$invoices->appends(request()->all())->links()}}
    </div>
</div>
@endsection