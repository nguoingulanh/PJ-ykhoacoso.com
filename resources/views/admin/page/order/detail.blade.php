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
                                        <h4 class="card-title">Chi tiết đơn hàng #{{$data['id']}}</h4>
                                        <span class="card-title">Trạng thái</span>
                                        <?php
                                            switch ($data['status']){
                                                case '1':
                                                    echo '<p class="bg-danger p-2 text-white" style="border-radius: 3px; width: 100px">Đã hủy</p>';
                                                    break;
                                                case '2':
                                                    echo '<p class="bg-warning p-2 text-white" style="border-radius: 3px;width: 100px">Chờ xử lý</p>';
                                                    break;
                                                case '3':
                                                    echo '<p class="bg-primary p-2 text-white" style="border-radius: 3px;width: 100px">Hoàn thành</p>';
                                                    break;
                                            }
                                            ?>
                                        <hr>
                                        <p><b style="color: black">Tên người mua</b>: {{$data['username']}}</p>
                                        <p><b style="color: black">Số điện thoại</b>: {{$data['phone']}}</p>
                                        <p><b style="color: black">Email</b>: {{$data['email']}}</p>
                                        <p><b style="color: black">Địa chỉ</b>:
                                            ( {{json_decode($data['address'])[0][3]}} ), {{$ward}}, {{$district}}
                                            , {{$city}}</p>
                                        <p><b style="color: black">Tổng tiền</b>: <b style="color: red">{{number_format($data['total'], 0). ' VNĐ'}}</b></p>
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr class="table-primary">
                                                    <th scope="col">Mã sản phẩm</th>
                                                    <th scope="col">Tên sách</th>
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Giá tiền</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach(json_decode($data['content']) as $key => $value)
                                                    <tr>
                                                        <th scope="row">
                                                            {{$key + 1}}
                                                        </th>
                                                    <th>{{$value->title}}</th>
                                                    <th>
                                                        <img src="{{$value->img}}" alt="" width="200px" height="200px">
                                                    </th>
                                                    <th>{{$value->quantity}}</th>
                                                    <th>{{$value->unit_price}}</th>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
