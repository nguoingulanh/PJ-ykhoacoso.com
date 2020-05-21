@foreach($productFea as $value)
    <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
            <a href="{{route('detailProduct',$value->slug)}}" class="img-prod"><img class="img-fluid" src="{{asset('storage/product/feature/'.$value['img'])}}"
                                              alt="{{$value->name}}">
                @if(convertPrice($value['original_price'],$value['price']) != 0)
                    <span class="status">{{convertPrice($value['original_price'],$value['price'])}}%</span>
                @endif
                <div class="overlay"></div>
            </a>
            <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="{{route('detailProduct',$value['slug'])}}">{{$value['name']}}">{{$value->name}}</a></h3>
                <div class="d-flex">
                    <div class="pricing">
                        @if(convertPrice($value['original_price'],$value['price']) != 0)
                            <p class="price"><span class="mr-2 price-dc">{{number_format($value['original_price'], 0). ' VNĐ'}}</span><span
                                    class="price-sale">{{number_format($value['price'], 0). ' VNĐ'}}</span>
                            </p>
                        @else
                            <p class="price"><span class="price-sale">{{number_format($value['price'], 0). ' VNĐ'}}</span>
                            </p>
                        @endif
                    </div>
                </div>
                <div class="bottom-area d-flex px-3">
                    <div class="m-auto d-flex">
                        <a href="{{route('addtocart',$value->slug)}}" data-token="{{csrf_token()}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                            <span><i class="ion-ios-cart"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
