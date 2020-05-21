@foreach($posts as $value)
    <div class="col-md-12 d-flex ftco-animate">
        <div class="blog-entry align-self-stretch d-md-flex">
            <a href="#" class="block-20" style="background-image: url('{{asset('storage/post/feature/'.$value['photo'])}}');">
            </a>
            <div class="text d-block pl-md-4">
                <div class="meta mb-3">
                    <div><a href="#">{{$value['created_at']}}</a></div>
                    <div><a href="#">{{$value->User->name}}</a></div>
                </div>
                <h3 class="heading"><a href="#">{{$value['title']}}</a>
                </h3>
                <p>{{$value['description']}}.</p>
                <p><a href="#" class="btn btn-primary py-2 px-3">Chi tiết</a></p>
            </div>
        </div>
    </div>
@endforeach
