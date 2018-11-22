<div class="box-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p><i class="fa fa-fw fa-check"></i> {{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
        {!! Form::label('name', 'Mã: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
        {!! Form::label('label', 'Vai trò: ', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('label', null, ['class' => 'form-control']) !!}
            {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    @php($rolePermission = isset($role)?$role->Permissions->pluck('name')->toArray():[])
    <div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
        <div class="col-xs-12">
            <h5 class="alert alert-info alert-dismissible">PHÂN QUYỀN</h5>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-5">
            Tất cả các quyền:
            <select name="from" id="multiselect" class="form-control" size="8" multiple="multiple">
                @foreach($permissions as $permission)
                    @if(!in_array($permission->name, $rolePermission))
                    <option value="{{ $permission->name }}">{{ $permission->label }}</option>
                    @endif
                @endforeach()
            </select>
        </div>
        <div class="col-xs-2">
            &nbsp;
            <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
            <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
            <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
            <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
        </div>
        <div class="col-xs-5">
            Các quyền được phép:
            <select name="permissions[]" name="to" id="multiselect_to" class="form-control" size="8" multiple="multiple">
                @foreach($permissions as $permission)
                    @if(in_array($permission->name, $rolePermission))
                        <option value="{{ $permission->name }}">{{ $permission->label }}</option>
                    @endif
                @endforeach()
            </select>
        </div>
    </div>
</div>
<div class="box-footer">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
@section('scripts-footer')
    <script type="text/javascript" src="{{ asset("plugins/multiselect.min.js") }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#multiselect').multiselect();
        })
    </script>
@endsection