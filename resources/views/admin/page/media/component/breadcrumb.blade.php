<input type="hidden" name="current-folder" value="{{$currentPath['path']}}" id="current-folder">
<nav class="breadcrumb">
    @if(count($fileBreadcrumbs) > 0)
        <a class="breadcrumb-item" href="{{route('media.index')}}" title="Home">Home</a>
    @else
        <span title="Home">Home</span>
    @endif
    @foreach($fileBreadcrumbs as $key => $breadcrumbc)
        @if($key < count($fileBreadcrumbs) - 1)
            <a class="breadcrumb-item" href="{{route('media.index',['path'=>$breadcrumbc['path']])}}" title="{{ucfirst($breadcrumbc['name'])}}">{{ucfirst($breadcrumbc['name'])}}</a>
        @else
            <a class="breadcrumb-item" title="{{ucfirst($breadcrumbc['name'])}}"> {{ucfirst($breadcrumbc['name'])}}</a>
        @endif
    @endforeach
</nav>
