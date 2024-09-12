{{csrf_field()}}
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="task">Task</label>
            <input type="text" name="task" id="task" placeholder="Enter task here" value="{{$data->task}}" required class="form-control">
        </div>
    </div>
    <div class="row mt-2">
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="col-md-12">
            <label for="EmpId">Employee Name</label>
            <select name="EmpId" id="EmpId" class="form-select select2" required>
                <option value="">Select Employee</option>
                @foreach($Employee as $cnt)
                <option value="{{$cnt->id }}" {{$data->EmpId == $cnt->id ? 'selected' : ''}}>{{$cnt->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-info waves-effect text-start text-white">Update</button>
    <button type="button" class="btn btn-danger waves-effect text-start text-white" data-bs-dismiss="modal">Close</button>
</div>