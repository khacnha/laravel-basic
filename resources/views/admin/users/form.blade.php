<div class="box-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p><i class="fa fa-fw fa-check"></i> {{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                {!! Form::label('name', __('message.user.name'), ['class' => 'col-md-4 control-label label-required']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                {!! Form::label('email', __('message.user.email'), ['class' => 'col-md-4 control-label label-required']) !!}
                <div class="col-md-6">
                    {!! Form::email('email', null, ['class' => 'form-control input-sm', 'required' => 'required']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @php
                $readonly = [];
                if(isset($isProfile) && $isProfile){
                    $readonly = ['readonly' => 'readonly'];
                }
            @endphp
            <div class="form-group{{ $errors->has('username') ? ' has-error' : ''}}">
                {!! Form::label('username', __('message.user.username'), ['class' => 'col-md-4 control-label label-required']) !!}
                <div class="col-md-6">
                    {!! Form::text('username', null, array_merge(['class' => 'form-control input-sm', 'required' => 'required'], $readonly)) !!}
                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @if(isset($isProfile) && $isProfile)
                <div class="form-group{{ $errors->has('password_current') ? ' has-error' : ''}}">
                    {!! Form::label('password_current', __('message.user.password_current'), ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::password('password_current', ['class' => 'form-control input-sm']) !!}
                        {!! $errors->first('password_current', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endif
            @php
                $required = [];
                if(!isset($submitButtonText)){
                    $required = ['required' => 'required'];
                }
            @endphp
            <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                {!! Form::label('password', isset($isProfile) && $isProfile?__('message.user.password_new'):__('message.user.password'), ['class' => 'col-md-4 control-label '.($required?'label-required':'')]) !!}
                <div class="col-md-6">
                    {!! Form::password('password', array_merge(['class' => 'form-control input-sm'], $required)) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : ''}}">
                {!! Form::label('password', isset($isProfile) && $isProfile?__('message.user.password_new_confirmation'):__('message.user.password_confirmation'), ['class' => 'col-md-4 control-label '.($required?'label-required':'')]) !!}
                <div class="col-md-6">
                    {!! Form::password('password_confirmation', array_merge(['class' => 'form-control input-sm'], $required)) !!}
                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @if(!isset($isProfile) || !$isProfile)
                <div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
                    {!! Form::label('role', __('message.user.role'), ['class' => 'col-md-4 control-label label-required']) !!}
                    <div class="col-md-6">
                        {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control input-sm select2', 'multiple' => false, 'required'=>'required']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('active') ? ' has-error' : ''}}">
                    {!! Form::label('active', ' ', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        <label>
                            {!! Form::checkbox('active', Config("settings.active") , isset($submitButtonText)?null:true ,['class' => 'flat-blue']) !!}
                            {{ __('message.user.active') }}
                        </label>
                        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('profile.avatar') ? ' has-error' : ''}}">
                {!! Form::label('profile[avatar]', __('message.user.avatar'), ['class' => 'col-md-4 text-right']) !!}
                <div class="col-md-6">
                    {!! Form::file('profile[avatar]', null) !!}
                    @php
                        if(isset($submitButtonText))
                            echo $user->showAvatar();
                    @endphp
                    {!! $errors->first('profile.avatar', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group{{ $errors->has('profile.gender') ? ' has-error' : ''}}">
                {!! Form::label('profile[gender]', __('message.user.gender'), ['class' => 'col-md-4 text-right']) !!}
                <div class="col-md-6">
                    <label for="boy">
                        {!! Form::radio('profile[gender]', 5, isset($submitButtonText)?null:true, ['class' => '', 'id' => 'boy']) !!}
                        {{ __('message.user.gender_male') }}
                    </label>&nbsp;
                    <label for="girl">
                        {!! Form::radio('profile[gender]', 10, null, ['class' => '', 'id' => 'girl']) !!}
                        {{ __('message.user.gender_female') }}
                    </label>
                    {!! $errors->first('profile.gender', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('profile.phone') ? ' has-error' : ''}}">
                {!! Form::label('profile[phone]', __('message.user.phone'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('profile[phone]', null, ['class' => 'form-control input-sm']) !!}
                    {!! $errors->first('profile.phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('profile.address') ? ' has-error' : ''}}">
                {!! Form::label('profile[address]', __('message.user.address'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('profile[address]', null, ['class' => 'form-control input-sm']) !!}
                    {!! $errors->first('profile.address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('profile.birthday') ? ' has-error' : ''}}">
                {!! Form::label('profile[birthday]', __('message.user.birthday'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('profile[birthday]', null, ['class' => 'form-control input-sm datepicker']) !!}
                    {!! $errors->first('profile.birthday', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group{{ $errors->has('profile.position') ? ' has-error' : ''}}">
                {!! Form::label('profile[position]', __('message.user.position'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('profile[position]', null, ['class' => 'form-control input-sm']) !!}
                    {!! $errors->first('profile.position', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-footer">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : __('message.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ url('/admin/users') }}" class="btn btn-default">{{ __('message.close') }}</a>
</div>
@section('scripts-footer')
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <script type="text/javascript" src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" ></script>
    <script type="text/javascript">
        $(function(){
            //Date range picker with time picker
            $('.datepicker').datepicker({
                autoclose: true,
                language: '{{ app()->getLocale() }}',
                format: '{{ config('settings.format.date_js') }}'
            });
        });
    </script>
@endsection
