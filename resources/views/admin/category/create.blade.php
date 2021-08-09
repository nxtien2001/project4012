@extends('layout')
@section('title','Thêm mới danh mục')

@section('content')
<br><br>
<h3>Thêm mới danh mục</h3>
<br><br>
<form action="{{route('admin.categories.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Chọn danh mục cha</label>
        <select class="form-control" name="parent_id">
            <option value="0">Chọn danh mục cha</option>
            @foreach($category as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @if($cate->childrent)
            @foreach($cate->childrent as $c)
            <option value="{{$c->id}}"> -- {{$c->name}}</option>
            @endforeach
            @endif
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Quay lại</a>
</form>
</div>
@endsection