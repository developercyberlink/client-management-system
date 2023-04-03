@extends('layouts.admin')
@section('content')
<!-- Page Content -->
     <div class="content container-fluid">

	 <!-- Page Header -->
	 <div class="page-header">
		 <div class="row">
			 <div class="col-sm-12">
				 <h3 class="page-title">Welcome Admin! </h3>
				 <ul class="breadcrumb">
					 <li class="breadcrumb-item active">Dashboard </li>
				 </ul>
			 </div>
		 </div>
	 </div>
	 <!-- /Page Header -->

	 <div class="row">
		
		 <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
			 <div class="card dash-widget">
				 <div class="card-body">
					 <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
					 <div class="dash-widget-info">
						 <h3>44 </h3>
						 <span>Clients </span>
					 </div>
				 </div>
			 </div>
		 </div>


		 <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
			 <div class="card dash-widget">
				 <div class="card-body">
					 <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
					 <div class="dash-widget-info">
						 <h3>37 </h3>
						 <span>Tickets </span>
					 </div>
				 </div>
			 </div>
		 </div>
		  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
			 <div class="card dash-widget">
				 <div class="card-body">
					 <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
					 <div class="dash-widget-info">
						 <h3>112 </h3>
						 <span>Order </span>
					 </div>
				 </div>
			 </div>
		 </div>
		 
	 </div>
	
 
	
  
	
	 <div class="row">
		 <div class="col-md-12 d-flex">
			 <div class="card card-table flex-fill">
				 <div class="card-header">
					
					 <div class="row d-flex justify-content-between align-items-center">
					 	  <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12">
					 	  	 <h3 class="card-title mb-0">Expiring within 30 days  </h3>
					 	  	</div>
				 		  <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12">
					<div class="form-group form-focus">
					<div class="cal-icon">
					   <input class="form-control floating datetimepicker" type="text">
					</div>
					<label class="focus-label">From</label>
					</div>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-12">
					<div class="form-group form-focus">
					<div class="cal-icon">
					   <input class="form-control floating datetimepicker" type="text">
					</div>
					<label class="focus-label">To</label>
					</div>
					</div>
				 	</div>
				 </div>
				 <div class="card-body p-2">
				 	
				 	 
					 <div class="table-responsive">
						 <table class="table table-nowrap custom-table datatable mb-0">
							 <thead>
								 <tr>
								 	 <th>Client </th>
									 <th>Service	 </th>
									
									 <th>Expiry Date </th>
									 <th>Total </th>
									 <th>Status </th>
								 </tr>
							 </thead>
							 <tbody>
								 <tr>
								 	 <td>
										 <h2><a href="view-client-details.php">NBSM & Associates</a></h2>
									 </td>
									<td><span class="d-block">Website Development    </span>
                              <span class="text-blue">Bank &amp; Finance</span>
                           </td>
									
									 <td>11 Mar 2019 </td>
									 <td>$380 </td>
									 <td>
										 <span class="badge bg-inverse-info">Processing </span>
									 </td>
								 </tr>
								 <tr>

								 	<td>
										 <h2><a href="view-client-details.php">NBSM & Associates</a></h2>
										</td>


									 	<td><span class="d-block">Website Development    </span>
                              <span class="text-blue">Bank &amp; Finance</span>
                           </td>

									 <td>8 Feb 2019 </td>
									 <td>$500 </td>
									 <td>
										  <span class="badge bg-inverse-warning">Mailed </span>
									 </td>
								 </tr>
								 <tr>
								 	<td>
										 <h2><a href="view-client-details.php">NBSM & Associates</a></h2>
										</td>
										<td><span class="d-block">Website Development    </span>
                              <span class="text-blue">Bank &amp; Finance</span>
                           </td>

									 <td>23 Jan 2019 </td>
									 <td>$60 </td>
									 <td>
										 <span class="badge bg-inverse-danger">Unpaid </span>
									 </td>
								 </tr>
							 </tbody>
						 </table>
					 </div>
				 </div>
				<!--  <div class="card-footer">
					 <a href="invoices.html">View all invoices </a>
				 </div> -->
			 </div>
		 </div>
		 
	 </div>
	
	 <div class="row">
		 <div class="col-md-12 d-flex">
			 <div class="card card-table flex-fill">
				 <div class="card-header">
					 <h3 class="card-title mb-0">Recent Clients </h3>
				 </div>
				 <div class="card-body p-2">
					 <div class="table-responsive">
						  <table class="table table-striped custom-table datatable">
   <thead>
      <tr>
         <th>Company Name </th>
         
         <th>Service </th>
         <th>Email </th>
         <th>Contact no. </th>
         <th>Payment Through</th>
         <th>Status </th>
          
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>
            <h2 class="table-avatar">
                
               <a href="view-client-details.php"> Muan Nepal </a>
            </h2>
         </td>
         
         <td><span class="d-block">Website Development    </span>
                              <span class="text-blue">Bank &amp; Finance</span>
                           </td>
         <td>info@muannepal.org.np </td>
         <td>9851075355 </td>
        <td>Check Deposit	</td>
         <td>
            <div class="action-label">
               <a class="btn btn-white btn-sm btn-rounded  "  ><i class="fa fa-dot-circle-o text-success"></i> Active</a>
            </div>
         </td>

         
      </tr>
      <tr>
         <td>
            <h2 class="table-avatar">
               
               <a href="view-client-details.php"> </i> NBSM & Associates </a>
            </h2>
         </td>
          
        <td><span class="d-block">Domain  </span>
                              <a href="http://nbsm.com.np/" class="text-blue">nbsm.com.np</a> 
                           </td>
         <td>info@nbsm.com.np </td>
         <td>977-1-4433069 </td>
         <td>NA</td>
         <td>
            <div class="action-label">
               <a class="btn btn-white btn-sm btn-rounded  "  ><i class="fa fa-dot-circle-o text-danger"></i>  Inactive </a>
            </div>
         </td>

       
      </tr>
   </tbody>
</table>
					 </div>
				 </div>
				 <div class="card-footer">
					 <a href="clients-list.php">View all clients </a>
				 </div>
			 </div>
		 </div>
		 
	 </div>

 </div>
 <!-- /Page Content -->
@endsection