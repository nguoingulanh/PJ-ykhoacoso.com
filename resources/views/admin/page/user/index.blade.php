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
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Active</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($res as $key =>  $value)
                                    <tr>
                                        <th scope="row">
                                            <a href="">{{$key + 1}}
                                            </a>
                                        </th>
                                        <td><a href="">{{$value['name']}}</a></td>
                                        <td>
                                            {{$value['role'] == 1 ? "Administrator" : "Member"}}
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input
                                                    type="checkbox" {{isset($value['is_active']) && $value['is_active'] == 1  ? "checked" : false}}>
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
