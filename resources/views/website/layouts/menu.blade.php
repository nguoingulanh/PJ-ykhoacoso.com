<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}" style="font-family: Roboto, sans-serif">Y Học Cơ Sở</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Trang Chủ</a></li>
                <li class="nav-item"><a href="{{route('shop')}}" class="nav-link">Shop</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Về chúng tôi</a></li>
                <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Tin tức</a></li>
                <li class="nav-item cta cta-colored"><a href="{{route('cart')}}" class="nav-link"><span class="icon-shopping_cart"></span><span class="count-cart">[{{$cart}}]</span></a></li>
            </ul>
        </div>
    </div>
</nav>
