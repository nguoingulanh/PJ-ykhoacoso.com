@extends('website.master')
@section('content')
    @include('website.page.component.breadcrumb')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <div class="col-12">
                        <h1>{{$data->title}}</h1>
                        {!! $data->content !!}
                    </div>
                    <div class="tag-widget post-tag-container mb-5 mt-5 col-12">
                        <div class="tagcloud">
                            @if($data->post_tag)
                                @foreach(json_decode($data->post_tag) as $value)
                                    <a href="#" class="tag-cloud-link">{{$value}}</a>
                                @endforeach
                            @endif
                        </div>
                        <div class="fb-like mt-4" data-href="{{route('detailblog',$data->slug)}}"
                             data-width="" data-layout="button" data-action="like" data-size="small"
                             data-share="true"></div>
                        <div class="fb-comments"
                             data-href="{{route('detailblog',$data->slug)}}"
                             data-numposts="20" data-width="100%" data-colorscheme="light"></div>
                    </div>
                </div>
                @include('website.layouts.sider')
            </div>
        </div>
    </section>
@stop
