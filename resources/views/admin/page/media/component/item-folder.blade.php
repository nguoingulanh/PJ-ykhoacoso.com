<div class="list col-xs-10 col-10 true px-0 pt-3 treeList ml-2 col-md-2 col-sm-3">
    <div id="{{$folder['id']}}" class="file-item folder-item treeItem d-flex flex-column align-items-center"
         data-data='{{json_encode($folder)}}' data-id='{{$folder['path']}}' data-task-list-update-url="{{route('media.index')}}">
        <div class="thumb">
            <i class="fa fa-folder" aria-hidden="true"></i>
        </div>
        <div class="name pr-2">{{$folder['name']}}</div>
        <div class="type pr-2" hidden>{{$folder['type']}}</div>
        <div class="size pr-2"></div>
        <div class="last-modified pr-2"></div>
        <div class="clearfix"></div>
    </div>
</div>
