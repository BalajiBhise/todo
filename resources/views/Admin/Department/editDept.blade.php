{{ csrf_field() }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="DeptName">Department Name</label>
            <input type="text" name="DeptName" id="DeptName" minlength="5" value="{{$data->deptName}}" placeholder="Enter Deptloyee Name" required class="form-control">
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-info waves-effect text-start text-white">Update</button>
    <button type="button" class="btn btn-danger waves-effect text-start text-white" data-bs-dismiss="modal">Close</button>
</div>