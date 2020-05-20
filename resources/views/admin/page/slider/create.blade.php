@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <label>Title&nbsp;<span style="color:#db4437;">*</span></label>
                                <input type="text" name="sliders_title" class="form-control"
                                       value="{{old('sliders_title')}}" required/><br/>
                                <label>Url</label>
                                <input type="text" name="sliders_url" class="form-control"
                                       value="{{old('sliders_url')}}"/><br/>
                                <label class="label-create-post mt-2">Image
                                </label> <code>(Max: 2MB)</code><br>
                                <label class="custom-file-upload mt-2">
                                    <input type='file' id="imgInp" name="sliders_image"/>
                                    <i class="fa fa-upload"></i> Upload
                                </label>
                                <img id="image-preview" src="" alt="your image" hidden/>
                                <br/>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1"
                                           name="is_publish"
                                           value="1"
                                           checked>
                                    <label class="custom-control-label" for="customCheck1">Publish</label>
                                </div>
                                <button class="btn btn-primary float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
