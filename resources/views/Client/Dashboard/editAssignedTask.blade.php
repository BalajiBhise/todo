{{csrf_field()}}
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="task">Task</label>
            <input type="text" name="task" id="task" disabled value="{{$data->task}}" required class="form-control">
        </div>
    </div>
    <div class="row mt-2">
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="col-md-12">
            <label for="Status">Status</label>
            <select name="Status" id="Status" class="form-select select2" required>
                <option value="0" {{$data->Status == 0 ? 'selected' : ''}}>Open</option>
                <option value="1" {{$data->Status == 1 ? 'selected' : ''}}>In Progress</option>
                <option value="2" {{$data->Status == 2 ? 'selected' : ''}}>Completed</option>
            </select>
        </div>
    </div> 
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-info waves-effect text-start text-white">Update</button>
    <button type="button" class="btn btn-danger waves-effect text-start text-white" data-bs-dismiss="modal">Close</button>
</div>