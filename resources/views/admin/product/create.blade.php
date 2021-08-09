@extends('layout')
@section('title','Thêm sản phẩm')

@section('content')
<br><br>
<h3>Thêm mới sản phẩm</h3>
<br><br>
<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" name="price" value="{{old('price')}}" class="form-control">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Giá khuyến mãi</label>
                <input type="text" name="sale_price" value="{{old('sale_price')}}" class="form-control">
                @error('sale_price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="category_id" class="form-control">
                    <option value=""></option>
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control">
                @error('quantity')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Trạng thái</label>
                <br>
                <label for="">
                    <input type="radio" name="status" value="1" checked id="">
                    Nổi bật
                </label>
                <label for="">
                    <input type="radio" name="status" value="0" id="">
                    Sản phẩm không nổi bật
                </label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Màu sắc</label><br>
                <div class="check-box">
                    @foreach($color as $data)
                    <label for="">
                        <input name="id_attr[]" type="checkbox" value="{{$data->id}}" name="" id="">
                        <svg style="color: {{$data->value}};" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square-fill" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                        </svg>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Size</label><br>
                <div class="check-box">
                    @foreach($size as $data)
                    <label for="">
                        <input name="id_attr[]" type="checkbox" value="{{$data->id}}" name="" id="">
                        {{$data->value}}
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="form-floating">
        <label for="floatingTextarea2">Mô tả ngắn</label>
        <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="short_content"></textarea>
        @error('short_content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Nội dung</label>
        <textarea class="form-control" id="summary-ckeditor" name="long_content"></textarea>
        @error('long_content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-primary" href="{{route('admin.products.index')}}">Quay lại</a>
</form>

</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor', {
        filebrowserUploadUrl: "{{route('admin.products.store', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection