<div class="table-responsive">
    <table class="table" id="cobranzas-table">
        <thead>
            <tr>
                <th>Identificador </th>
                <th>Móvil </th>
                <th>Empresa</th>

                <th>Fecha </th>
                <th>Monto</th>

                <th>Origen</th>
                <th>Destino</th>
                <th>Beneficiario</th>

                <th> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @foreach($cobranzas as $cobranza)
            <tr>
                <td>{!! $cobranza->id !!}</td>
                <td>{!! $cobranza->user ? $cobranza->user->last_name : '' !!}</td>
                <td>{!! $cobranza->company ? $cobranza->company->title : '' !!}</td>


                <td>{!! $cobranza->operation_date->format('d-m-Y') !!}</td>
                <td>${!! $cobranza->ammount !!}</td>

                <td>{!! $cobranza->origin !!}</td>
                <td>{!! $cobranza->destination !!}</td>
                <td>{!! $cobranza->name !!}</td>





                <td>
                    <a href="{!! route('cobranzas.show', [$cobranza->id]) !!}" class='btn btn-default btn-xs'><i
                        class="glyphicon glyphicon-eye-open"></i></a>

                    {!! Form::open(['route' => ['cobranzas.destroy', $cobranza->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cobranzas.edit', [$cobranza->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirma eliminación?')"]) !!}
                    </div>
                    {!! Form::close() !!}

                </td>



            </tr>
            @endforeach
        </tbody>
    </table>
</div>
