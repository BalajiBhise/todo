$(document).ready(function () {
    if (passFlag == 0 || passFlag == false) {
        $("#updateModal").modal("show");
    }
    getData();
});

$(document).on("submit", "#updPassordForm", function(e) {
    $.ajax({
        url: baseurl + "/updatePassword",
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function() {
            $("#loader").removeClass("loader_hidden");
        },
        success: function(response) {
            if (response.type != "error" || response.type != "warning") {
                toastr.success(response.msg);
                $("#updateModal").modal("hide");
                $("#updPassordForm").trigger("reset");
            } else {
                toastr.error(response.msg);
            }
        },
        complete: function() {
            $("#loader").addClass("loader_hidden");
        },
    });
});
$(document).on("submit", "#EditAssignTaskform", function (e) {
    e.preventDefault();
    $.ajax({
        url: baseurl + "/updateAssignedTask",
        type: "POST",
        data: $(this).serialize(),
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.type != "error" || response.type != "warning") {
                toastr.success(response.msg);
                $(".editAssignTask").modal("hide");
                $("#EditAssignTaskform").trigger("reset");
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
function editTask(id) {
    $.ajax({
        url: baseurl + "/getEditAssignedTaskData",
        type: "GET",
        data: { id },
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.type != "error") {
                $("#EditHeader").text("Edit Task Details ");
                $("#EditAssignTaskform").empty().html(response);
                $(".editAssignTask").modal("show");
            } else {
                toastr.error(response.msg);
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
}

const getData = () => {
    $.ajax({
        url: baseurl + "/getAssignedTaskData",
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
    $("#AssignedTaskTable").DataTable({
        pageLength: 25,
        responsive: true,
    });
};
