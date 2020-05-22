@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <label>Username&nbsp;<span style="color:#db4437;">*</span></label>
                                <input type="text" name="name" class="form-control"
                                       value="{{old('name')}}" required/><br/>
                                <label>Email&nbsp;<span style="color:#db4437;">*</span></label>
                                <input type="text" name="email" class="form-control"
                                       value="{{old('email')}}" required/><br/>
                                <label>Password&nbsp;<span style="color:#db4437;">*</span></label>
                                <input type="text" name="password" class="form-control"
                                       value="{{old('password')}}" required/><br/>
                                <button class="btn btn-primary float-right">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
