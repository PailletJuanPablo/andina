<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Email Verified At</th>
        <th>Password</th>
        <th>Dni</th>
        <th>Remember Token</th>
        <th>Role Id</th>
        <th>Organization</th>
        <th>Company Id</th>
        <th>Registration Status Id</th>
        <th>Identificator</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->first_name !!}</td>
            <td>{!! $user->last_name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->email_verified_at !!}</td>
            <td>{!! $user->password !!}</td>
            <td>{!! $user->dni !!}</td>
            <td>{!! $user->remember_token !!}</td>
            <td>{!! $user->role_id !!}</td>
            <td>{!! $user->organization !!}</td>
            <td>{!! $user->company_id !!}</td>
            <td>{!! $user->registration_status_id !!}</td>
            <td>{!! $user->identificator !!}</td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
