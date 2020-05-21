@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="table-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Total</th>
                                    <th scope="col" class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($res as $key =>  $value)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{route('order.show',$value['id'])}}">{{$key + 1}}
                                            </a>
                                        </th>
                                        <td><a href="{{route('order.show',$value['id'])}}">{{$value['username']}}</a>
                                        </td>
                                        <td>
                                            {{json_decode($value['address'])[0][3] }}
                                        </td>
                                        <td>
                                            {{number_format($value['total'], 0). ' VNĐ'}}
                                        </td>
                                        <td class="d-flex flex-row justify-content-center">
                                            <?php
                                            switch ($value['status']){
                                                case '1':
                                                    echo '<p class="bg-danger p-2 text-white" style="border-radius: 3px">Đã hủy</p>';
                                                    break;
                                                case '2':
                                                    echo '<p class="bg-warning p-2 text-white" style="border-radius: 3px">Chờ xử lý</p>';
                                                    break;
                                                case '3':
                                                    echo '<p class="bg-primary p-2 text-white" style="border-radius: 3px">Hoàn thành</p>';
                                                    break;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$res->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
