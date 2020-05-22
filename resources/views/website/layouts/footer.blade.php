<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Shopping book</h2>
                    <p>Nơi chia sẻ kiến thức y khoa cơ bản, cung cấp sách y khoa toàn quốc.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="{{GetSocial('social_twitter')}}"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{GetSocial('social_facebook')}}"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{GetSocial('social_instagram')}}"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Shop</a></li>
                        <li><a href="#" class="py-2 d-block">Về chúng tôi</a></li>
                        <li><a href="{{route('blog')}}" class="py-2 d-block">Tin tức</a></li>
                        <li><a href="{{route('cart')}}" class="py-2 d-block">Giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Help</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            Liên với chúng tôi qua mail: {{GetSetting('site_email_admin')}} để được giải đáp sớm nhất
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Đặt câu hỏi?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Q9, TP. HCM, Việt Nam</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{GetSocial('social_phone')}}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{GetSetting('site_email_admin')}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    {{GetSetting('site_copyright')}}
                </p>
            </div>
        </div>
    </div>
</footer>

