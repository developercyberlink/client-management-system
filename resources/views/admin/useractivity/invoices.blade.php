 <div id="Payment" class="tab-pane fade">
   <div class="row">
      <div class="col-md-12 d-flex">
         <div class="card   flex-fill">
            <div class="card-body p-2">
               <div class="table-responsive">
                  @if($data->invoices)
                  <table class="table mb-0 datatable">
                     <thead>
                        <tr>
                           <th>Invoice ID</th>
                           <th>Status</th>
                           <th>Invoice Type</th>
                           <th>Remarks</th>                           
                           <th>Amount</th>
                           <th>Date</th>
                             @can('invoice_edit')
                           <th>Action</th>
                           @endcan
                        </tr>
                     </thead>
                     <tbody>
                       @foreach ($data->invoices as $row)
                       @if($row->status == 0)
                        <tr>
                           <td>
                              <a href=""><a href="{{route('admin.invoice.view', $row->id)}}">#{{$row->invoice_no}}</a></a>
                           </td>
                           <td>
                              {{-- @foreach ($client_services as $item) --}}
                              @if(getServiceStatus($row->service_id) == '2')
                              <span class="badge bg-inverse-warning"> Cancled </span>
                              @elseif(getServiceStatus($row->service_id) == '1')
                              <span class="badge bg-inverse-success"> Paid </span>
                              @else
                              <span class="badge bg-inverse-danger"> Unpaid </span>
                              @endif
                              {{-- @endforeach --}}
                              {{-- {{getServiceStatus($row->service_id)}} --}}
                             
                           </td>
                           <td>Service Invoice</td>
                           <td><span class="d-block">{{$row->remarks}}</span> </td>                         
                           <td><span class="text-bold d-block">NPR {{$row->total}}</span> </td>
                           <td><span class="d-block text-primary"> Sent on {{$row->date_of_entry}}</span>  
                           </td>                            
                            @can('invoice_edit')
                           <td>
                              <a href="{{route('admin.invoice.view', $row->id)}}"  class="btn btn-default">View</a> 
                           </td>
                           @if(getServiceStatus($row->service_id)!= '2')
                           <td>
                              <a href="{{route('admin.invoice.cancleInvoice',$row->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to cancel the invoice?')">Cancel Invoice</a>
                           </td>
                           @endif
                           @endcan
                           
                        </tr>
                        @endif
                        @endforeach                                 
                     </tbody>
                  </table>
                  @else
                  <div class="text-center">
                    <h4><b>{{$data->name}}</b> has no invoices listed</h4>
                    </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</div>