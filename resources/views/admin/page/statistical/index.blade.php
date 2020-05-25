@extends('admin.master')
@section('main')
    <style>
        [type="date"] {
            background: #fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png) 97% 50% no-repeat;
        }

        [type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        [type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0;
        }

        label {
            display: block;
        }

        input {
            border: 1px solid #c4c4c4;
            border-radius: 5px;
            background-color: #fff;
            padding: 3px 5px;
            box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1);
            width: 190px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="font-family: Roboto, sans-serif">
                        <form action="{{route('statistical.index')}}" method="GET">
                            <div class="row col-12">
                                <div class="col-md-4 col-12">
                                    <label class="card-title">Từ ngày</label>
                                    <input type="date" name="StartDate" value="{{$_GET['StartDate'] ?? false}}">
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="card-title">Đến ngày</label>
                                    <input type="date" name="EndDate" value="{{$_GET['EndDate'] ?? false}}">
                                </div>
                                <div class="col-md-4 col-12 d-flex align-self-center">
                                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                                </div>
                            </div>
                        </form>

                        <h4 class="card-title mt-5">Chi tiết thống kê</h4>
                        <div class="row col-12">
                            <div class="col-md-6 col-12">
                                <ul class="list-style-none mb-0">
                                    <li>
                                        <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                        <span class="text-muted">Tổng số đơn hàng</span>
                                        <span class="text-dark float-right font-weight-medium">{{$totalorder}}</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-warning font-10 mr-2"></i>
                                        <span class="text-muted">Đang chờ xử lý</span>
                                        <span class="text-dark float-right font-weight-medium">{{$totalPending}}</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                        <span class="text-muted">Đơn hàng đã hủy</span>
                                        <span class="text-dark float-right font-weight-medium">{{$totalCancel}}</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                        <span class="text-muted">Đơn hàng đã hoàn thành</span>
                                        <span class="text-dark float-right font-weight-medium">{{$totalComplete}}</span>
                                    </li>

                                    <li class="mt-3">
                                        <i class="fas fa-circle text-success font-10 mr-2"></i>
                                        <span class="text-muted">Tổng tiền</span>
                                        <span class="text-dark float-right font-weight-medium">{{number_format($totalMoney, 0). ' VNĐ'}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
