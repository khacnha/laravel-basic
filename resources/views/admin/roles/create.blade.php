@extends('adminlte::layouts.app')
@section('htmlheader_title')
    Vai trò người dùng
@endsection
@section('contentheader_title')
    Vai trò người dùng
@endsection
@section('contentheader_description')

@endsection
@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Trang chủ</a></li>
        <li><a href="{{ url('/admin/roles') }}">Vai trò người dùng</a></li>
        <li class="active">Thêm mới</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thêm mới</h3>
            <div class="box-tools">
                <a href="{{ url('/admin/roles') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <span class="hidden-xs">Danh sách</span></a>
            </div>
        </div>

        {!! Form::open(['url' => '/admin/roles', 'class' => 'form-horizontal']) !!}

        @include ('admin.roles.form', ['formMode' => 'create'])

        {!! Form::close() !!}
    </div>
@endsection