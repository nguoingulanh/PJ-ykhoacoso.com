@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Common Settings</h3>
                        <p class="small italic">We offers you the ability to create a custom URL structure for
                            your permalinks and archives. Custom URL structures can improve the aesthetics, usability,
                            and forward-compatibility of your links. A number of tags are available, and here are some
                            examples to get you started.
                        </p>
                        <form action="{{route('setting.store')}}" method="POST">
                            @csrf
                            <label for="" class="card-title">Post</label>
                            @foreach($data as $key => $value)
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="{{$key}}" name="site_permalink"
                                           class="custom-control-input"
                                           value="{{$value['value']}}" {{$value['value'] === GetSetting('site_permalink') ? "checked" : ""}}>
                                    <label class="custom-control-label" for="{{$key}}">{{$value['text']}}</label>
                                </div>
                            @endforeach
                            <div class="custom-control float-right mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
