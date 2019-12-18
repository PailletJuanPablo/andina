<div class="table-responsive">
    <table class="table" id="companyMetas-table">
        <thead>
            <tr>
                <th>Identificador</th>
        <th>Secretaria Asignada</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($companyMetas as $companyMeta)
            <tr>
                <td>{!! $companyMeta->title !!}</td>
            <td>{!! $companyMeta->user ? $companyMeta->user->first_name . ' ' . $companyMeta->user->last_name : 'Sin asignar' !!} </td>
                <td>
                    {!! Form::open(['route' => ['companyMetas.destroy', $companyMeta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('companyMetas.edit', [$companyMeta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
