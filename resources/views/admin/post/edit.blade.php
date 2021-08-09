@extends('layout')
@section('title','Cập nhật Bài viết')

@section('content')
<br><br>
<h3>Chỉnh sửa Bài viết</h3>
<br><br>
<form action="{{route('admin.posts.update',['id' => $posts->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Tiêu đề bài viết</label>
        <input type="text" name="name" value="{{$posts->name}}" class="form-control">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type="file" name="image" value="{{$posts->image}}" class="form-control">
                <div class="div">
                    @if($posts->image)
                    <img src="{{asset('upload/product/' . $posts->image)}}" width="200px" height="200px" alt="">
                    @endif
                </div>
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
                    Hiển thị bài viết
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
        <textarea class="form-control" id="" name="description" rows="3">{{$posts->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="">Nội dung</label>
        <textarea class="form-control" id="summary-ckeditor" name="content">{{$posts->content}}</textarea>
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