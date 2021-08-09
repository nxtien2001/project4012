@extends('layout')

@section('title','Quản lý user')

@section('content')

@if(!empty($data))
<br><br>
<div class="row">
    <div class="col-md-6">
        <h3> Danh sách User</h3>
    </div>
    <div class="col-md-6">
        <a href="{{route('admin.users.create-user')}}" class="btn btn-success float-right m-2">
            Thêm mới
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
            </svg>
        </a>
    </div>
    <!-- <button class="btn btn-success" role="button" data-toggle="modal" data-target="#modal_create">Thêm mới</button>

    <div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="form_create" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="mt-3">
                            <label>Name</label>
                            <input class="mt-3 form-control" type="text" name="name" />
                        </div>
                        <div class="mt-3">
                            <label>Email</label>
                            <input class="mt-3 form-control" type="email" name="email" />
                        </div>
                        <div class="mt-3">
                            <label>Address</label>
                            <input class="mt-3 form-control" type="text" name="address" />
                        </div>
                        <div class="mt-3">
                            <label>Password</label>
                            <input class="mt-3 form-control" type="password" name="password" />
                        </div>

                        <div class="mt-3">
                            <label>Gender</label>
                            <select class="mt-3 form-control" name="gender">
                                <option value="{{ config('common.user.gender.male') }}">
                                    Male
                                </option>
                                <option value="{{ config('common.user.gender.female') }}">
                                    Female
                                </option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label>Role</label>
                            <select class="mt-3 form-control" name="role">
                                <option value="{{ config('common.user.role.user') }}">
                                    User
                                </option>
                                <option value="{{ config('common.user.role.admin') }}">
                                    Admin
                                </option>
                            </select>
                        </div>

                        <div class="mt-3">
                            <button class="mt-3 btn btn-primary">Create</button>
                            <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div> -->
</div>
<br>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <td>#</td>
            <td>Tên</td>
            <td>Email</td>
            <td>Địa chỉ</td>
            <td>SL đơn hàng đã mua</td>
            <td>Giới tính</td>
            <td>Phân quyền</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $item)
        <tr>
            <td>{{$key+1}}</td>
            <td>
                <a href="{{route('admin.users.show', ['id'=>$item->id])}}">{{$item->name}}</a>
            </td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->invoices()->count()}}</td>
            <td>{{$item->gender == config('common.user.gender.male') ? "Nam" : "Nữ"}}</td>
            <td>{{$item->role == config('common.user.role.user') ? "User" : "Admin"}}</td>
            <td>
                <a href="{{route('admin.users.edit',['id'=>$item->id])}}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
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

                                <form method="POST" action="{{ route('admin.users.delete', [ 'id' => $item->id ]) }}">
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
        {{$data->appends(request()->all())->links()}}
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