@extends('layout')

@section('title','Quản lý bình luận')

@section('content')

@if(!empty($comments))
<br><br>
<div class="row">
    <div class="col-md-6">
        <h3> Danh sách bình luận</h3>
        @if(session('message'))
        <div class="text-success">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>
<br>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <td>#</td>
            <td>Tên</td>
            <td>Email</td>
            <td>Nội dung bình luận</td>
            <td>Sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Ngày tạo</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $key => $item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->content}}</td>
            <td>{{isset($item->prroduct->name) ? $item->product->name : "[Đã xóa]" }}</td>
            <td>
                <img src="{{asset('upload/product/' . $item->product->image)}}" width="70px" height="70px" alt="">
            </td>
            <td>{{date('d-m-Y', strtotime($item->created_at));}}</td>
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

                                <form method="POST" action="{{ route('admin.comments.delete', [ 'id' => $item->id ]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-7 text-right text-center-xs">
        {{$comments->appends(request()->all())->links()}}
    </div>
</div>
@else
<h2>Không có dữ liệu</h2>
@endif


@endsection

@push('scrip')
<script>
    $("#form_create").on('submit', function(event) {
        event.preventDefault();
        const url = "{{route('admin.users.store')}}";

        let name = $("form_create input[name='name']").val();
        let email = $("form_create input[name='email']").val();
        let address = $("form_create input[name='address']").val();
        let password = $("form_create input[name='password']").val();
        let gender = $("form_create select[name='gender']").val();
        let role = $("form_create select[name='role']").val();
        let _token = $("form_create input[name='_token']").val();

        const data = {
            _token,
            name,
            email,
            password,
            gender,
            role,
        };
        console.log(data);

        fetch(url, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    "X-CSRF-Token": _token,
                    "Content-Type": "applycation/json",
                    "Accept": "applycation/json",
                    "X-Request-With": "XMLHttpRequest",
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (data.status == 200) {
                    window.location.reload();
                }
            })
    });
</script>
@endpush