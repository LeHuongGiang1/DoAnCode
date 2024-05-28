@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Thêm Thiết bị

    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.device.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label >Danh mục</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label >Kho</label>
                <select name="depot_id" class="form-control">
                    @foreach ($depots as $depot)
                        <option value="{{ $depot->id }}">{{ $depot->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="name" placeholder="Tên thiết bị" />
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="file"  class="form-control" name="image" accept="image/*" />
            </div>

            <div class="form-group">
                <label>Cấu hình</label>
                <input class="form-control" name="configuration" placeholder="Cấu hình" />
            </div>
            <button type="submit" class="btn btn-dark">Thêm</button>

        <form>
    </div>
</div>
@endsection
