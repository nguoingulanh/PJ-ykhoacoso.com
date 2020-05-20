@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('setting.store')}}" method="POST">
                            @csrf
{{--                            <label class="label-create-post mt-2">Logo--}}
{{--                            </label><br>--}}
{{--                            <label class="custom-file-upload mt-2">--}}
{{--                                <input type='file' id="imgInp" name="site_logo"/>--}}
{{--                                <i class="fa fa-upload"></i> Upload--}}
{{--                            </label>--}}
{{--                            <img id="image-preview" src="" alt="your image" hidden/>--}}
                            <br/>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Site Description</label><br>
                                <textarea name="site_description" style="width: 100%;height: 200px;">{{GetSetting('site_description')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Site keywords</label>
                                <input type="text" class="form-control" name="site_keyword" value="{{GetSetting('site_keyword')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Copyright footer</label><br>
                                <textarea name="site_copyright" class="summernote">{{GetSetting('site_copyright')}}</textarea>
                            </div>
                            <div class="custom-control float-right mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="model-file"></div>
@stop
