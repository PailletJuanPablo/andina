<div class="table-responsive">
    <table class="table" id="cobranzas-table">
        <thead>
            <tr>
                <th>Fecha </th>
                <th>Monto</th>
                <th>CECO</th>

                <th>Origen</th>
                <th>Destino</th>
                <th>Beneficiario</th>
                <th>Registrado por móvil nº</th>
                <th>Firma</th>

                <th >Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cobranzas as $cobranza)
            <tr>
                <td>{!! $cobranza->operation_date !!}</td>
                <td>${!! $cobranza->ammount !!}</td>
                <td>{!! $cobranza->ceco ? $cobranza->ceco->title : 'Sin asignar' !!} </td>

                <td>{!! $cobranza->origin !!}</td>
                <td>{!! $cobranza->destination !!}</td>
                <td>{!! $cobranza->name !!}</td>
                <td>{!! $cobranza->user ? $cobranza->user->identificator : ''!!}</td>

                <td> <img src="{{$cobranza->sign}}" width="50"> </td>

                <td>
                    {!! Form::open(['route' => ['cobranzas.destroy', $cobranza->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cobranzas.show', [$cobranza->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>