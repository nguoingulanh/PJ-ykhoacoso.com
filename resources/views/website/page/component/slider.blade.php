<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        @if(isset($slider))
            @foreach($slider as $value)
                <div class="slider-item"
                     style="background-image: url({{asset('image/public/slider/'.$value['sliders_image'])}});">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row slider-text justify-content-center align-items-center"
                             data-scrollax-parent="true">

                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
