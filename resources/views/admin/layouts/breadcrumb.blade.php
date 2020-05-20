<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{$titlePageDashboard ?? "Dashboard"}}</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        @foreach(request()->breadcrumbs()->segments() as $segment)
                            <li class="breadcrumb-item"><a href="{{$segment->url()}}" class="text-muted">{{ $segment->name()}}</a></li>
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
