@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <h6 class="card-subtitle">Using the most basic table markup, here’s how
                                    <code>.table</code>-based tables look in Bootstrap. All table styles are inherited
                                    in Bootstrap 4, meaning any nested tables will be styled in the same manner as the
                                    parent.</h6>
                                <label>Name&nbsp;<span style="color:#db4437;">*</span></label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="Vui lòng nhập tiêu đề" value="{{old('title')}}" required/><br/>
                                <label>Description&nbsp;<span style="color:#db4437;">*</span></label>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Text Here..." name="description" required>{{old('description')}}</textarea>
                                </div>
                                <button class="btn btn-primary float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
