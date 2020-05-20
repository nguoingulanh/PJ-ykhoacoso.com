<div class="hero-wrap hero-bread" style="background-color: #82ae46;">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{route('home')}}">Home</a></span> >
                    @foreach(request()->breadcrumbs()->segments() as $segment)
                        <span><a href="{{$segment->url()}}">{{ $segment->name()}} </a></span>
                    @endforeach
                </p>
                <h1 class="mb-0 bread" style="font-family: Roboto, sans-serif">Sản phẩm</h1>
            </div>
        </div>
    </div>
</div>
