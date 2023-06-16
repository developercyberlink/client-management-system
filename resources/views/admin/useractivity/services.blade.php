<div id="Services" class="tab-pane fade show active">   
<div class="row">
   <div class="col-md-12 d-flex">
      <div class="card   flex-fill">
         <div class="card-body p-0">
            <!-- blank -->
            <div class="p-5 text-center">              
               <button class="btn btn-lg btn-rounded btn-primary" data-toggle="modal" data-target="#addservices">Add Services</button>
            </div>
            <!-- blank -->
            @if($client_services->count()>0)  
            <div class="table-responsive">
               <table class="table mb-0 ">
                  <thead>
                     <tr>
                        <th>Service/Solution</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Registered</th>
                        <th>Expiring</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($client_services as $row)
                     <tr>
                        <td><span class="d-block">{{service($row->service)}}  </span>
                           <a class="text-blue">{{$row->domain}}</a> 
                        </td>
                         <td><span class="d-block">{{servicetype($row->service_type)}}  </span>
                           <a class="text-blue">{{programming_type($row->programming_type)}}</a> 
                        </td>
                        <td><span class="text-bold d-block">Rs. {{$row->price * $row->time}}</span></td>
                        <td><span class="d-block text-success">{{$row->registered}}</span></td>
                        <td><span class="d-block text-danger">{{$row->expiring}}</span></td>
                        <td> 
                        <div class="action-label">
                          <a class="btn btn-white btn-sm btn-rounded" type="button" id="myButton" onclick = ""><i class="fa fa-dot-circle-o text-{{($row->status == 1)?'success':'danger'}}"></i> {{($row->status == 1)?'Paid':'Due'}}</a>
                        </div>
                       </td>
                        <td class="text-right">
                        <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert </i></a>
                           <div class="dropdown-menu dropdown-menu-right">  
                        @if(App\Models\Invoice::where('service_id',$row->id)->first() == NULL)
                         <a class="dropdown-item" href="{{route('admin.clients.generate-invoice', $row->id)}}" ><i class="fa fa-bill m-r-5"></i> Invoice</a>                             
                        @endif
                         <a class="dropdown-item" href="{{route('admin.clients.serviceedit', $row->id)}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a>                             
                             <a class="dropdown-item" href="{{route('admin.clients.servicedelete', $row->id)}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                           </div>
                        </div>
                     </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            @else
            <div class="text-center">
              <h4><b>{{$data->name}}</b> has no services listed</h4>
              </div>  
            @endif
         </div>
      </div>
   </div>
</div>
</div>
<!-- Add Services Modal -->
<div id="addservices" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Services  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{ route('admin.clients.services') }}" enctype="multipart/form-data">
            @csrf
               <div class="row">
                  <div class="col-md-6 offset-2">
                     <div class="form-group">
                        <label class="col-form-label">Services  <span class="text-danger">* </span></label>
                        <select class="form-control select serviceselect" name="service">
                           <option value="">Select Service </option>
                           @if($service->count()>0)
                           @foreach($service as $row)
                           <option value="{{$row->id}}" id = "option_{{$row->id}}">{{$row->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12"></div>
                  <!-- WebsiteDesignDevelopment -->
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="hidden" name="id" value="{{$data->id}}">
                               <label class="col-form-label">Domain<span class="text-danger">* </span></label>
                              <input type="text" name="domain" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-form-label">Price<span class="text-danger">* </span></label>
                              <input type="text" name="price" class="form-control">
                           </div>
                        </div>
                  
                     <div class="col-md-6">
                        <div class="form-group" id="option_{{$show->id}}">
                           <label class="col-form-label">Services Type  <span class="text-danger">* </span></label>
                           <select class="form-control select" name="service_type">
                              <option value="0">Select Service Type</option>
                              @if($servicetype->count()>0)
                              @foreach($servicetype as $row)
                              <option value="{{$row->id}}">{{$row->title}}</option>
                              @endforeach
                              @endif
                           </select>
                        </div>
                     </div>
                  
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="col-form-label">Programming Type <span class="text-danger">* </span></label>
                           <select class="form-control select" name="programming_type">
                              <option value="0">Select Programming </option>
                              @if($programming->count()>0)
                              @foreach($programming as $row)
                              <option value="{{$row->id}}">{{$row->title}}</option>
                              @endforeach
                              @endif
                           </select>
                        </div>
                     </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Registered on <span class="text-danger">*</span></label>
                              <div class="cal-icon">
                                 <input class="form-control datetimepicker" type="text" placeholder="Date" name="registered">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Expiring on <span class="text-danger">*</span></label>
                              <div class="cal-icon">
                                 <input class="form-control datetimepicker" type="text" placeholder="Date" name="expiring">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <h5 class="clearfix">Payment Status</h5>
                              <select class="select" name="status">
                              <option value="1">Paid</option> 
                              <option value="0">Due</option>                                                
                              </select>
                           </div>
                        </div>
                           <div class="col-md-6">  
                           <div class="form-group">
                              <h5 class="clearfix">Time/Unit <span class="text-danger">*</span></h5>
                            <input type="number" min="1" name="time" placeholder="time in  years" class="form-control">

                           </div>
                        </div>
                       
                     </div>
                  </div>
                  <!-- WebsiteDesignDevelopment -->
                  
                  <div class="col-md-12"></div>
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn">Add </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /Add Services Modal -->