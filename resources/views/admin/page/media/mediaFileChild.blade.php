{!! view('admin.page.media.component.breadcrumb',['fileBreadcrumbs' => $fileBreadcrumbs, 'currentPath' => $currentPath]) !!}
<div class="row col-12" style="border-top: 1px solid black">
    <div class="col-10 content-fmg row no-padding mt-0 fm-html list grid treePanel filedrag"
         id="filedrag-fmg">
        @foreach($directory as $key => $value)
            @include('admin.page.media.component.item-folder',['folder' => $value])
        @endforeach
            @include('admin.page.media.component.item-file',['file' => $files])
    </div>
    <div class="col-2" id="previewMedia">
        <div class="col-12 file-preview">
            <img src="{{asset('assets/images/default-image.png')}}" alt="" id="img-preview">
        </div>
        <div class="col-12 info-preview">
            <div class="media-name">
                <p>Name</p>
                <span id="name-preview">No selected</span>
            </div>
            <div class="media-name">
                <p>Url</p>
                <span id="url-preview">No selected</span>
            </div>
            <div class="media-name">
                <p>Type</p>
                <span id="type-preview">No selected</span>
            </div>
            <div class="media-name">
                <p>Size</p>
                <span id="size-preview">No selected</span>
            </div>
            <div class="media-name">
                <p>Last modified</p>
                <span id="last-modified-preview">No selected</span>
            </div>
        </div>
    </div>
</div>
