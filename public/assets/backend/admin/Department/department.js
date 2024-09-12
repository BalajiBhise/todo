$(document).ready(function () {
    getData();
});
$(document).on("submit", "#addDeptform", function (e) {
    e.preventDefault();
    $.ajax({
        url: baseurl + "/saveDepartment",
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.type != "error" || response.type != "warning") {
                $(".addDept").modal("hide");
                $("#addDeptform").trigger("reset");
                toastr.success(response.msg);
                getData();
            } else {
                toastr.error(response.msg);
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
});

$(document).on("submit", "#EditDeptform", function (e) {
    e.preventDefault();
    $.ajax({
        url: baseurl + "/updateDepartment",
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.type != "error" || response.type != "warning") {
                $(".editDept").modal("hide");
                $("#EditDeptform").trigger("reset");
                getData();
                toastr.success(response.msg);
            } else {
                toastr.error(response.msg);
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
});
function editDept(id, name) {
    $.ajax({
        url: baseurl + "/getEditDeptData",
        type: "GET",
        data: { id },
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.type != "error") {
                $("#EditHeader").text("Edit Department Details of : " + name);
                $("#EditDeptform").empty().html(response);
                $(".editDept").modal("show");
            } else {
                toastr.error(response.msg);
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
}
function deleteDepartment(id, name) {
    Swal.fire({
        title: "Are you sure  to delete " + name + " Department ?",
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
                url: baseurl + "/deleteDepartment",
                type: "POST",
                data: { id },
                beforeSend: function () {
                    $("#loader").removeClass("loader_hidden");
                },
                success: function (response) {
                    if (response.type == "error") toastr.error(response.msg);
                    else toastr.success(response.msg);
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
        url: baseurl + "/getDepartmentData",
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
    $("#deptTable").DataTable({
        pageLength: 25,
        responsive: true,
    });
};
