
@if(Auth::user()->role_id == 1)
<li class="{{ Request::is('companies*') ? 'active' : '' }}">
        <a href="{!! route('companies.index') !!}"><i class="fa fa-edit"></i><span>Companies</span></a>
    </li>
@endif

<li class="{{ Request::is('home*') ? 'active' : '' }}">
        <a href="{!! route('home') !!}"><i class="fa fa-edit"></i><span> Inicio </span></a>
    </li>
    

@if(Auth::user()->role_id == 6)
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Gestión Usuarios</span></a>
</li>
@endif

@if(Auth::user()->role_id == 6)
<li class="{{ Request::is('all_vouchers*') ? 'active' : '' }}">
    <a href="{!! route('all') !!}"><i class="fa fa-edit"></i><span> Listado Completo </span></a>
</li>
@endif


@if(Auth::user()->role_id == 6)
<li class="{{ Request::is('companyMetas*') ? 'active' : '' }}">
    <a href="{!! route('companyMetas.index') !!}"><i class="fa fa-edit"></i><span>Gestión CECOS </span></a>
</li>
@endif
@if(Auth::user()->role_id == 6)
<li class="{{ Request::is('companyMetas*') ? 'active' : '' }}">
    <a href="{!! route('companyMetas.index') !!}"><i class="fa fa-edit"></i><span>Gestión CECOS </span></a>
</li>
@endif
<li class="{{ Request::is('cobranzas*') ? 'active' : '' }}">
    <a href="{!! route('cobranzas.index') !!}"><i class="fa fa-edit"></i><span>Vouchers del período actual</span></a>
</li>
<li class="{{ Request::is('periodo_anterior*') ? 'active' : '' }}">
    <a href="{!! route('periodo_anterior') !!}"><i class="fa fa-edit"></i><span>Vouchers del período anterior</span></a>
</li>

<li class="{{ Request::is('vouchers_ceco_list*') ? 'active' : '' }}">
    <a href="{!! route('cecoLists') !!}"><i class="fa fa-edit"></i><span>Vouchers por CECO</span></a>
</li>

@if(Auth::user()->role_id != 6)

<li class="{{ Request::is('vouchers_periodo*') ? 'active' : '' }}">
    <a href="{!! route('vouchersPeriodo') !!}"><i class="fa fa-edit"></i><span>Vouchers histórico</span></a>
</li>
@endif



@if(Auth::user()->role_id == 1)
<li class="{{ Request::is('notifications*') ? 'active' : '' }}">
    <a href="{!! route('notifications.index') !!}"><i class="fa fa-edit"></i><span>Notifications</span></a>
</li>
@endif
