@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">

    <div>
        <h2 class="page-header">Danh sách thiết bị <u>{{$department->manager}}</u><u>({{$department->name}})</u></h2>
        <h6>Số lượng thiết bị: {{$devices->count()}}</h6>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table nowrap table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>STT</th>
                <th>Danh mục</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Cấu hình</th>
                <th>Trả về kho</th>
                <th>Báo hỏng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devices as $key => $device)

            <tr class="odd gradeX" align="center">
                <td>{{ $key + 1 }}</td>
                <td>{{ $device->category->name }}</td>
                <td>{{ $device->name }}</td>
                <td><img src="{{ $device->imageUrl() }}" alt="" width="50px" height="auto"></td>
                <td>{{ $device->configuration }}</td>
                <td class="center"><a onclick="return myFu();"
                        href="{{ route('admin.action.department.deleteDevice', ['id'=> $device->id , 'deparment' =>$department->id ]) }}"><i
                            class="icon-copy bi bi-box-arrow-in-right"></i></a></td>
                <td class="center"><a onclick="return myF();"
                        href="{{ route('admin.action.department.updateStatusDevice', ['id'=> $device->id , 'department' =>$department->id ]) }}"><i
                            class="icon-copy bi bi-tools"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
