@extends('website.master')
@section('content')
    @include('website.page.component.breadcrumb')
    <section class="ftco-section ftco-cart">
        <div class="container">
            @if(session('cart') && count(session('cart')) > 0)
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total = 30000?>
                                @foreach(session('cart') as $id => $value)
                                    <?php $total += $value['unit_price'] * $value['quantity']?>
                                    <tr class="text-center">
                                        <td class="product-remove">
                                            <a href="{{route('removeitem')}}"
                                               class="remove-item-cart"
                                               data-id="{{$id}}"
                                               data-token="{{csrf_token()}}">
                                                <span class="ion-ios-close"></span>
                                            </a>
                                        </td>

                                        <td class="image-prod">
                                            <div class="img" style="background-image:url({{$value['img']}});"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{$value['title']}}</h3>
                                        </td>

                                        <td class="price">{{number_format($value['unit_price'], 0). ' VNĐ'}}</td>

                                        <td class="quantity">
                                            {{$value['quantity']}}
                                        </td>

                                        <td class="total">{{number_format($value['unit_price'] * $value['quantity'], 0). ' VNĐ'}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Tổng đơn hàng</h3>
                        <p class="d-flex">
                            <span>Phí ship</span>
                            <span>30.000 VNĐ</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Tổng giá tiền</span>
                            <span>{{number_format($total, 0). ' VNĐ'}}</span>
                        </p>
                    </div>
                    <p><a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">Tiến hành thanh toán</a></p>
                </div>
            </div>
            @else
                <h3 class="text-center">Chưa có sản phẩm nào trong giỏ hàng.</h3>
            @endif
        </div>
    </section>
@stop
