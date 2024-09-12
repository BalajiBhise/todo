<table id="AssignedTaskTable" class="table  border">
    <thead class="bg-success text-white">
        <tr>
            <th>#</th>
            <th>Task</th>
            <th>Status</th>
            <th>Indate</th>
            <th>Update</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key=>$dt)
        <tr>
            <td>{{$key + 1}}
            </td>
            <td>
                {{$dt->task ?? ''}}
            </td>
            <td>
                {{$dt->status ?? ''}}
            </td>
            <td>{{$dt->created_at}}</td>
            <td>{{$dt->updated_at}}</td>
            <td>
                <a href="javascript:void(0)" onclick="editTask('{{$dt->id}}')"> <i class="fa fa-edit"></i> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>