@extends('admin.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('setting.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Site Title</label>
                                <input type="text" class="form-control" name="site_title" value="{{GetSetting('site_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slogan</label>
                                <input type="text" class="form-control" name="site_slogan" value="{{GetSetting('site_slogan')}}">
                                <small id="name" class="form-text text-muted">In a few words, explain what this site is
                                    about.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Site Address</label>
                                <input type="text" class="form-control" name="site_address" value="{{GetSetting('site_address')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Administration Email Address</label>
                                <input type="email" class="form-control" name="site_email_admin" value="{{GetSetting('site_email_admin')}}">
                                <small id="name" class="form-text text-muted">This address is used for admin purposes.
                                    If you change this, we will send you an email at your new address to confirm it. The
                                    new address will not become active until confirmed.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Site Language</label>
                                <div>
                                    <select name="site_language" class="select2">
                                        <?php
                                        foreach ($data['lang']['data'] as $value) {
                                        ?>
                                        <option value="{{$value['value']}}" {{GetSetting('site_language') === $value['value'] ? "selected" : false}}>{{$value['text']}}</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Timezone</label>
                                <div>
                                    <select name="site_timezone" class="select2">
                                        <?php
                                        foreach ($data['timezones']['data'] as $value) {
                                        ?>
                                        <option value="{{$value['value']}}" {{GetSetting('site_timezone') === $value['value'] ? "selected" : false}}>{{$value['text']}}</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <small id="name" class="form-text text-muted">
                                        Choose either a city in the same timezone as you or a UTC (Coordinated Universal
                                        Time) time offset.</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Date Format</label>
                                <?php
                                    foreach($data['date_formats']['data'] as $key => $value){
                                ?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="{{$key}}" name="site_date_formats"
                                               class="custom-control-input" value="{{$value['value']}}" {{GetSetting('site_date_formats') === $value['value'] ? "checked" : false}}>
                                        <label class="custom-control-label" for="{{$key}}">{{$value['text']}}</label>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
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
