<div class="modal fade" tabindex="-1" role="dialog" id="modal-popup-file" aria-labelledby="myLargeModalLabel"
     style="overflow: inherit;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">File manager</h4>
            </div>
            <div class="modal-body" style="min-height: 475px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="btn-group">
                                        <label class="btn btn-primary btn-sm">
                                            <i class="ti-upload"></i> Upload
                                            <input class="fileselect-fmg" type="file" id="fileuploadImage" name="avatar"
                                                   data-data="{{csrf_token()}}"
                                                   data-filedrag="#filedrag-fmg" data-files="{{route('media.upload')}}"
                                                   multiple
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
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-choose disabled">Select</button>
                </div>
                {!! view('admin.page.media.models.AddFolder') !!}
            </div>
        </div>
    </div>
</div>
