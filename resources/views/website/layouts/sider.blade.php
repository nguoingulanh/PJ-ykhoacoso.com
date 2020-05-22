<div class="col-lg-4 sidebar ftco-animate">
    <div class="sidebar-box">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon ion-ios-search"></span>
                <input type="text" class="form-control" placeholder="Search...">
            </div>
        </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <h3 class="heading">Danh mục</h3>
        <ul class="categories">
            @foreach($category as $value)
                <li><a href="#">{{$value['title']}} <span>({{count($value->Posts)}})</span></a></li>
            @endforeach
        </ul>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3 class="heading">Bài viết khác</h3>
        @foreach($blog as $value)
            <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('{{asset('image/public/post/feature/'.$value['photo'])}}');"></a>
                <div class="text">
                    <h3 class="heading-1"><a href="#">{{$value['title']}}</a></h3>
                    <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> {{$value['created_at']}}</a></div>
                        <div><a href="#"><span class="icon-person"></span> {{$value->User->name}}</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
