<div id="Contacts" class="tab-pane fade">
   <div class="row">
      <div class="col-md-12 d-flex">
         <div class="card flex-fill">
            <div class="card-body p-0">
               <!-- blank -->
               <div class="p-5 text-center">                             
                  <button class="btn btn-lg btn-rounded btn-primary" data-toggle="modal" data-target="#addcontacts">Add Contacts</button>
               </div>
               <!-- blank -->
               @if($contacts->count()>0)
               <div class="table-responsive">
                  <table class="table mb-0 ">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Phone</th>
                           <th>Email</th> 
                           <th>Address</th>                                       
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($contacts as $row)
                        <tr>
                           <td><span class="d-block">{{$row->name}} </span> </td>
                           <td><span class="text-bold d-block">{{$row->phone}}</span></td>
                           <td><span class="d-block text-danger">{{$row->email}}</span></td>
                            <td><span class="d-block">{{$row->address}}</span></td>
                           <td><a href="{{route('admin.clients.contactsdelete', $row->id)}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-custom">Delete</a></td>
                        </tr>    
                        @endforeach                    
                     </tbody>
                  </table>
               </div>
               @else
               <div class="text-center">
              <h4><b>{{$data->name}}</b> has no contacts listed</h4>
              </div>               
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Add Contacts Modal -->
<div id="addcontacts" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Contacts  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
         </div>
         <div class="modal-body">
           <form method="POST" action="{{ route('admin.clients.contacts') }}" enctype="multipart/form-data">
            @csrf
               <div class="row">
                  <div class="col-md-8 offset-2">
                     <div class="row">
                        <!--  -->
                        <div class="col-md-12">
                           <div class="form-group">
                               <input type="hidden" name="id" value="{{$data->id}}">
                              <label class="col-form-label">Name <span class="text-danger">* </span></label>
                              <input type="text" class="form-control" placeholder="Enter Name" name="name">
                           </div>
                        </div>
                        <!--  -->
                        <!--  -->
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-form-label">Phone  <span class="text-danger">* </span></label>
                              <input type="text" class="form-control" placeholder="Mobile/Telephone" name="phone">
                           </div>
                        </div>
                        <!--  -->
                        <!--  -->
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-form-label">Email  <span class="text-danger">* </span></label>
                              <input type="text" class="form-control" placeholder="Email Address" name="email">
                           </div>
                        </div>
                        <!--  -->
                        <!--  -->
                       <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-form-label">Address </label>
                              <input type="text" class="form-control" placeholder="Location" name="address">
                           </div>
                        </div>
                        <!--  -->
                     </div>
                  </div>
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn">Update </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /Add Documents Modal -->