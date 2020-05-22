@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <label>Name &nbsp;<span style="color:#db4437;">*</span></label>
                                            <input id="post-title" type="text" name="name" class="form-control"
                                                   placeholder="Vui lòng nhập tiêu đề" required value="{{old('name')}}"/><br/>
                                            <label>Description &nbsp;<span style="color:#db4437;">*</span></label>
                                            <textarea class="form-control" rows="10" name="description"
                                                      placeholder="Vui lòng nhập mô tả"
                                                      required>{{old('description')}}</textarea><br/>

                                            <label>Content &nbsp;<span style="color:#db4437;">*</span></label>
                                            <textarea class="form-control summernote" rows="50" name="content"
                                                      placeholder="Vui lòng nhập nội dung"
                                                      required>{{old('content')}}</textarea><br/>
                                            <label>Original Price &nbsp;<span style="color:#db4437;">*</span></label>
                                            <input id="post-title" type="text" name="original_price" class="form-control"
                                                   placeholder="Vui lòng nhập tiêu đề" required value="{{old('original_price')}}"/><br/>
                                            <label>Price &nbsp;<span style="color:#db4437;">*</span></label>
                                            <input id="post-title" type="text" name="price" class="form-control"
                                                   placeholder="Vui lòng nhập tiêu đề" required value="{{old('price')}}"/><br/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <label class="w-100 label-create-post">Tag &nbsp;</label>
                                            <select class="tags-field form-control select2" name="tag[]"
                                                    data-tags="true" style="width: 100%;"
                                                    data-placeholder="Vui lòng nhập thẻ của product"
                                                    multiple="multiple">
                                            </select>
                                            <br>
                                            <label class="label-create-post mt-2">Feature Image
                                                <span style="color:#db4437;">*</span>
                                            </label>
                                            <label class="custom-file-upload mt-2">
                                                <input type='file' id="imgInp" name="img"/>
                                                <i class="fa fa-upload"></i> Upload
                                            </label>
                                            <img id="image-preview" src="" alt="your image" hidden/>
                                            <br/>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                       name="status"
                                                       value="1"
                                                       checked>
                                                <label class="custom-control-label" for="customCheck1">Publish</label>
                                            </div>
                                            <div class="custom-control float-right mt-3">
                                                <a type="button" class="btn btn-secondary"
                                                   href="{{route('post.index')}}">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
