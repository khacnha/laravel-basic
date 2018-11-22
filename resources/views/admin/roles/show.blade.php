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
        <li class="active">Chi tiết</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
            <div class="box-tools">
                <a href="{{ url('/admin/roles') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <span class="hidden-xs">Danh sách</span></a>
                <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh sửa</button></a>
                {!! Form::open([
                    'method' => 'DELETE',
                    'url' => ['/admin/roles', $role->id],
                    'style' => 'display:inline'
                ]) !!}
                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Xóa', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete Role',
                        'onclick'=>'return confirm("Bạn có chắc chắn muốn xóa phần tử này?")'
                ))!!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID.</th> <th>Mã</th><th>Vai trò</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $role->id }}</td> <td> {{ $role->name }} </td><td> {{ $role->label }} </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection