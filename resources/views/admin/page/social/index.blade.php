@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('social.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <label><i class="ti-facebook"></i> Facebook&nbsp</label>
                                <input type="text" name="social_facebook" class="form-control"
                                       value="{{GetSocial('social_facebook')}}"/><br/>
                                <label><i class="ti-microphone"></i> Zalo</label>
                                <input type="text" name="social_zalo" class="form-control"
                                       value="{{GetSocial('social_zalo')}}"/><br/>
                                <label><i class="ti-youtube"></i> Youtube</label>
                                <input type="text" name="social_youtube" class="form-control"
                                       value="{{GetSocial('social_youtube')}}"/><br/>
                                <label><i class="ti-linkedin"></i> Linkedin</label>
                                <input type="text" name="social_linkedin" class="form-control"
                                       value="{{GetSocial('social_linkedin')}}"/><br/>
                                <label><i class="ti-twitter"></i> Twitter</label>
                                <input type="text" name="social_twitter" class="form-control"
                                       value="{{GetSocial('social_twitter')}}"/><br/>
                                <label><i class="ti-instagram"></i> Instagram</label>
                                <input type="text" name="social_instagram" class="form-control"
                                       value="{{GetSocial('social_instagram')}}"/><br/>
                                <label><i class="icon-phone"></i> Phone</label>
                                <input type="text" name="social_phone" class="form-control"
                                       value="{{GetSocial('social_phone')}}"/><br/>
                                <button class="btn btn-primary float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
