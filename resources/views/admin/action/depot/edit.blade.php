@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Kho
        <small>Sửa</small>
    </h1>
    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
            {{ $err }}
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route("admin.action.depot.update", $depots->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Tên kho</label>
                <input class="form-control" name="name" value="{{ $depots->name }}"  />
            </div>
            
            <button type="submit" class="btn btn-dark">Cập nhật</button>

        <form>
    </div>
</div>
@endsection