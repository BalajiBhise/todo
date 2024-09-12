{{ csrf_field() }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <label for="EmpName">Employee Name</label>
            <input type="text" name="EmpName" id="EmpName" minlength="5" placeholder="Enter org Name" value="{{$data->name}}" required class="form-control">
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>
        <div class="col-md-4">
            <label for="username">Email</label>
            <input type="email" name="username" id="username" placeholder="Enter Email" value="{{$data->username}}" required class="form-control">
        </div>
        <div class="col-md-4">
            <label for="Department">Department</label>
            <select name="Department" id="Department" class="form-select select2" required>
                <option value="">Select Department</option>
                @foreach($dept as $cnt)
                <option value="{{$cnt->id }}" {{$cnt->id == $data->DeptId ? 'selected' : ''}}>{{$cnt->deptName }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-info waves-effect text-start text-white">Update</button>
    <button type="button" class="btn btn-danger waves-effect text-start text-white" data-bs-dismiss="modal">Close</button>
</div>