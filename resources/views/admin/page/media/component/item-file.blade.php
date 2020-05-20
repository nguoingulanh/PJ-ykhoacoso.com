@foreach($file as $files)
    <div class="list col-xs-10 col-2 true px-0 pt-3 treeList ml-2">
        <div id="{{$files['id']}}" class="file-item treeItem file d-flex align-items-center flex-column"
             data-data="{{json_encode($files)}}"
             data-id="{{$files['path']}}">
            <div class="thumb">
                @if(isset($files['image']))
                    <img src="{{$files['url']}}">
                @else
                    <i class="fa fa-file" aria-hidden="true"></i>
                @endif
            </div>
            <div class="name pr-2" title="Cinstyle-1.JPG">{{$files['name']}}</div>
                    <div class="type pr-2" hidden>{{$files['type']}}</div>
                    <div class="size pr-2" hidden>{{$files['size']}}</div>
                    <div class="last-modified pr-2" hidden>{{$files['lastModified']}}</div>
            <div class="clearfix"></div>
        </div>
    </div>
@endforeach
