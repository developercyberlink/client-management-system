<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <meta name="description" content="Cybrlink Client Management" />
     <meta name="keywords" content="Cybrlink Client Management" />
     <meta name="author" content="Cybrlink Client Management" />
     <meta name="robots" content="noindex, nofollow" />
      <title>{{ config('app.name', 'Cyberlink') }}</title>
    
     <!-- Favicon -->
         <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin-assets')}}/img/favicon.png" />    
        
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('admin-assets')}}/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin-assets')}}/css/font-awesome.min.css">
    
    <!-- Lineawesome CSS -->
        <link rel="stylesheet" href="{{asset('admin-assets')}}/css/line-awesome.min.css">
    
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{asset('admin-assets')}}/css/dataTables.bootstrap4.min.css">
    
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('admin-assets')}}/css/select2.min.css">
    
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{asset('admin-assets')}}/css/bootstrap-datetimepicker.min.css">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin-assets')}}/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>

     </head>
  
     <body>
     <!-- Main Wrapper -->
         <div class="main-wrapper">    
       <!-- Header -->
             <div class="header">      
         <!-- Logo -->
              <div class="header-left">
                <a href="{{url('/admin')}}" class="logo">
             <img src="{{asset('admin-assets')}}/img/logo.png" width="40" height="40" alt="" />
           </a>
            </div>
         <!-- /Logo -->
        
         <a id="toggle_btn" href="javascript:void(0);">
           <span class="bar-icon">
             <span></span>
             <span></span>
             <span></span>
           </span>
         </a>
        
         <!-- Header Title -->
                 <div class="page-title-box">
           <h3>Cyberlink's Technologies </h3>
                 </div>
         <!-- /Header Title -->
        
         <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
        
         <!-- Header Menu -->
         <ul class="nav user-menu">
        
           <!-- Search -->
           <li class="nav-item">
             <div class="top-nav-search">
               <a href="javascript:void(0);" class="responsive-search">
                 <i class="fa fa-search"></i>
                </a>
               <form action="search.php">
                 <input class="form-control" type="text" placeholder="Search here" />
                 <button class="btn" type="submit"><i class="fa fa-search"></i></button>
               </form>
             </div>
           </li>
           <!-- /Search -->
        
           <!-- Flag -->
           <li class="nav-item dropdown has-arrow flag-nav">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
               <img src="{{asset('admin-assets')}}/img/flags/us.png" alt="" height="20" />  <span>English </span>
             </a>
             <div class="dropdown-menu dropdown-menu-right">
               <a href="javascript:void(0);" class="dropdown-item">
                 <img src="{{asset('admin-assets')}}/img/flags/us.png" alt="" height="16" /> English
               </a>
               <a href="javascript:void(0);" class="dropdown-item">
                 <img src="{{asset('admin-assets')}}/img/flags/fr.png" alt="" height="16" /> French
               </a>
               <a href="javascript:void(0);" class="dropdown-item">
                 <img src="{{asset('admin-assets')}}/img/flags/es.png" alt="" height="16" /> Spanish
               </a>
               <a href="javascript:void(0);" class="dropdown-item">
                 <img src="{{asset('admin-assets')}}/img/flags/de.png" alt="" height="16" /> German
               </a>
             </div>
           </li>
           <!-- /Flag -->
        
           <!-- Notifications -->
           <li class="nav-item dropdown">
             <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
               <i class="fa fa-bell-o"></i>  <span class="badge badge-pill">3 </span>
             </a>
             <div class="dropdown-menu notifications">
               <div class="topnav-dropdown-header">
                 <span class="notification-title">Notifications </span>
                 <a href="javascript:void(0)" class="clear-noti"> Clear All  </a>
               </div>
               <div class="noti-content">
                 <ul class="notification-list">
                   <li class="notification-message">
                     <a href="activities.php">
                       <div class="media">
                         <span class="avatar">
                           <img alt="" src="{{asset('admin-assets')}}/img/profiles/avatar-02.jpg" />
                         </span>
                         <div class="media-body">
                           <p class="noti-details"><span class="noti-title">John Doe </span> added new task  <span class="noti-title">Patient appointment booking </span></p>
                           <p class="noti-time"><span class="notification-time">4 mins ago </span></p>
                         </div>
                       </div>
                     </a>
                   </li>
                   <li class="notification-message">
                     <a href="activities.php">
                       <div class="media">
                         <span class="avatar">
                           <img alt="" src="{{asset('admin-assets')}}/img/profiles/avatar-03.jpg" />
                         </span>
                         <div class="media-body">
                           <p class="noti-details"><span class="noti-title">Tarah Shropshire </span> changed the task  <span class="noti-title">Appointment booking with payment </span></p>
                           <p class="noti-time"><span class="notification-time">6 mins ago </span></p>
                         </div>
                       </div>
                     </a>
                   </li>
                   <li class="notification-message">
                     <a href="activities.php">
                       <div class="media">
                         <span class="avatar">
                           <img alt="" src="{{asset('admin-assets')}}/img/profiles/avatar-06.jpg" />
                         </span>
                         <div class="media-body">
                           <p class="noti-details"><span class="noti-title">Misty Tison </span> added  <span class="noti-title">Domenic Houston </span> and  <span class="noti-title">Claire Mapes </span> to project  <span class="noti-title">Doctor available module </span></p>
                           <p class="noti-time"><span class="notification-time">8 mins ago </span></p>
                         </div>
                       </div>
                     </a>
                   </li>
                   <li class="notification-message">
                     <a href="activities.php">
                       <div class="media">
                         <span class="avatar">
                           <img alt="" src="{{asset('admin-assets')}}/img/profiles/avatar-17.jpg" />
                         </span>
                         <div class="media-body">
                           <p class="noti-details"><span class="noti-title">Rolland Webber </span> completed task  <span class="noti-title">Patient and Doctor video  </span></p>
                           <p class="noti-time"><span class="notification-time">12 mins ago </span></p>
                         </div>
                       </div>
                     </a>
                   </li>
                   <li class="notification-message">
                     <a href="activities.php">
                       <div class="media">
                         <span class="avatar">
                           <img alt="" src="{{asset('admin-assets')}}/img/profiles/avatar-13.jpg" />
                         </span>
                         <div class="media-body">
                           <p class="noti-details"><span class="noti-title">Bernardo Galaviz </span> added new task  <span class="noti-title">Private chat module </span></p>
                           <p class="noti-time"><span class="notification-time">2 days ago </span></p>
                         </div>
                       </div>
                     </a>
                   </li>
                 </ul>
               </div>
               <div class="topnav-dropdown-footer">
                 <a href="activities.php">View all Notifications </a>
               </div>
             </div>
           </li>
           <!-- /Notifications -->
          
           
             @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
           <li class="nav-item dropdown has-arrow main-drop">
             <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
               <span class="user-img"><img src="{{asset('admin-assets')}}/img/profiles/avatar-21.jpg" alt="" />
               <span class="status online"></span></span>
               <span> {{ Auth::user()->name }} </span>
             </a>
             <div class="dropdown-menu">
               <a class="dropdown-item" href="setting-department.php">Settings </a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
             </div>
           </li>
            @endguest
         </ul>
         <!-- /Header Menu -->
        
         <!-- Mobile Menu -->
           @guest
              @if (Route::has('login'))
              <div class="dropdown mobile-user-menu">
               <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
               <div class="dropdown-menu dropdown-menu-right">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
               </div>
              </div>
              @endif

              @if (Route::has('register'))
            <div class="dropdown mobile-user-menu">
               <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
               <div class="dropdown-menu dropdown-menu-right">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                 </div>
              </div>
              @endif
          @else
         <div class="dropdown mobile-user-menu">
           <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
           <div class="dropdown-menu dropdown-menu-right">
             <a class="dropdown-item" href="setting-department.php">Settings </a>
               <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
           </div>
         </div>
           @endguest
         <!-- /Mobile Menu -->
        
             </div>
       <!-- /Header -->
      
       <!-- Sidebar -->
        @include('admin.sidebar')
        </div>
       <!-- /Sidebar -->
      
       <!-- Page Wrapper -->
             <div class="page-wrapper">
               @include('admin.message')

                @yield('content')

                </div>
       <!-- /Page Wrapper -->
      
         </div>
     <!-- /Main Wrapper -->
    
    <!-- jQuery -->
   <script src="{{asset('admin-assets')}}/js/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('admin-assets')}}/js/popper.min.js"></script>
    <script src="{{asset('admin-assets')}}/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('admin-assets')}}/js/jquery.slimscroll.min.js"></script>
    
    <!-- Select2 JS -->
    <script src="{{asset('admin-assets')}}/js/select2.min.js"></script>
    
    <!-- Datetimepicker JS -->
    <script src="{{asset('admin-assets')}}/js/moment.min.js"></script>
    <script src="{{asset('admin-assets')}}/js/bootstrap-datetimepicker.min.js"></script>
    
    <!-- Datatable JS -->
    <script src="{{asset('admin-assets')}}/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin-assets')}}/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom JS -->
    <script src="{{asset('admin-assets')}}/js/app.js"></script>

<script>
  $(document).ready( function () {

    $('#dataTable').DataTable();
    $('#dataTable2').DataTable();

    $('#lfm').filemanager('image');

      // toaster
      toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
      }



  } );
  function showToast(){
      Command: toastr["success"]("iam himalayan pyramids", "Message");
  }
</script>
@yield('script') 
     </body>
 </html>