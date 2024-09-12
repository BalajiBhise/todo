<table id="empTable" class="table  border">
    <thead class="bg-success text-white">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Department</th>
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
                {{$dt->name ?? ''}}
            </td>
            <td>{{$dt->username ?? ''}}
            </td>
            <td>{{$dt->password ?? ''}}</td>
            <td>{{$dt->deptName ?? ''}}</td>
            <td>{{$dt->created_at}}</td>
            <td>
                <a href="javascript:void(0)" onclick="editUser('{{$dt->id}}','{{$dt->name}}')"> <i class="fa fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="deleteEmployee('{{$dt->id}}','{{$dt->name}}')"> <i class="fa fa-trash"></i> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>