<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            {{--{!! Config("settings.app_logo_mini") !!}--}}
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! Config("settings.app_logo") !!}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    {{--<li class="notifications-menu">--}}
                        {{--<a href="#" class="dropdown-toggle language" data-toggle="dropdown" aria-expanded="true">--}}
                            {{--<span class="text-uppercase">{{ \App::getLocale() }}</span>--}}
                            {{--<i class="fa fa-angle-down"></i>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown dropdown-menu menu" style="width: 150px;">--}}
                            {{--<li>--}}
                                {{--<ul class="menu">--}}
                            {{--@foreach(config('app.locales') as $lg)--}}
                                {{--<li>--}}
                                    {{--<a style="padding: 6px 10px;" onclick="document.getElementById('locale_client').value = '{{ $lg }}';document.getElementById('frmLag').submit();return false;" href="#">--}}
                                        {{--<i class="fa fa-flag-o"></i>--}}
                                        {{--{{ __($lg) }}--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--{!! Form::open(['method' => 'POST', 'url' => 'change_locale', 'class' => 'form-inline navbar-select', 'id' => 'frmLag']) !!}--}}
                        {{--<input type="hidden" id="locale_client" name="locale_client" value="">--}}
                        {{--{!! Form::close() !!}--}}
                    {{--</li>--}}
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu" id="user_menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                        {!! Auth::user()->showAvatar(["class"=>"user-image"], asset(config('settings.avatar_default'))) !!}
                        {{--<img src="{{ asset(config('settings.avatar_default')) }}" class="user-image" alt="User Image"/>--}}
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <b class="hidden-xs">{{ Auth::user()->name }}</b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="active">
                                <div class="dw-user-box in">
                                    <div class="u-img">
                                        {!! Auth::user()->showAvatar(["class"=>""], asset(config('settings.avatar_default'))) !!}
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                        @foreach(Auth::user()->roles as $role)
                                            <span class="badge label-success">{{ $role->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <!-- The user image in the menu -->

                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/profile') }}"><i class="fa fa-user-o"></i> {{ trans('adminlte_lang::message.profile') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/'.app()->getLocale().'/support') }}"><i class="fa fa-question" style="margin-right: 14px;"></i> {{ trans('adminlte_lang::message.help_center') }}</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}" id="logout"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{ trans('adminlte_lang::message.signout') }}
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="submit" value="logout" style="display: none;">
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>
