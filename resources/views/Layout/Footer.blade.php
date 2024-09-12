<footer class="footer">
    © {{date("Y")}}
</footer>
</div>

<script src="{{url('/public')}}/js/bootstrap-datepicker.min.js"></script>
<script src="{{url('/public')}}/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('/public')}}/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{url('/public')}}/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--Menu sidebar -->
<script src="{{url('/public')}}/assets/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="{{url('/public')}}/assets/dist/js/custom.min.js"></script>
<script src="{{url('/public')}}/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Popup message jquery -->
<script src="{{url('/public')}}/Login/assets/libs/toastr/toastr.min.js"></script>
<!-- Select 2 -->
<script src="{{url('/public')}}/Login/assets/libs/select2/js/select2.min.js"></script>
<!-- sweetalert -->
<script src="{{url('/public')}}/assets/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

<!-- Pusher -->
<script src="{{url('/public')}}/assets/dist/js/pusher.min.js"></script>
@if(request()->segment(1) == "admin")
<script>
    var baseurl = "{{url('/admin')}}";
</script>
@else
<script>
    var baseurl = "{{url('/')}}";
    var passFlag = "{{auth()->user()->passFlag}}";
    var id = "{{auth()->user()->id}}";
    $(document).ready(function() {
        getNotification();
    })
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = false;

    var pusher = new Pusher('97a3223ffc57b9df626e', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('task.' + id);
    channel.bind('MessageSent', function(data) {
        getNotification();
        $(".fa-bell").addClass("fa-shake")
        setTimeout(() => {
            $(".fa-bell").removeClass("fa-shake")
        }, 2000)
    });

    function getNotification() {
        $.ajax({
            type: "GET",
            url: baseurl + "/getNotification",
            success: function(response) {
                if (!response.hasOwnProperty("error")) {
                    $(".bounceInDown").empty().html(response);
                } else
                    toastr.error(response.error);
            }
        })
    }
</script>
@endif
<script>
    // document.addEventListener('contextmenu', function(e) {
    //     e.preventDefault();
    // });
    $(document).ready(function() {
        $(".select2").select2();
    })
</script>
@yield("script")
</body>

</html>