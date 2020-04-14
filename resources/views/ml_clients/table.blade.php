<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Legajo</th>
                <th>Nombre</th>
                <th>Apellido </th>
                <th>País</th>
                <th>Ciudad</th>
                <th>Ubicación </th>
                <th>Unidad</th>
                <th>Rep</th>
                <th >Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mlClients as $mlClient)
            <tr>
                <td>{!! $mlClient->legajo !!}</td>
                <td>{!! $mlClient->name !!}</td>
                <td>{!! $mlClient->last_name !!}</td>
                <td>{!! $mlClient->country !!}</td>
                <td>{!! $mlClient->site !!}</td>
                <td>{!! $mlClient->agrup_site !!}</td>
                <td>{!! $mlClient->unidad !!}</td>

                <td>{!! $mlClient->rep !!}</td>
                <td>
                    {!! Form::open(['route' => ['mlClients.destroy', $mlClient->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('mlClients.show', [$mlClient->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('mlClients.edit', [$mlClient->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
