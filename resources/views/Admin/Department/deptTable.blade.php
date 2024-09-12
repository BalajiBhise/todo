<table id="deptTable" class="table  border">
    <thead class="bg-success text-white">
        <tr>
            <th>#</th>
            <th>Department Name</th>
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
                {{$dt->deptName ?? ''}}
            </td>
            <td>{{$dt->created_at}}</td>
            <td>
                <a href="javascript:void(0)" onclick="editDept('{{$dt->id}}','{{$dt->deptName}}')"> <i class="fa fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="deleteDepartment('{{$dt->id}}','{{$dt->deptName}}')"> <i class="fa fa-trash"></i> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>