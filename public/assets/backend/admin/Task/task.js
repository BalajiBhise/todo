$(document).ready(function () {
    getData();
});
$(document).on("submit", "#addTaskform", function (e) {
    e.preventDefault();
    $.ajax({
        url: baseurl + "/saveTask",
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
             
            if (response.type != "error" || response.type != "warning") {
                $(".addTask").modal("hide");
                $('#EmpId').val($('#EmpId option:first').val());
                $("#addTaskform").trigger("reset");
                toastr.success(response.msg)
                getData();
            }
            else
            {
                toastr.error(response.msg)
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
});

$(document).on("submit", "#EditTaskform", function (e) {
    e.preventDefault();
    $.ajax({
        url: baseurl + "/updateTask",
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            
            if (response.type != "error" || response.type != "warning") {
                toastr.success(response.msg)
                $(".editTask").modal("hide");
                $("#EditTaskform").trigger("reset");
                getData();
            }
            else
            {
                toastr.error(response.msg)
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
});
function editTask(id) {
    $.ajax({
        url: baseurl + "/getEditTaskData",
        type: "GET",
        data: { id },
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.type != "error") {
                $("#EditHeader").text("Edit Task Details ");
                $("#EditTaskform").empty().html(response);
                $(".editTask").modal("show");
            } else {
                toastr.error(response.msg);
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
}
function deleteTask(id) {
    Swal.fire({
        title: "Are you sure  to delete  Task ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: baseurl + "/deleteTask",
                type: "POST",
                data: { id },
                beforeSend: function () {
                    $("#loader").removeClass("loader_hidden");
                },
                success: function (data) {
                    if(data.type =="error")
                        toastr.error(data.msg)
                    else
                        toastr.success(data.msg) 
                    getData();
                },
                complete: function () {
                    $("#loader").addClass("loader_hidden");
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });
}

 

 
const getData = () => {
    $.ajax({
        url: baseurl + "/getTaskData",
        type: "GET",
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.hasOwnProperty("error")) {
                toastr.error(response.error);
            } else {
                $(".table-responsive").empty().html(response);
                dtable();
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
};

 
const dtable = () => {
    $("#TaskTable").DataTable({
        pageLength: 25,
        responsive: true,
    });
};
 
