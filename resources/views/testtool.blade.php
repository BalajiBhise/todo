<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Form</title>
  <link rel="icon" type="image/png" sizes="16x16" href="{{url('/public')}}/Login/assets/images/todo.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

</head>

<body>
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-md-2"></div>
      <div class="col-auto">
        <a href="{{ url('/') }}">Add</a>
      </div>
      {{--<div class="col-auto">
        <a href="{{ url('/list') }}">List</a>
    </div>--}}
  </div>
  <div class="row">
    <div class="col-lg-6 m-auto mt-5">
      <form id="TestDataForm" autocomplete="false">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-group mb-3">
            <label class="input-group-text col-2" for="Id">CorpId</label>
            <select class="form-select" id="orgid" name="orgid" required="">
              <option value="" selected disabled>Select CorpId</option>
              @foreach ($data as $user)
              <option value="{{ $user->Id }}" data-corp="{{ $user->CorpId}}">{{ $user->CorpId}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3">
            <label class="input-group-text col-2" for="Username">Username </label>
            <select class="form-select" id="Username" name="Username" required="">
              <option value="" selected disabled>Select Username</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3">
            <label class="input-group-text col-2" for="Date" class="form-label">Start Date </label>
            <input class="col-10" type="date" name="StartDate" id="StartDate" required="">
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3">
            <label class="input-group-text col-2" for="StartTime" class="form-label">Start Time </label>
            <input class="col-10" type="time" name="StartTime" id="StartTime" required="">
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3">
            <label class="input-group-text col-2" for="Date" class="form-label">End Date </label>
            <input class="col-10" type="date" name="EndDate" id="EndDate" required="">
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3">
            <label class="input-group-text col-2" for="EndTime" class="form-label">End Time </label>
            <input class="col-10" type="time" name="EndTime" id="EndTime" required="">
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3">
            <label class="input-group-text col-2" for="Status">Status Event </label>
            <select class="form-select" id="Status" name="Status" required="">
              <option value="0" selected disabled></option>
              <option value="Work">Work</option>
              <option value="Ideal">Idle</option>
              <option value="Lock">Lock</option>

            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary col-12">Submit</button>
      </form>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#orgid').change(function() {
        var id = $(this).val();

        $.ajaxSetup({
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
              "content"
            ),
          },
        });

        $.ajax({
          method: "GET",
          url: "{{url('/getToken')}}",
          data: {
            id: id
          },
          success: function(data) {
            $('#Username').empty(); // Clear existing options
            $('#Username').append('<option value="0">Select Username</option>');
            $.each(data, function(key, value) {
              $('#Username').append('<option value="' + value.LicKey + '">' + value.FriendlyName + '</option>');
            });
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        })
      })


      $(document).on("submit", "#TestDataForm", function(e) {
        e.preventDefault();

        let CorpId = $('#orgid :selected').data('corp');
        let formData = $(this).serializeArray();
        formData.push({
          name: "CorpId",
          value: CorpId
        });

        $.ajaxSetup({
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
              "content"
            ),
          },
        });

        $.ajax({
          method: "POST",
          url: "{{url('/TestDataForm')}}",
          data: formData,
          success: function(data) {
            if (data.hasOwnProperty("success")) {
              alert(data.success);
              // $("#TestDataForm")[0].reset();
              $('#StartDate').val('');
              $('#EndDate').val('');
              $('#StartTime').val('');
              $('#EndTime').val('');
            } else {
              alert(data.error);
            }
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        })
      })
    })
  </script>
</body>

</html>