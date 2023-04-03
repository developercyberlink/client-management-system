<div id="Tickets" class="tab-pane fade">
   <!-- Page Header -->
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>
         </div>
      </div>
   </div>
   <!-- /Page Header -->
   <!-- Search Filter -->
   <div class="row filter-row">
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
         <div class="form-group form-focus select-focus">
            <select class="select floating">
               <option> -- Select -- </option>
               <option> Pending </option>
               <option> Approved </option>
               <option> Returned </option>
            </select>
            <label class="focus-label">Status</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 col-12">
         <div class="form-group form-focus select-focus">
            <select class="select floating">
               <option> -- Select -- </option>
               <option> High </option>
               <option> Low </option>
               <option> Medium </option>
            </select>
            <label class="focus-label">Priority</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
         <div class="form-group form-focus">
            <div class="cal-icon">
               <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">From</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
         <div class="form-group form-focus">
            <div class="cal-icon">
               <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">To</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
         <a href="#" class="btn btn-success btn-block"> Search </a>  
      </div>
   </div>
   <!-- /Search Filter -->
   <div class="row">
      <div class="col-md-12">
         <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Ticket Id</th>
                     <th>Ticket Subject</th>
                     <th>Assigned Staff</th>
                     <th>Created Date</th>
                     <th>Last Reply</th>
                     <th>Priority</th>
                     <th class="text-center">Status</th>
                     <th class="text-right">Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($data->tasks as $row)
                  <tr>
                     <td>{{$loop->iteration}}</td>
                     <td><a href="ticket-view.php">#TKT-{{$row->id}}}</a></td>
                     <td>{{$row->title}}</td>
                     <td>
                        <h2 class="table-avatar">
                           <a class="avatar avatar-xs" href="employee-profile.php"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                           <a href="employee-profile.php">Subir Joshi </a>
                        </h2>
                     </td>
                     <td>{{$row->created_at}}</td>
                     <td>{{$row->updated_at}}</td>
                     <td>
                        <div class="dropdown action-label">
                           <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> High </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> High</a>
                              <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Medium</a>
                              <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low</a>
                           </div>
                        </div>
                     </td>
                     <td class="text-center">
                        <div class="dropdown action-label">
                             @if($row->completion_time==null)
                              <a class="btn btn-white btn-sm btn-rounded" href="#" >
                           <i class="fa fa-dot-circle-o text-danger"></i> Not Completed 
                           </a>
                              @else
                               <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                           <i class="fa fa-dot-circle-o text-success"></i> Completed
                           </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item"><i class="fa fa-dot-circle-o text-info"></i> {{$row->completion_time}} </a>                                         
                           </div>
                              @endif                                     
                           
                        </div>
                     </td>
                      @can('user_task_access')
                     <td class="text-right">
                        <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_ticket"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_ticket"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                           </div>
                        </div>
                     </td>
                     @endcan
                  </tr>
                     @endforeach
                 
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- Add Ticket Modal -->
<div id="add_ticket" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Ticket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Ticket Subject</label>
                        <input class="form-control" type="text">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Ticket Id</label>
                        <input class="form-control" type="text" disabled="">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Client</label>
                        <select class="select">
                           <option>-</option>
                           <option>Muan Nepal</option>
                           <option>NBSM</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Priority</label>
                        <select class="select">
                           <option>High</option>
                           <option>Medium</option>
                           <option>Low</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Department </label>
                        <select class="select">
                           <option>-</option>
                           <option selected="selected">General Enquiries</option>
                           <option>Affiliate Enqueries</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Related Service</label>
                        <select class="select">
                           <option>-</option>
                           <option>None</option>
                           <option>Website Development - Business  </option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Assign Staff</label>
                        <select class="select">
                           <option>-</option>
                           <option>Subir Joshi </option>
                           <option>Rajkumar Shresta</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Ticket Assignee</label>
                        <div class="project-members">
                           <a title="Subir Joshi " data-placement="top" data-toggle="tooltip" href="#" class="avatar">
                           <img src="assets/img/profiles/avatar-02.jpg" alt="">
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"></textarea>
                     </div>
                     <div class="form-group">
                        <label>Upload Files</label>
                        <input class="form-control" type="file" multiple="">
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
<!-- /Add Ticket Modal -->
<!-- Edit Ticket Modal -->
<div id="edit_ticket" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Ticket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Ticket Subject</label>
                        <input class="form-control" type="text" value="Post type issue">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Ticket Id</label>
                        <input class="form-control" value="#TKT-0001" type="text" disabled="">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Client</label>
                        <select class="select">
                           <option>-</option>
                           <option>Muan Nepal</option>
                           <option selected="">NBSM</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Priority</label>
                        <select class="select">
                           <option>High</option>
                           <option>Medium</option>
                           <option>Low</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Department </label>
                        <select class="select">
                           <option>-</option>
                           <option selected="selected">General Enquiries</option>
                           <option>Affiliate Enqueries</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Related Service</label>
                        <select class="select">
                           <option>-</option>
                           <option>None</option>
                           <option selected="">Website Development - Business  </option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Assign Staff</label>
                        <select class="select">
                           <option>-</option>
                           <option selected="">Subir Joshi </option>
                           <option>Rajkumar Shresta</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Ticket Assignee</label>
                        <div class="project-members">
                           <a title="Subir Joshi " data-placement="top" data-toggle="tooltip" href="#" class="avatar">
                           <img src="assets/img/profiles/avatar-02.jpg" alt="">
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</textarea>
                     </div>
                     <div class="form-group">
                        <label>Upload Files</label>
                        <input class="form-control" type="file" multiple="">
                     </div>
                  </div>
               </div>
               <div class="card mt-2 mb-3">
                  <div class="card-body">
                     <h5 class="card-title m-b-20">Uploaded image files</h5>
                     <div class="row">
                        <div class="col-md-3 col-sm-6">
                           <div class="uploaded-box">
                              <div class="uploaded-img">
                                 <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="uploaded-img-name">
                                 demo.png
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                           <div class="uploaded-box">
                              <div class="uploaded-img">
                                 <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="uploaded-img-name">
                                 demo.png
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                           <div class="uploaded-box">
                              <div class="uploaded-img">
                                 <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="uploaded-img-name">
                                 demo.png
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                           <div class="uploaded-box">
                              <div class="uploaded-img">
                                 <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="uploaded-img-name">
                                 demo.png
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card mb-0">
                  <div class="card-body">
                     <h5 class="card-title m-b-20">Uploaded files</h5>
                     <ul class="files-list">
                        <li>
                           <div class="files-cont">
                              <div class="file-type">
                                 <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                              </div>
                              <div class="files-info">
                                 <span class="file-name text-ellipsis"><a href="#">Ticket_document.xls</a></span>
                                 <span class="file-date">May 5th at 8:21 PM</span>
                                 <div class="file-size">Size: 14.8Mb</div>
                              </div>
                              <ul class="files-action">
                                 <li class="dropdown dropdown-action">
                                    <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       <a class="dropdown-item" href="quotation.pdf" download="">Download</a>
                                       
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </li>
                        <li>
                           <div class="files-cont">
                              <div class="file-type">
                                 <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                              </div>
                              <div class="files-info">
                                 <span class="file-name text-ellipsis"><a href="#">Issue_report.xls</a></span>
                                 <span class="file-date">May 5th at 5:41 PM</span>
                                 <div class="file-size">Size: 14.8Mb</div>
                              </div>
                              <ul class="files-action">
                                 <li class="dropdown dropdown-action">
                                    <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       <a class="dropdown-item" href="quotation.pdf" download="">Download</a>
                                       
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </li>
                     </ul>
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
<!-- /Edit Ticket Modal -->
<!-- Delete Ticket Modal -->
<div class="modal custom-modal fade" id="delete_ticket" role="dialog">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <div class="form-header">
               <h3>Delete Ticket</h3>
               <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-btn delete-action">
               <div class="row">
                  <div class="col-6">
                     <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                  </div>
                  <div class="col-6">
                     <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /Delete Ticket Modal -->