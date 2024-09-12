$(document).ready(function () {
    getData();
    // addorg()
});
$(document).on("submit", ".addorgform", function (e) {
    e.preventDefault();
    $.ajax({
        url: baseurl + "/saveorg",
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            Swal.fire({
                title: response.title,
                text: response.msg,
                type: response.type,
            });
            if (response.type != "error" || response.type != "warning") {
                $(".addorg").modal("hide");
                $(".addorgform").trigger("reset");
                var option = "<option value=''>Select District</option>";
                $("#State option:first")
                    .attr("selected", "selected")
                    .trigger("change");
                $("#District").empty().html(option);
                getData();
            }
        },
    });
});

$(document).on("submit", "#EditCorpData", function (e) {
    $.ajax({
        url: baseurl + "/EditCorpData",
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            Swal.fire({
                title: response.title,
                text: response.msg,
                type: response.type,
            });
            if (response.type != "error" || response.type != "warning") {
                getData();
            }
            $(".EditCorp").modal("hide");
        },
    });
});
$(document).on("change", "#State", function (e) {
    let sid = $(this).val();
    $.ajax({
        url: baseurl + "/changestate",
        type: "GET",
        data: { sid },
        success: function (response) {
            var option = "<option value=''>Select District</option>";
            response.map((value, index) => {
                option += `<option value=${value.DISTRICT}>${value.DISTRICT}</option>`;
            });
            $("#District").empty().html(option);
        },
    });
});
function editCorp(ID, CorpName) {
    $.ajax({
        url: baseurl + "/editorg",
        type: "GET",
        data: { ID, CorpName },
        success: function (response) {
            if (!response.hasOwnProperty("error")) {
                $("#EditCorpData").empty().html(response);
                $(".EditCorpHeader").text("Edit Details For : " + CorpName);
                $(".EditCorp").modal("show");
            } else {
                toastr.error(response.error);
            }
        },
    });
}

function onlyNumberKey(evt) {
    var ASCIICode = evt.which ? evt.which : evt.keyCode;
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) return false;
    return true;
}
const getData = () => {
    let stat = $("#userstatus").val();
    $.ajax({
        url: baseurl + "/GetDashboardData",
        type: "GET",
        data: { stat },
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.hasOwnProperty("error")) {
                toastr.error(response.error);
            } else {
                $(".table-responsive").empty().html(response);
                dtable();
                $(".toggle-icon").click(function () {
                    console.log(targetId);
                    var targetId = $(this).data("id");
                    var $input = $("#password" + targetId);
                    var type =
                        $input.attr("type") === "password"
                            ? "text"
                            : "password";
                    $input.attr("type", type);
                    $(this).toggleClass("fa-eye fa-eye-slash"); // Toggle icon classes
                });
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
};
const getUsers = (ID, CorpId) => {
    $.ajax({
        url: baseurl + "/getCorpUsers",
        type: "GET",
        data: { ID, CorpId },
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.hasOwnProperty("error")) {
                toastr.error(response.error);
            } else {
                $(".userdata").empty().html(response);
                $(".userCountHeader").text("All Users of " + CorpId);
                $(".usercount").modal("show");
                userTable();
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
};
const getLog = (LicKey, CorpId) => {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
        },
    });
    $.ajax({
        url: baseurl + "/getLogByUser",
        type: "POST",
        data: { LicKey, CorpId },
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.hasOwnProperty("error")) {
                toastr.error(response.error);
            } else {
                toastr.success(response.success);
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
};
const getSettings = (CorpId) => {
    $.ajax({
        url: baseurl + "/getSettings",
        type: "GET",
        data: { CorpId },
        beforeSend: function () {
            $("#loader").removeClass("loader_hidden");
        },
        success: function (response) {
            if (response.hasOwnProperty("error")) {
                toastr.error(response.error);
            } else {
                $("#settingData").empty().html(response);
                $("#settingHeader").text("Apply Setting For " + CorpId);
                $(".setting").modal("show");
                $("#Shell").select2({
                    dropdownParent : $(".setting")
                })
            }
        },
        complete: function () {
            $("#loader").addClass("loader_hidden");
        },
    });
};
function checknumber(event) {
    var charCode = event.which ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
}
$("#userstatus").change(function () {
    getData();
});
function addorg() {
    $("#District").select2({
        dropdownParent: $(".addorg"),
    });
    $("#State").select2({
        dropdownParent: $(".addorg"),
    });
    $(".addorgform").trigger("reset");
}
const dtable = () => {
    $("#orgTable").DataTable({
        pageLength: 25,
        responsive: true,
    });
};
const userTable = () => {
    $("#userTable").DataTable({
        pageLength: 25,
        responsive: true,
        info: false,
    });
};
