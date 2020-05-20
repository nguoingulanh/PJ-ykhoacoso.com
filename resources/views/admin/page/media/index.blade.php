@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group">
                            <label class="btn btn-primary btn-sm">
                                <i class="ti-upload"></i> Upload
                                <input class="fileselect-fmg" type="file" id="fileuploadImage" name="avatar"
                                       data-data ="{{csrf_token()}}"
                                       data-filedrag="#filedrag-fmg" data-files="{{route('media.upload')}}" multiple
                                       style="width: 0; position: absolute">
                            </label>
                            <label class="btn btn-primary btn-sm ml-2" id="btn-add-folder">
                                <i class="ti-folder"></i> Add Folder
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="reload-box">
                            @include('admin.page.media.mediaFileChild',['directory' => $directory,'files' => $files])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! view('admin.page.media.models.AddFolder') !!}
@stop
