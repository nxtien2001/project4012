@extends('layout')
@section('title','Add user')

@section('content')
<br><br>
<h3>Thêm mới user</h3>
<br><br>
<form action="{{route('admin.users.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Tên</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control ">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Mật khẩu</label>
        <input type="password" name="password" class="form-control">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" value="{{old('email')}}" name="email" class="form-control">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" value="{{old('address')}}" class="form-control">
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Giới tính</label>
        <select name="gender" class="form-control">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>
        @error('gender')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Phân quyền</label>
        <select name="role" class="form-control">
            <option value="1">User</option>
            <option value="0">Admin</option>
        </select>
        @error('role')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-primary" href="{{route('admin.users.index')}}">Quay lại</a>
</form>
</div>
@endsection