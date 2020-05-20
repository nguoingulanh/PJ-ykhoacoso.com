@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="table-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">Name Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($res as $key =>  $value)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{route('product.show',$value['id'])}}">{{$key + 1}}
                                            </a>
                                        </th>
                                        <td><a href="{{route('product.show',$value['id'])}}">{{$value['name']}}</a></td>
                                        <td>{{$value->price}}</td>
                                        <td>
                                            <label class="switch">
                                                <input
                                                    type="checkbox" {{isset($value['status']) && $value['status'] == 1  ? "checked" : false}}>
                                                <span class="slider round change-status"
                                                      data-url="{{route('product.update.status',$value['id'])}}"
                                                      data-data="{{ csrf_token() }}">
                                                </span>
                                            </label>
                                        </td>
                                        <td class="d-flex flex-row justify-content-center">
                                            {!! Form::open(['url' => route('product.destroy', $value['id']), 'method' => 'DELETE','id' => 'handle-form-trash']) !!}
                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class' => 'btn btn-danger btn-circle handle-btn-trash']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$res->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
