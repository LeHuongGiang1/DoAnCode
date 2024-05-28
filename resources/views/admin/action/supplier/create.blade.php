@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Nhà cung cấp
        <small>Thêm</small>
    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.action.supplier.store") }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tên nhà cung cấp</label>
                <input class="form-control" name="name" placeholder="Tên nhà cung cấp" />
            </div>
            
            <button type="submit" class="btn btn-dark">Thêm</button>

        <form>
    </div>
</div>
@endsection