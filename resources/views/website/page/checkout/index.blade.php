@extends('website.master')
@section('content')
    @include('website.page.component.breadcrumb')
    <section class="ftco-section">
        <div class="container">
            <form name="saveCheckout" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-7 ftco-animate">
                        <form action="#" class="billing-form">
                            <h3 class="mb-4 billing-heading">Nhập thông tin của bạn</h3>
                            <div class="row align-items-end">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstname">Tên</label>
                                        <input type="text" name="username" class="form-control" placeholder=""
                                               value="{{old('username')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder=""
                                               value="{{old('email')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Số điện thoại</label>
                                        <input type="number" name="phone" class="form-control" placeholder=""
                                               value="{{old('phone')}}" required>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputStatus">Thành phố/Tỉnh</label>
                                        <select class="form-control custom-select" name="city" id="city-auth" required>
                                            <option value="">Chọn Thành phố/Tỉnh</option>
                                            @foreach($city as $value)
                                                <option
                                                    value="{{$value->id}}">
                                                    {{$value->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Quận/Huyện</label>
                                        <select class="form-control custom-select" name="district" id="district-auth"
                                                required>
                                            <option value="">Chọn Quận/Huyện</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Phường/Xã</label>
                                        <select class="form-control custom-select" name="ward" id="ward-auth" required>
                                            <option value="">Chọn Phường/Xã</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="streetaddress">Địa chỉ cụ thể</label>
                                        <input type="text" name="address" class="form-control"
                                               placeholder="Nhập địa chỉ cụ thể của bạn" value="{{old('address')}}">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                            </div>
                        </form><!-- END -->
                    </div>
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Tổng giá trị đơn hàng</h3>
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
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <p>Hình thức thanh toán: Thanh toán khi nhận hàng (Ship COD)</p>
                                        </div>
                                    </div>
                                    <p><button class="btn btn-primary py-3 px-4">Đặt hàng</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('admin.errors.error')
@stop
