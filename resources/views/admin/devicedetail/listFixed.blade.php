@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Danh sách thiết bị đã sửa xong</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>STT</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Cấu hình</th>
                <th>Ngày sửa xong</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devices as $key => $device)
            <tr class="odd gradeX" align="center">
                <td>{{ $key + 1 }}</td>
                <td>{{ $device->name }}</td>
                <td><img src="/image/device/{{ $device->image }}" alt="{{ $device->image }}" width="50px" height="50px">
                </td>
                <td>{{ $device->configuration }}</td>
                <td>{{ $device->updated_at }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection
