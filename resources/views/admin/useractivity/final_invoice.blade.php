<div id="Invoice" class="tab-pane fade">
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
                       @if($row->status == 1 || $row->status == 2)
                        <tr>
                           <td>
                              <a href=""><a href="{{route('admin.invoice.view', $row->id)}}">#{{$row->invoice_no}}</a></a>
                           </td>
                           <td>
                             @if($row->invoice_status == '2')
                             <span class="badge bg-inverse-warning"> Cancled </span>
                             @elseif($row->invoice_status == '1')
                             <span class="badge bg-inverse-success"> Paid </span>
                             @else
                             <span class="badge bg-inverse-danger"> Unpaid </span>
                             @endif
                           </td>
                           @if($row->final_invoice == '1')
                           <td>Final Invoice</td>
                           @else
                           <td>Estimate Invoice</td>
                           @endif
                           <td><span class="d-block">{{$row->remarks}}</span> </td>                         
                           <td><span class="text-bold d-block">NPR {{$row->total}}</span> </td>
                           <td><span class="d-block text-primary"> Sent on {{$row->date_of_entry}}</span></td>
                           @if($row->final_invoice != '1')
                           <td>
                              <a href="{{route('admin.invoice.view', $row->id)}}">View </a>
                           </td>
                           @else
                           <td>
                              <a href="{{route('admin.clients.generateFinalInvoice',$row->id)}}">View </a>
                           </td>
                           @endif
                            @can('invoice_edit')
                            @if($row->invoice_status != '2' && $row->invoice_status != '1' && $row->final_invoice != '1')
                           <td>
                              <a href="{{route('admin.invoice.edit', $row->invoice_no)}}"  class="btn btn-default" id="edit_button">Edit</a> 
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