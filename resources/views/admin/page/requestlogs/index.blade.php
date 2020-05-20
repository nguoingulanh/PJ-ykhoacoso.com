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
                        <form action="{{route('requestlogs.destroyAll')}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-danger mb-2 float-right"><i class="fa fa-trash"></i> Clear All</button>
                        </form>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="table-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Status Code</th>
                                    <th scope="col">Ip</th>
                                    <th scope="col">Count</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key =>  $value)
                                    <tr>
                                        <th scope="row">
                                            # {{$key + 1}}
                                        </th>
                                        <td>{{$value['url']}}</td>
                                        <td>{{$value['status_code']}}</td>
                                        <td>{{$value['ip']}}</td>
                                        <td>{{$value['count']}}</td>
                                        <td class="d-flex flex-row justify-content-center">
                                            {!! Form::open(['url' => route('requestlogs.destroy', $value['id']), 'method' => 'DELETE','id' => 'handle-form-trash']) !!}
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
