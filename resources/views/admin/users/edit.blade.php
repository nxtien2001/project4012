@extends('layout')
@section('title','Edit user')

@section('content')
<br><br>
<h3>Cập nhật user</h3>
<br>
<form action="{{route('admin.users.update',['id'=>$data->id])}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Tên</label>
        <input type="text" name="name" value="{{$data->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" value="{{$data->email}}" class="form-control">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="address" value="{{$data->address}}" class="form-control">
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label>Giới tính</label>
        <select name="gender" class="form-control">
            <option {{$data->gender==1 ? "selected" : ""}} value="1">Male</option>
            <option {{$data->gender==0 ? "selected" : ""}} value="0">Female</option>
        </select>
    </div>
    <div class="form-group">
        <label>Phân quyền</label>
        <select name="role" class="form-control">
            <option {{$data->role==1 ? "selected" : ""}} value="1">Admin</option>
            <option {{$data->role==1 ? "selected" : ""}} value="0">User</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    <a class="btn btn-primary" href="{{route('admin.users.index')}}">Quay lại</a>
</form>
@endsection