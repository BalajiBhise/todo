<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="To Do Time" name="description" />
    <meta content="Balaji Bhise" name="author" />
    <!-- App favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/public')}}/Login/assets/images/todo.svg">

    <!-- Bootstrap Css -->
    <link href="{{url('public/Login')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{url('public/Login')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{url('public/Login')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{url('public/Login')}}/assets/libs/toastr/toastr.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="{{url('public/Login')}}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{url('public/Login')}}/assets/libs/toastr/toastr.min.js"></script>
</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <h5>Sign In</h5>
                        </div>
                    </div>
                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="post" action="{{url('/handlelogin')}}"> {{ csrf_field()}}
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="username" class="form-label">Email address</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon22"><i class="fa fa-envelope"></i></span>
                                        <input type="text" class="form-control" required placeholder="Enter Your Email Address." class="form-control" name="username" id="username" aria-label="Email" aria-describedby="basic-addon22">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <label class="form-label" for="pass">Password</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon33"><i class="toggle-icon fa fa-eye"></i></span>
                                        <input type="password" class="form-control" required minlength="5" placeholder="Enter Password here." name="password" id="password" aria-label="Password" aria-describedby="basic-addon33">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit" id="login">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->
    <!-- JAVASCRIPT -->



    <script>
        $(document).ready(function() {
            if (localStorage.remember && localStorage.remember != "") {
                $("#customCheck1").attr("checked", "checked");
                $("#username").val(localStorage.username);
                $("#password").val(localStorage.password);
            } else {
                $("#customCheck1").removeAttr("checked");
                $("#username").val("");
                $("#password").val("");
            }

            $("#login").click(function() {
                if ($("#customCheck1").is(":checked")) {
                    localStorage.username = $("#username").val();
                    localStorage.password = $("#password").val();
                    localStorage.remember = $("#customCheck1").val();
                } else {
                    localStorage.username = "";
                    localStorage.password = "";
                    localStorage.remember = "";
                }
            });

            $('.toggle-icon').click(function() {
                var $input = $("#password");
                var type = $input.attr('type') === 'password' ? 'text' : 'password';
                $input.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash'); 
            });
        });
    </script>
    @if(session()->has("error"))
    <script>
        toastr.error('{{session()->get("error")}}');
    </script>
    @elseif(session()->has("success") && !empty(session()->get("success")))
    <script>
        toastr.success('{{session()->get("success")}}');
    </script>
    @endif
</body>

</html>