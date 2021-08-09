@extends('layout')
@section('title','Thêm Bài viết')

@section('content')
<br><br>
<h3>Thêm mới Bài viết</h3>
<br><br>
<form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Tiêu đề bài viết</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="">Trạng thái</label>
                <br>
                <label for="">
                    <input type="radio" name="status" value="1" checked id="">
                    Hiển thị
                </label>
                <label for="">
                    <input type="radio" name="status" value="0" id="">
                    Ẩn bài viết
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea class="form-control" id="" name="description" rows="3">{{old('description')}}</textarea>
    </div>
    <div class="form-group">
        <label for="">Nội dung</label>
        <textarea class="form-control" id="summary-ckeditor" name="content">{{old('content')}}</textarea>
        @error('content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Quay lại</a>
</form>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor', {
        filebrowserUploadUrl: "{{route('admin.posts.store', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection