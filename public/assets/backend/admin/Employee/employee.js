$(document).ready(function () {
    getData();
});
$(document).on("submit", "#addEmpform", function (e) {
    e.preventDefault();
    $.ajax({
        url: baseurl + "/saveEmployee",
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
             
            if (response.type != "error" || response.type != "warning") {
                $(".addEmp").modal("hide");
                $("#addEmpform").trigger("reset");
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

$(document).on("submit", "#EditEmpform", function (e) {
    e.preventDefault();
    $.ajax({
        url: baseurl + "/updateEmployee",
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            
            if (response.type != "error" || response.type != "warning") {
                toastr.success(response.msg)
                $(".editEmp").modal("hide");
                $("#EditEmpform").trigger("reset");
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
function editUser(id, name) {
    $.ajax({
        url: baseurl + "/getEditUserData",
        type: "GET",
        data: { id },
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.type != "error") {
                $("#EditHeader").text("Edit Employee Details of : " + name);
                $("#EditEmpform").empty().html(response);
                $(".editEmp").modal("show");
            } else {
                toastr.error(response.msg);
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
}
function deleteEmployee(id, name) {
    Swal.fire({
        title: "Are you sure  to delete " + name + " Employee ?",
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
                url: baseurl + "/deleteEmployee",
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
        url: baseurl + "/getEmployeeData",
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
    $("#empTable").DataTable({
        pageLength: 25,
        responsive: true,
    });
};
 
