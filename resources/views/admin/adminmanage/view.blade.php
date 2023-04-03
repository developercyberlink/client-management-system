@extends('layouts.admin')
@section('content')				
<!-- Page Content -->
       <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
						<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('admin.adminmanage.index')}}"><i class="la la-angle-left"></i> Back </a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="card mb-2">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="profile-view">
							<div class="profile-img-wrap">
								<div class="profile-img">
								@if($admin->image)
		                        <img class="inline-block" src="{{url('uploads/admin-image/'.$admin->image)}}" alt="user">
		                        @else
		                        <img class="inline-block" src="{{asset('admin-assets/img/user.jpg')}}" alt="user">
		                        @endif
								</div>
							</div>
							<div class="profile-basic">
								<div class="row">
									<div class="col-md-5">
										<div class="profile-info-left">
											<h3 class="user-name m-t-0 mb-0">{{$admin->name}}</h3>
											<h6 class="text-muted">{{$admin->designation}}</h6>
											<small class="text-muted"> Department : {{$admin->department}}</small>
											<div class="staff-id">Employee ID : CL-00{{$admin->id}}</div>
											<div class="small doj text-muted">Date of Join : {{$admin->date_join}}</div>
											
										</div>
									</div>
									<div class="col-md-7">
										<ul class="personal-info">
											<li>
												<div class="title">Phone:</div>
												<div class="text"><a href="tel:{{$admin->mobile}}">{{$admin->mobile?$admin->mobile:'NULL'}}	</a></div>
											</li>
											<li>
												<div class="title">Email:</div>
												<div class="text"><a href="mailto:{{$admin->email}}">	{{$admin->email}}</a></div>
											</li>
											<li>
												<div class="title">Birthday:</div>
												<div class="text">{{$admin->dob?$admin->dob:'NULL'}}</div>
											</li>
											 
											<li>
												<div class="title">Gender:</div>
												<div class="text">{{$admin->gender?$admin->gender:'NULL'}}</div>
											</li>
											 
										</ul>
									</div>
								</div>
							</div>
							<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		 
		<div class="tab-content">
		
		<div class="row">
					 
			<div class="col-md-6 d-flex">
				<div class="card profile-box flex-fill">
					<div class="card-body">
						<h3 class="card-title">Bank information <a href="#" class="edit-icon" data-toggle="modal" data-target="#bank_info_modal"><i class="fa fa-pencil"></i></a></h3>


						<!-- blank -->
							<div class="p-4 text-center">
                      <span class="dash-widget-icon float-none mb-2"><i class="fa fa-bank"></i></span>
                      <p><b>Add</b> Bank Details</p>
                      <button class="btn  btn-rounded btn-primary" data-toggle="modal" data-target="#bank_info_modal">Add Bank Details </button>
                   </div>
                   <!-- blank -->
                       @if($bank != NULL)
							<ul class="personal-info">
							<li>
								<div class="title">Account Name</div>
								<div class="text">{{$bank->acc_name}}</div>
							</li>

							<li>
								<div class="title">Bank Name</div>
								<div class="text">{{$bank->bank}}</div>
							</li>

							<li>
								<div class="title">Branch</div>
								<div class="text">{{$bank->branch}}</div>
							</li>
							<li>
								<div class="title">Bank Account No.</div>
								<div class="text">{{$bank->acc_num}}</div>
							</li>
							 
							<li>
								<div class="title">PAN No.</div>
								<div class="text">{{$bank->pan_num}}</div>
							</li>
						</ul>
						@else
						<p>No Details Added</p>
						@endif
					</div>
				</div>
			</div>


			<div class="col-md-6 d-flex">
				<div class="card profile-box flex-fill">
					<div class="card-body">
						<h3 class="card-title">Documents   </h3>


						<!-- documents -->
							<div class="p-4 text-center">
                              <span class="dash-widget-icon float-none mb-2"><i class="fa fa-file"></i></span>	<p></p>	                              
                              <button class="btn  btn-rounded btn-primary" data-toggle="modal" data-target="#adddocuments">Add Documents </button>
                           </div>
                        <!-- documents -->
                    @if($documents->count()>0)
						<ul class="files-list">
             @foreach($documents as $row)
             <li>
                <div class="files-cont">
                   <div class="file-type">
                      <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                   </div>
                   <div class="files-info">
                      <span class="file-name text-ellipsis"><a href="{{url('uploads/admin-documents/'.$row->file)}}" target="_blank">{{$row->title}}</a></span>
                      <span class="file-date">{{ $row->created_at->format('d D M Y H:i') }}</span>                              
                   </div>
                   <ul class="files-action">
                      <li class="dropdown dropdown-action">
                         <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                         <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                            <a class="dropdown-item" href="{{url('uploads/admin-documents/'.$row->file)}}" target="_blank">View</a>
                            <a class="dropdown-item" href="{{route('admin.adminmanage-documents.destroy', $row->id)}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                         </div>
                      </li>
                   </ul>
                </div>
             </li>
             @endforeach
          </ul>
          @else
          <p>No Document Added</p>
          @endif
					</div>
				</div>
			</div>
		</div>			 
	
</div>
</div>
<!-- /Page Content -->

<!-- Profile Modal -->
<div id="profile_info" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Profile Information</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form method="POST" action="{{ route('admin.adminmanage.update') }}" enctype="multipart/form-data">
           @csrf
				<div class="profile-img-wrap edit-img">
						 @if($admin->image)
		                <img class="inline-block" src="{{url('uploads/admin-image/'.$admin->image)}}" alt="user">
		                @else
		                <img class="inline-block" src="{{asset('admin-assets/img/user.jpg')}}" alt="user">
		                @endif
						<div class="fileupload btn">
							<span class="btn-text">edit</span>
							<input class="upload" type="file" name="image">
						</div>
					</div>
				 <div class="row">                                    
             <div class="col-sm-6">
                 <div class="form-group">
                 	 <input type="hidden" name="id" value="{{$admin->id}}">
                     <label class="col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                     <input id="name" type="text" value="{{$admin->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                 </div>
                      @error('name')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
             @enderror
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label>Birth Date</label>
                     <div class="cal-icon">
                         <input class="form-control datetimepicker" type="text" value="{{$admin->dob}}" name="dob">
                     </div>
                 </div>
             </div>                                           
                <div class="col-sm-6">  
                 <div class="form-group">
                     <label class="col-form-label">Joining Date </label>
                     <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="date_join" value="{{$admin->date_join}}"></div>
                 </div>
             </div>

             
             <div class="col-md-6">
                 <div class="form-group">
                     <label>Gender</label>
                     <select class="select form-control" name="gender">
                         <option disabled>Select</option>
                         <option @if ($admin->gender == 'male') selected @endif   value="male">Male</option>
                          <option @if ($admin->gender == 'female') selected @endif  value="female">Female</option>
                     </select>
                 </div>
             </div>

             <div class="col-sm-6">
                 <div class="form-group">
                     <label class="col-form-label">{{ __('Contact Number') }} <span class="text-danger">*</span></label>
                     <input id="mobile" value="{{$admin->mobile}}" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                 @error('mobile')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                 </div>
             </div>
                 
             <div class="col-sm-6">
                 <div class="form-group">
                     <label class="col-form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                     <input id="email" value="{{$admin->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                     @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>
             </div>                                 
            
                 
             <div class="col-md-6">
                 <div class="form-group">
                     <label>Department</label>
                     <select class="select" name="department">
                          @if($admin->department != 0)
                         <option value="{{$admin->department}}" selected>{{$admin->department}}</option>
                         @else
                         <option value="0" disabled selected>Select Department</option>
                         @endif
                         <option value="Web Development">Web Development</option>
                         <option value="IT Management">IT Management</option>
                         <option value="Marketing">Sales & Marketing</option>
                          <option value="Web Designing">Web Designing</option>
                     </select>
                 </div>
             </div>

             <div class="col-md-6">
                 <div class="form-group">
                     <label>Designation </label>
                     <select class="select" name="designation">
                         @if($admin->designation != 0)
                         <option value="{{$admin->designation}}" selected>{{$admin->designation}}</option>
                         @else
                         <option value="0" disabled selected>Select Designation</option>
                         @endif
                         <option value="Laravel Developer">Laravel Developer</option>
                         <option value="Web Designer">Web Designer</option>
                         <option value="Web Developer">Web Developer</option>
                         <option value="Android Developer">Android Developer</option>
                         <option value="Sales Executive">Sales Executive</option>
                     </select>
                 </div>
             </div>
              <div class="col-md-6">
                 <div class="form-group">
                     <label>Status </label>
                     <select class="select" name="status">
                     <option value="1" {{$admin->status == 1?'selected':''}}>Active</option> 
                     <option value="0" {{$admin->status == 0?'selected':''}}>Inactive</option>                                                
                     </select>
                 </div>
             </div>
         </div>
				 
				<div class="submit-section">
					<button class="btn btn-primary submit-btn">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<!-- /Profile Modal -->

<!-- Bank Info Modal -->
<div id="bank_info_modal" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Bank Information</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form method="POST" action="{{ route('admin.adminmanage-details.update') }}" enctype="multipart/form-data">
           @csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Account Name</label>
							 <input type="hidden" name="id" value="{{$admin->id}}">
							<input type="text" name="acc_name" class="form-control" value="{{$bank != NULL? $bank->acc_name:''}}">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Bank Name <span class="text-danger">*</span></label>
							<input class="form-control" name="bank" type="text" value="{{$bank != NULL? $bank->bank:''}}">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Branch <span class="text-danger">*</span></label>
							<input class="form-control" name="branch" type="text" value="{{$bank != NULL? $bank->branch:''}}">
						</div>
					</div>
				 
					<div class="col-md-6">
						<div class="form-group">
							<label>Bank account No.</label>
							<input class="form-control" name="acc_num" type="text" value="{{$bank != NULL? $bank->acc_num:''}}">
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label>PAN No.</label>
							<input class="form-control" name="pan_num" type="text" value="{{$bank != NULL? $bank->pan_num:''}}">
						</div>
					</div>
					 
				</div>
				<div class="submit-section">
					<button class="btn btn-primary submit-btn">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<!-- /Bank Info Modal -->


	<!-- Add Documents Modal -->
<div id="adddocuments" class="modal custom-modal fade" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-md" role="document">
<div class="modal-content">
<div class="modal-header">
   <h5 class="modal-title">Add Documents  </h5>
   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
   <span aria-hidden="true">&times; </span>
   </button>
</div>
<div class="modal-body">
  <form method="POST" action="{{ route('admin.adminmanage-documents.store') }}" enctype="multipart/form-data">
     @csrf
      <div class="row">
         <div class="col-md-8 offset-2">
            <div class="row">
               <!--  -->
               <div class="col-md-12">
                  <div class="form-group">
                  	 <input type="hidden" name="id" value="{{$admin->id}}">
                     <label class="col-form-label">Document Title  <span class="text-danger">* </span></label>
                     <input type="text" class="form-control" name="title">
                  </div>
               </div>
               <!--  -->
               <!--  -->
               <div class="col-md-12">
                  <div class="form-group">
                     <label class="col-form-label">Document  <span class="text-danger">* </span></label>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" >
                        <label class="custom-file-label" for="validatedCustomFile" >Choose file...</label>
                     </div>
                  </div>
               </div>
               <!--  -->
            </div>
         </div>
      </div>
      <div class="submit-section">
         <button class="btn btn-primary submit-btn">Upload </button>
      </div>
   </form>
</div>
</div>
</div>
</div>
<!-- /Add Documents Modal -->

@endsection
			 