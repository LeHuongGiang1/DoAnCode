@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Tạo tài khoản người dùng
    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.user.store") }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên người dùng</label>
                <input class="form-control" name="name" placeholder="Tên người dùng" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" type="email" placeholder="Email" />
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input class="form-control" name="password" type="password" placeholder="******" />
            </div>
            <div class="form-group">
                <label>Xác nhận mật khẩu</label>
                <input class="form-control" name="confirm" type="password" placeholder="******" />
            </div>
            <div class="form-group">
                <label>Chức vụ</label>
                <label  class="radio-inline">
                    <input type="radio" name="is_admin" value="0" checked> Nhân viên
                </label>
                <label  class="radio-inline">
                    <input type="radio" name="is_admin" value="1"> Người quản lý
                </label>
            </div>
            <button type="submit" class="btn btn-dark">Tạo</button>

        </form>
    </div>
</div>
@endsection