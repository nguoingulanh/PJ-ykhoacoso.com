@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle">Using the most basic table markup, here’s how
                            <code>.table</code>-based tables look in Bootstrap. All table styles are inherited
                            in Bootstrap 4, meaning any nested tables will be styled in the same manner as the
                            parent.</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="table-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td><a href="{{route('slider.show',$value->id)}}">{{$key + 1}}</a></td>
                                        <td>{{$value->sliders_title}}</td>
                                        <td><img src="{{asset('storage/slider/'.$value->sliders_image)}}" width="200"
                                                 height="150" style="border-radius: 10px;"></td>
                                        <td>{{$value->sliders_url}}</td>
                                        <td>
                                            <label class="switch">
                                                <input
                                                    type="checkbox" {{isset($value['is_publish']) && $value['is_publish'] == 1  ? "checked" : false}}>
                                                <span class="slider round change-status"
                                                      data-url="{{route('slider.update.status',$value->id)}}"
                                                      data-data="{{ csrf_token() }}">
                                                </span>
                                            </label>
                                        </td>
                                        <td class="d-flex flex-row justify-content-center">
                                            <button type="button" class="btn btn-info btn-circle mr-2">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            {!! Form::open(['url' => route('slider.destroy', $value['id']), 'method' => 'DELETE','id' => 'handle-form-trash']) !!}
                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class' => 'btn btn-danger btn-circle handle-btn-trash']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$data->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
