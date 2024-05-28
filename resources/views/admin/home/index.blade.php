@extends('admin.layout.master')
@section('content')
<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="/template/vendors/images/banner-img.png" alt="" />
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back
                <div class="weight-600 font-30 text-blue">{{ Auth::user()->name }}!</div>
            </h4>
            <p class="font-18 max-width-600">
                
                Manage devices more easily.
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">{{ $device->count() }}</div>
                    <div class="weight-600 font-16">Tổng số thiết bị</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart2"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">{{ $deviceActive->count() }}</div>
                    <div class="weight-600 font-16">Hoạt động bình thường</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart3"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">{{ $deviceBroken->count() }}</div>
                    <div class="weight-600 font-16">Đang hỏng</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart4"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">{{ $deviceFixed->count() }}</div>
                    <div class="weight-600 font-16">Đã sửa xong</div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-xl-8 mb-30">
        <div class="card-box height-100-p pd-20">
            <h2 class="h4 mb-20">Activity</h2>
            <div id="chart5"></div>
        </div>
    </div>
    <div class="col-xl-4 mb-30">
        <div class="card-box height-100-p pd-20">
            <h2 class="h4 mb-20">Lead Target</h2>
            <div id="chart6"></div>
        </div>
    </div>
</div> --}}

@endsection
