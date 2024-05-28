@extends('admin.layout.master')
@section('content')
<div class="card-box mb-30">
    <h1 class="page-header">Danh sách người dùng
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
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)

            <tr class="odd gradeX" align="center">
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? "x" : ""}}</td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                        href="{{ route('admin.user.edit', $user->id) }}">Sửa</a></td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return myFunction();"
                        href="{{ route('admin.user.delete', $user->id) }}">Xóa</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>
@endsection
