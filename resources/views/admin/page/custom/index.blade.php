@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('setting.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="card-title">Header Script</label><br>
                                <textarea name="site_script_header" style="width: 100%;">{{GetSetting('site_script_header')}}</textarea>
                                <p class="small font-italic">Add custom scripts inside HEAD tag. You need to have a SCRIPT tag around scripts.</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="card-title">Footer Script</label><br>
                                <textarea name="site_script_footer" style="width: 100%;">{{GetSetting('site_script_footer')}}</textarea>
                                <p class="small font-italic">Add custom scripts you might want to be loaded in the footer of your website. You need to have a SCRIPT tag around scripts.</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="card-title">Custom CSS</label><br>
                                <textarea name="site_custom_css" style="width: 100%;">{{GetSetting('site_custom_css')}}</textarea>
                                <p class="small font-italic">Add custom CSS here.</p>
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
@stop
