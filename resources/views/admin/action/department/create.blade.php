@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Thêm phòng ban
        <small></small>
    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.action.department.store") }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên phòng ban</label>
                <input class="form-control" name="name" placeholder="Tên phòng ban" />
            </div>
            <div class="form-group">
                <label>Người quản lý</label>
                <input class="form-control" name="manager" placeholder="Người quản lý" />
            </div>
            <div class="form-group">
                <label>Địa chỉ phòng ban</label>
                <input class="form-control" name="address" placeholder="Địa chỉ phòng ban" />
            </div>
            <button type="submit" class="btn btn-dark">Thêm</button>

        <form>
    </div>
</div>
@endsection