@extends('layout')

@section('title','Thêm mới thuộc tính')

@section('content')
<br>
<section id="main-content">
    <section class="wrapper">
        <h3 style="text-align: center;">Thêm mới thuộc tính</h3>
        <br>
        <form action="{{route('admin.attributes.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên thuộc tính</label>
                <select class="form-control" id="inputName" name="name">
                    <option value="color">Màu sắc</option>
                    <option value="size">Size</option>
                </select>
            </div>
            <div class="mb-3 value1">
                <label class="form-label">Giá trị</label>
                <input type="color" name="value" id="v1" class="form-control ">
            </div>
            <div class="mb-3 value2" style="display: none;">
                <label class="form-label">Giá trị</label>
                <input type="text" name="" value="" id="v2" class="form-control @error('value') is-invalid @enderror">
                @error('value')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Thực hiện</button>
            <a class="btn btn-warning" href="{{route('admin.attributes.index')}}">Quay lại</a>
        </form>
    </section>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#inputName').change(function(event) {
        var _ip = $('#inputName').val();
        if (_ip == 'size') {
            $('.value2').show();
            $('#v2').attr({
                name: 'value',
            });
            $('.value1').hide();
            $('#v1').attr({
                name: '',
            });
        } else {
            $('.value1').show();
            $('#v1').attr({
                name: 'value',
            });
            $('.value2').hide();
            $('#v2').attr({
                name: '',
            });
        }
    });
</script>
@endsection