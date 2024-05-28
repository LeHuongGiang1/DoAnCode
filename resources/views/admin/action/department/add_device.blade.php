@extends('admin.layout.master')
@section('content')
<div class="pd-20 card-box mb-30">
    <h1 class="page-header">Cấp thiết bị cho Phòng ban

    </h1>
    @if (count($errors))
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
        {{ $err }}
        @endforeach
    </div>
    @endif
    @if (session('notification_error'))
    <div class="alert alert-success">
        {{ session('notification_error') }}
    </div>
    @endif
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ route('admin.action.department.get.post.device') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Chọn thiết bị</label>
                <select name="device_id" class="form-control">
                    @foreach ($devices as $device)
                    <option value="{{ $device->id }}" selected>{{ $device->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Phòng</label>
                <select name="department" class="form-control">
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Người mượn</label>
                <select name="userId" class="form-control">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="form-group">
                <label>Người quản lý</label>
                <input class="form-control" name="manager" placeholder="Người quản lý" />
            </div>
            <div class="form-group">
                <label>Địa chỉ phòng ban</label>
                <input class="form-control" name="address" placeholder="Địa chỉ phòng ban" />
            </div> --}}

            <button type="submit" class="btn btn-dark" onclick="return myFun();">Cấp</button>
        </form>
    </div>
</div>
@endsection

@push('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('select[name="device_id"]').select2({
            ajax: {
                url: '/api/search-device',
                data: function (params) {
                var query = {
                    like: params.term,
                }

                // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data, params) {
                    console.log(data);
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id,
                                data: item
                            };
                        })
                    };
                }
            },

        });

</script>
@endpush
