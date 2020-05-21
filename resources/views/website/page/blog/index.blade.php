@extends('website.master')
@section('content')
    @include('website.page.component.breadcrumb')
        <section class="ftco-section ftco-degree-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ftco-animate">
                        <div class="row">
                            @include('website.page.component.blog')
                            <?php $posts->links() ?>
                        </div>
                    </div> <!-- .col-md-8 -->
                    @include('website.layouts.sider')
                </div>
            </div>
        </section>
@stop
