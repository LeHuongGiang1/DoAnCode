@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Danh sách phòng ban</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div>
        <a href="{{ route('admin.action.department.get.add.device', ['id' => $department->id]) }}">
            <button type="submit" class="btn btn-dark">Cấp thiết bị</button>
        </a>

    </div>
    <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên phòng ban</th>
                <th>Người quản lý</th>
                <th>Địa chỉ phòng ban</th>
                <th>Xem chi tiết</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)

            <tr class="odd gradeX" align="center">
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->manager }}</td>
                <td>{{ $department->address}}</td>
                <td class="center"><i class="icon-copy bi bi-eye-fill"></i> <a
                        href="{{ route('admin.action.department.detail')}}">Xem</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection
