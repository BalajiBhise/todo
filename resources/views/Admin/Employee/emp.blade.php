@extends("master")
@section('title', 'TO Do - Employee Details')
@section("content")
@section("css")
<style>
    .select2-container {
        width: 100% !important;
    }

    
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1041;
    }

    .modal-body {
        padding: 2rem;
    }

    .card {
        padding: 10px;
        border: 0px !important;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #e3e3e3;
    }

    td {
        border: 1px solid lightgray;
    }

    .table> :not(caption)>*>* {
        padding: 0.6rem 0.6rem !important;
    }

    .row {
        padding-left: 4px;
    }

    .container-fluid,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl,
    .container-xxl {
        padding: 0 13px;
    }

    .card {
        padding: 0px;
    }

    #orgTable_length {
        display: none;
    }

    .input-group {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        width: 70%;
    }

    .dataTables_filter input {
        border: 1px solid;
        background: white !important;
    }

    /* thead th {
        position: sticky !important;
        z-index: 99999;
        background: green !important;
        top: 47px;
    } */
    body {
        background-color: white;
    }

    .bg-redwarning {
        background: #fdeaea !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #fffefe;
        border: 1px solid #aaa;
        border-radius: 4px;
        color: black;
        background: greenyellow;
    }
</style>
@endsection
<!-- <div class="page-wrapper"> -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<!-- <div class="container-fluid"> -->
<!-- </div> -->
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- </div> -->
<div class="row mt-2">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h4>Employee Details </h4>

                    </div>
                    <div class="col-md-3 float-end">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".addEmp">Add Employee</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal bs-example-modal-lg addEmp" data-bs-backdrop="static" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add Employee</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="javascript:void(0)" id="addEmpform" method="post"> {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="EmpName">Employee Name</label>
                            <input type="text" name="EmpName" id="EmpName" minlength="5" placeholder="Enter Employee Name" required class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="username">Email</label>
                            <input type="email" name="username" id="username" placeholder="Enter Email" required class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="Department">Department</label>
                            <select name="Department" id="Department" class="form-select select2" required>
                                <option value="">Select Department</option>
                                @foreach($dept as $cnt)
                                <option value="{{$cnt->id }}">{{$cnt->deptName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect text-start text-white">Save</button>
                    <button type="button" class="btn btn-danger waves-effect text-start text-white" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal bs-example-modal-lg editEmp" data-bs-backdrop="static" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="EditHeader">Edit Employee</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form action="javascript:void(0)" id="EditEmpform" method="post">
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@section("script")
<script src="{{url('public/assets/backend/admin/Employee/employee.js')}}"></script>
@endsection
@endsection