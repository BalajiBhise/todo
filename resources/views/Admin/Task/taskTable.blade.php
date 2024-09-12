<table id="TaskTable" class="table  border">
    <thead class="bg-success text-white">
        <tr>
            <th>#</th>
            <th>Task</th>
            <th>Assignee</th> 
            <th>Status</th>
            <th>Indate</th>
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
                {{$dt->name ?? ''}}
            </td>
            <td>{{$dt->status ?? ''}}
            </td> 
            <td>{{$dt->created_at}}</td>
            <td>
                <a href="javascript:void(0)" onclick="editTask('{{$dt->id}}')"> <i class="fa fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="deleteTask('{{$dt->id}}')"> <i class="fa fa-trash"></i> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>