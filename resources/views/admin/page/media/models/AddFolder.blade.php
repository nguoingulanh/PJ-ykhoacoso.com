<div class="modal fade" id="modal-add-folder">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="flex-direction: row-reverse">
                <button type="button" class="close p-0 m-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add new folder</h4>
            </div>
            <div class="modal-body">
                <form id="form-add-folder" action="{{route('media.add')}}" method="post" accept-charset="UTF-8"
                      class="form-horizontal">
                    <div id="alert-error" class="alert alert-danger alert-dismissable" hidden>
                        <p></p>
                    </div>
                    {{ csrf_field() }}
                    <div class="">
                        <input id="inpNewFolderName" type="text" name="newNameFolder" maxlength="255"
                               class="form-control" value="New folder" required/><br/>
                    </div>
                    <div class="" id="current__folder">

                    </div>
                    <div class="box-footer modal-footer">
                        <div class="col-md-12">
                            <div class="pull-right float-right">
                                <div class="btn btn-default" data-dismiss="modal" aria-label="Close" style="">Cancel
                                </div>
                                <button class="btn btn-primary" id="btn-add-folder-submit"><i
                                        class="fa fa-plus mr-1"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
