@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.register') }}
@endsection

@section('content')

    <body class="hold-transition register-page">
    <div id="app" class="row">
        <div class="col-md-7 col-lg-8">

        </div>
        <div class="col-md-5 col-lg-4">
            <div class="register-box">
                <div class="register-logo">
                    <a href="{{ url('/') }}">{!! Config("settings.app_logo") !!}</a>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p><i class="fa fa-fw fa-check"></i> {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="register-box-body">
                    <h4 class="login-box-msg" style="color: #0052ad;text-transform: uppercase;">{{ trans('adminlte_lang::message.registermember') }}</h4>
                    <form action="{{ url('/register') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{--<h5>THÔNG TIN CÁ NHÂN</h5>--}}
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}*" required name="name" value="{{ old('name') }}" autofocus/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        @if (config('auth.providers.users.field','email') === 'username')
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.username') }}*" required name="username" autofocus/>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        @endif

                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}*" required name="email" value="{{ old('email') }}"/>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}*" required name="password"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retypepassword') }}*" required name="password_confirmation"/>
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <!--
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Tên công ty*" required name="company[name]" value="{{ old('company.name') }}"/>
                            <span class="fa fa-building form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email công ty" required name="company[email]" value="{{ old('company.email') }}"/>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Địa chỉ công ty" required name="company[address]" value="{{ old('company.address') }}"/>
                            <span class="fa fa-location-arrow form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Số điện thoại" required name="company[phone_number]" value="{{ old('company.phone_number') }}"/>
                            <span class="fa fa-phone form-control-feedback"></span>
                        </div>-->
                        <div class="form-group has-feedback">
                            <label>
                                <div class="checkbox_register icheck">
                                    <label>
                                        <input type="checkbox" name="terms" required />
                                    </label>
                                </div>
                            </label>
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#termsModal">{{ trans('adminlte_lang::message.terms') }}</button>
                        </div>
                        <div class="form-group">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary  btn-flat">{{ trans('adminlte_lang::message.register') }}</button>
                                <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
                            </div>
                        </div>
                    </form>

                    {{--@include('adminlte::auth.partials.social_login')--}}


                </div><!-- /.form-box -->
            </div><!-- /.register-box -->
        </div>
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

    </body>
@endsection
