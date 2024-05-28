@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Danh mục thiết bị
        <small></small>
    </h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Số thiết bị</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)

            <tr class="odd gradeX" align="center">
                <td>{{ $key+1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ count($category->device) }}</td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                        href="{{ route('admin.category.edit', $category->id) }}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return myFunction();"
                        href="{{ route('admin.category.delete', $category->id) }}">Xóa</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection
