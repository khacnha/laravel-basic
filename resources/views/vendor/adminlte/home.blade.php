@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ __('message.dashboard') }}
@endsection
@section('contentheader_title')

@endsection
@section('breadcrumb')
	<ol class="breadcrumb">
		<li><i class="fa fa-home"></i> {{ __('message.dashboard') }}</li>
	</ol>
@endsection

@section('main-content')
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">{{ __('message.dashboard') }}</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				{{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
				{{--<i class="fa fa-times"></i></button>--}}
			</div>
		</div>
		<div class="box-body">
			{{ trans('adminlte_lang::message.logged') }}. Hãy bắt đầu sử dụng ứng dụng tuyệt vời của bạn!
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
@endsection
