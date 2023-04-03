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
                           <th>Remarks</th>                           
                           <th>Amount</th>
                           <th>Date</th>
                           <th>Status</th>
                             @can('invoice_edit')
                           <th>Action</th>
                           @endcan
                        </tr>
                     </thead>
                     <tbody>
                       @foreach ($data->invoices as $row)
                        <tr>
                           <td>
                              <a href=""><a href="{{route('admin.invoice.view', $row->id)}}">#{{$row->invoice_no}}</a></a>
                           </td>
                           <td><span class="d-block">{{$row->remarks}}</span> </td>                         
                           <td><span class="text-bold d-block">NPR {{$row->total}}</span> </td>
                           <td><span class="d-block text-primary"> Sent on {{$row->date_of_entry}}</span>  
                           </td>                            
                           <td><span class="badge bg-inverse-success">{{$row->status}}</span></td>
                            @can('invoice_edit')
                           <td>
                              <a href="{{route('admin.invoice.view', $row->id)}}"  class="btn btn-default">View</a> 
                           </td>
                           @endcan
                        </tr>  
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