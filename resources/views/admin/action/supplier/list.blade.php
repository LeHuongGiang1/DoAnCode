@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Nhà cung cấp

    </h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('admin.action.supplier.create') }}">
        <button type="submit" class="btn btn-dark">Thêm</button>
    </a>
    <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>STT</th>
                <th>Tên nhà cung cấp</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $key => $supplier)

            <tr class="odd gradeX" align="center">
                <td>{{ $key+1 }}</td>
                <td>{{ $supplier->name }}</td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                        href="{{ route('admin.action.supplier.edit', $supplier->id) }}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return myFunction();"
                        href="{{ route('admin.action.supplier.delete', $supplier->id) }}"> Xóa</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection
