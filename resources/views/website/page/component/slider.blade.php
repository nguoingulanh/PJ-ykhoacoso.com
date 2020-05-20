<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        @if(isset($slider))
            @foreach($slider as $value)
                <div class="slider-item"
                     style="background-image: url({{asset('storage/slider/'.$value['sliders_image'])}});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row slider-text justify-content-center align-items-center"
                             data-scrollax-parent="true">

                            <div class="col-md-12 ftco-animate text-center">
                                <h2 class="subheading mb-4">{{$value['sliders_title']}}</h2>
                                <p><a href="{{$value['sliders_url']}}" class="btn btn-primary">Xem thêm</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
