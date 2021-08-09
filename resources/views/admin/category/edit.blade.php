@extends('layout')
@section('title','Cập nhật danh mục')

@section('content')
<br><br>
<h3>Cập nhật danh mục</h3>
<br>
<form action="{{route('admin.categories.update',['id'=>$data->id])}}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" name="name" value="{{$data->name}}" class="form-control">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="">Danh mục cha</label>
            <select class="form-control" name="parent_id">
                <option value="0">Chọn danh mục cha</option>

                @foreach($data as $cate)
                @if($cate->parent_id == 0 )
                <option value="{{$cate->id}}" {{$cate->id == $categories->parent_id ? 'selected' : ''}}>{{$cate->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Quay lại</a>
</form>
@endsection