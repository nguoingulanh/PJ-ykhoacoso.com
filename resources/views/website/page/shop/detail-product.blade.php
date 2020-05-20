@extends('website.master')
@section('content')
    @include('website.page.component.breadcrumb')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{asset('storage/product/feature/'.$data->img)}}" class="image-popup"><img
                            src="{{asset('storage/product/feature/'.$data->img)}}" class="img-fluid"
                            alt="{{$data->title}}" style="height: 500px; width: 100%; object-fit: contain"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{$data->name}}</h3>
                    <p class="price"><span>{{number_format($data->price, 0). ' VNĐ'}}</span></p>
                    <p>{!! $data->content !!}
                    </p>
                    <div class="row mt-4">
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
                                   min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <p><a href="#" class="btn btn-black py-3 px-5">Add to Cart</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Sản phẩm</span>
                    <h2 class="mb-4">Sản phẩm liên quan</h2>
                    <p>Sản phẩm liên quan đến <b>{{$data->name}}</b></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>
@stop
