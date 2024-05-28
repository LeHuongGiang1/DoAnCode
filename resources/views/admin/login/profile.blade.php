@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Thông tin cá nhân</h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif
     
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.profile.update") }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Tên người dùng</label>
                <input class="form-control" name="name" value="{{ auth()->user()->name }}" placeholder="Tên người dùng" />
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input class="form-control" name="phone" value="{{ auth()->user()->phone }}"  placeholder="Số điện thoại" />
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input class="form-control" name="address" value="{{ auth()->user()->address }}" placeholder="Địa chỉ" />
            </div>
            
           
            <button type="submit" class="btn btn-dark">Cập nhật</button>

        </form>
    </div>
</div>
@endsection