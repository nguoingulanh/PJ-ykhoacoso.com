@extends('website.master')
@section('content')
    @include('website.page.component.breadcrumb')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 d-flex flex-row justify-content-end align-items-center">
                    <label for="" class="mr-2">Tìm kiếm theo</label>
                    <select class="custom-select" style="width: 190px;">
                        <option>Sản phẩm mới nhất</option>
                        <option>Sản phẩm cũ nhất</option>
                        <option>Giá từ thấp đến cao</option>
                        <option>Giá từ cao đến thấp</option>
                    </select>
                </div>
            </div>
            <div class="row">
                @foreach($product as $value)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{route('detailProduct',$value['slug'])}}" class="img-prod"><img class="img-fluid img-feature" src="{{asset('image/public/product/feature/'.$value['img'])}}" alt="{{$value['name']}}">
                                @if(convertPrice($value['original_price'],$value['price']) != 0)
                                    <span class="status">{{convertPrice($value['original_price'],$value['price'])}}</span>
                                @endif
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{route('detailProduct',$value['slug'])}}">{{$value['name']}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        @if(convertPrice($value['original_price'],$value['price']) != 0)
                                            <p class="price"><span class="mr-2 price-dc">{{$value['original_price']}}</span><span
                                                    class="price-sale">{{$value['price']}}</span>
                                            </p>
                                        @else
                                            <p class="price"><span class="price-sale">{{$value['price']}}</span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="{{route('addtocart',$value->slug)}}" data-token="{{csrf_token()}}"
                                           class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{$product->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
