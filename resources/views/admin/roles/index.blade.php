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
        <li class="active">Vai trò người dùng</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Danh sách</h3>
            <div class="box-tools">
                <a href="{{ url('/admin/roles/create') }}" class="btn btn-success btn-sm" title="Add New Role"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped table-hover hover-pink">
                <tbody>
                    <tr>
                        <th>ID</th><th>Mã</th><th>Vai trò</th><th></th>
                    </tr>
                @foreach($roles as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ url('/admin/roles', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->label }}</td>
                        <td>
                            <a href="{{ url('/admin/roles/' . $item->id) }}" title="View Role"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                            <a href="{{ url('/admin/roles/' . $item->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'url' => ['/admin/roles', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Xóa', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete Role',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="box-footer clearfix"><!---->
                {!! $roles->appends(['search' => Request::get('search')])->render() !!}
            </div>
        </div>
    </div>
@endsection
