<div class="table-responsive">
    <table class="table" id="notifications-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Type</th>
        <th>Segment</th>
        <th>Document Id</th>
        <th>Role</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
            <tr>
                <td>{!! $notification->user_id !!}</td>
            <td>{!! $notification->title !!}</td>
            <td>{!! $notification->content !!}</td>
            <td>{!! $notification->image !!}</td>
            <td>{!! $notification->type !!}</td>
            <td>{!! $notification->segment !!}</td>
            <td>{!! $notification->document_id !!}</td>
            <td>{!! $notification->role !!}</td>
                <td>
                    {!! Form::open(['route' => ['notifications.destroy', $notification->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('notifications.show', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('notifications.edit', [$notification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
