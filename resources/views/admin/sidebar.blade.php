  <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
     <div id="sidebar-menu" class="sidebar-menu">
     <ul>
       
       <li >
         <a href="{{url('/admin')}}"><i class="la la-dashboard"></i>  <span> Dashboard </span>   </a> 
       </li>
       
       <li class="menu-title"> 
         <span>Employees </span>
       </li>
        @can('admin_manage_access')
       <li> 
         <a href="{{route('admin.adminmanage.index')}}"><i class="la la-users"></i>  <span>Employees </span></a>
       </li>
       @endcan

        <li> 
         <a href="{{route('admin.order.index')}}"><i class="la la-list"></i>  <span>Order </span></a>
       </li>

       <li> 
         <a href="{{route('admin.task.index')}}"><i class="la la-pencil-square"></i>  <span>Assign Task </span></a>
       </li>
       
        @can('admin_manage_access')
       <li> 
         <a href="{{route('admin.usertask.index')}}"><i class="la la-ticket"></i>  <span>Tickets </span></a>
       </li>
        @endcan
        @can('useractivity_access')
        <li> 
         <a href="{{route('admin.clients.index')}}"><i class="la la-user"></i>  <span> Clients </span></a>
       </li>
        @endcan


        <li> 
         <a href="email.php"><i class="la la-envelope"></i>  <span>Email  </span></a>
       </li>

       <li class="menu-title"> 
         <span>Billing </span>
       </li>
       <li class="submenu">
         <a href="#"><i class="la la-files-o"></i>  <span> Accounts  </span>  <span class="menu-arrow"></span></a>
         <ul >
          @can('invoice_access')
           <li><a href="{{route('admin.invoice.index')}}">Invoice </a></li>
           @endcan
            @can('invoice_access')
           <li><a href="{{route('admin.invoiceanalysis.index')}}">Invoice report </a></li>
           @endcan
            @can('vendor_access')
           <li><a href="{{route('admin.vendor.index')}}">Vendors </a></li>
           @endcan
            @can('purchase_bill_access')
           <li><a href="{{route('admin.purchasebill.index')}}">Purchases </a></li>
           @endcan

         </ul>
       </li>
      
      
       
       <li class="menu-title"> 
         <span>Administration </span>
       </li>
      
       <li> 
         <a href="users.php"><i class="la la-user-plus"></i>  <span>Roles & Permission </span></a>
       </li>
        <li class="menu-title"> 
         <span>Settings </span>
       </li>
       <li class="submenu">
         <a href="#"><i class="la la-files-o"></i>  <span> Manage System  </span>  <span class="menu-arrow"></span></a>
         <ul >
           <li><a href="{{route('admin.service.index')}}">Services </a></li>          
           <li><a href="{{route('admin.service-type.index')}}">Service Types </a></li>        
           <li><a href="{{route('admin.programming-type.index')}}">Programming Types </a></li>         

         </ul>
       </li>     
       
     </ul>
   </div>
  </div> 