<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">

                @if (Auth::user()->company || Auth::user()->company_id == 9)
                <img src="{{asset('images/logo_family.jpeg')}}" class="img-circle" alt="RAI Empresas" />
                @else
                <img src="{{asset('images/logo_rai.png')}}" class="img-circle" alt="RAI Empresas" />
                @endif

            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>RAI Empresas</p>
                @else
                <p>{{ Auth::user()->first_name}}</p>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

