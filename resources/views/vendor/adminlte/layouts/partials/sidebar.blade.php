<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{--@if (! Auth::guest())--}}
            {{--<div class="user-panel">--}}
                {{--<div class="pull-left image">--}}
                    {{--<img src="{{ asset(config('settings.avatar_default')) }}" class="img-circle" alt="User Image" />--}}
                    {{--{!! Auth::user()->showAvatar(["class"=>"img-circle"], asset(config('settings.avatar_default'))) !!}--}}
                {{--</div>--}}
                {{--<div class="pull-left info">--}}
                    {{--<p>{{ Auth::user()->name }}</p>--}}
                    {{--<!-- Status -->--}}
                    {{--<a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}

    <!-- search form (Optional) -->
        <!--
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        @php
        $arLink = [
            [
                'icon' => 'fa fa-dashboard',
                'title' => __('Dashboard'),
                'href' => 'home',
            ],
            [
                'icon' => 'fa fa-user-plus',
                'title' => __('Tải khoản Người dùng'),
                'href' => 'admin/users',
            ],
            [
                'icon' => 'fa fa-user-times',
                'title' => __('Vai trò người dùng'),
                'href' => 'admin/roles',
            ],
        ];
        @endphp
    {{ Menu::sidebar(Auth::user(), $arLink) }}
    <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
