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
                        <h6 class="card-title mt-5"><i
                                class="mr-1 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Table With
                            Outside Padding</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="table-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($res as $key =>  $value)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{route('post.show',$value['id'])}}">{{$key + 1}}
                                            </a>
                                        </th>
                                        <td><a href="{{route('post.show',$value['id'])}}">{{$value['title']}}</a></td>
                                        <td>{{$value->User->name}}</td>
                                        <td>
                                            <label class="switch">
                                                <input
                                                    type="checkbox" {{isset($value['is_published']) && $value['is_published'] == 1  ? "checked" : false}}>
                                                <span class="slider round change-status"
                                                      data-url="{{route('post.update.status',$value['id'])}}"
                                                      data-data="{{ csrf_token() }}">
                                                </span>
                                            </label>
                                        </td>
                                        <td class="d-flex flex-row justify-content-center">
                                            <button type="button" class="btn btn-info btn-circle mr-2">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            {!! Form::open(['url' => route('post.destroy', $value['id']), 'method' => 'DELETE','id' => 'handle-form-trash']) !!}
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
