@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('setting.post.fields')}}" method="POST">
                            @csrf
                            @foreach($data as $value)
                                <div class="d-flex align-items-center">
                                    <label class="switch">
                                        <input type="{{$value['type']}}" name="{{$value['data']['value']}}"
                                               @if($value['data']['checked'] == 1) checked @endif value="{{$value['data']['value']}}">
                                        <span class="slider round change-status"></span>
                                    </label>
                                    <label for="" class="ml-2">{{$value['data']['text']}}</label>
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
