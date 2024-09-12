 <header class="topbar">
     <nav class="navbar top-navbar navbar-expand-md navbar-dark">
         <!-- ============================================================== -->
         <!-- Logo -->
         <!-- ============================================================== -->
         <div class="navbar-header">
             <a class="navbar-brand" href="javascript:void(0)">
                 <!-- Dark Logo icon -->
                 <h5 class="text-center p-2">TO DO</h5>
                 <!-- </b> -->
                 <!--End Logo icon -->
                 <!-- Logo text -->
                 <span class="hidden-sm-down">
                     <!-- dark Logo text -->
                     
                 </span>
             </a>
         </div>
         <!-- ============================================================== -->
         <!-- End Logo -->
         <!-- ============================================================== -->
         <div class="navbar-collapse">
             <!-- ============================================================== -->
             <!-- toggle and nav items -->
             <!-- ============================================================== -->
             <ul class="navbar-nav me-auto">
                 <!-- This is  -->
                 <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                 <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                 <!-- ============================================================== -->
                 <!-- Search -->
                 <!-- ============================================================== -->
             </ul>
             <!-- ============================================================== -->
             <!-- User profile and search -->
             <!-- ============================================================== -->
             <ul class="navbar-nav my-lg-0">
                @if(Request::segment(1) != 'admin')
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                         <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown">
                         
                     </div>
                 </li>
                 @endif
                 <li class="nav-item dropdown u-pro">
                     <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <img src="{{url('/public')}}/assets/images/EmptyUser.png" alt="user" class="">
                         <span class="hidden-md-down text-white">@if(request()->segment(1) == 'admin') Admin @else {{auth()->user()->name}} @endif &nbsp;<i class="fa fa-angle-down"></i></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end animated flipInY">
                         <!-- text-->
                         @if(request()->segment(1) == 'admin')
                         <a href="{{url('/admin/logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                         @else
                         <a href="{{url('/logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                         @endif
                     </div>
                 </li>
             </ul>
         </div>
     </nav>
 </header>
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         @if(request()->segment(1) == 'admin')
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li>
                     <a href="{{url('/admin/employee')}}" aria-expanded="false"><i class="ti-list"></i><span class="hide-menu">Employee </span></a>
                 </li>
                 <li>
                     <a href="{{url('/admin/department')}}" aria-expanded="false"><i class="fa fa-university"></i><span class="hide-menu">Department</span></a>
                 </li>
                 <li>
                     <a href="{{url('/admin/task')}}" aria-expanded="false"><i class="ti-layout-media-center-alt"></i><span class="hide-menu">Task </span></a>
                 </li>

             </ul>
         </nav>
         @else
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <!-- <li>
                     <a href="{{url('/dashboard')}}" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </span></a>
                 </li> -->
                 <li>
                     <a href="{{url('/dashboard')}}" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </span></a>
                 </li>
                 <!-- <li>
                     <a href="{{url('/DetailedActivity')}}" aria-expanded="false"><i class="ti-pulse"></i><span class="hide-menu">Work Activity </span></a>
                 </li> -->

             </ul>
         </nav>
         @endif
     </div>
 </aside>