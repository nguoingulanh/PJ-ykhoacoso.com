@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body" style="font-family: Roboto, sans-serif">
                                            <h4 class="card-title">Chi tiết đơn hàng</h4>
                                            <hr>
                                            <p><b style="color: black">Tên người mua</b>: {{$data['username']}}</p>
                                            <div class="custom-control float-right mt-3">
                                                <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                                                <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
