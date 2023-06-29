<div id="recepit" class="tab-pane fade">
   <div class="row">
      <div class="col-md-12 d-flex">
         <div class="card flex-fill">
            <div class="card-body p-0">
               <!-- blank -->
               <div class="p-5 text-center">                             
                  <button class="btn btn-lg btn-rounded btn-primary" data-toggle="modal" data-target="#addpayment">Add Payment</button>
               </div>
               <!-- blank -->
               {{-- @if($payment->count()>0)  
               <div class="table-responsive">
                  <table class="table mb-0 ">
                     <thead>
                        <tr>
                           <th>S.No</th>
                           <th>Amount Received</th>
                           <th>Invoice ID</th>
                          
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($payment as $row)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$row->amount}}</td>
                          <td>{{getInvoiceDetail($row->invoice_id)->invoice_no}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               @else
               <div class="text-center">
                 <h4><b>{{$data->name}}</b> has no payment recepit listed</h4>
                 </div>  
               @endif --}}
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Add Contacts Modal -->
<div id="addpayment" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Payment  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{ route('admin.payment.create') }}" enctype="multipart/form-data">
            @csrf
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="hidden" name="user_id" value="{{$data->id}}">
                              @if($invoices != null)
                              <input type="hidden" name="invoice_id" value="{{$invoices->id}}">
                              @endif
                               <label class="col-form-label">Amount Received<span class="text-danger">* </span></label>
                              <input type="text" name="amount" class="form-control">
                           </div>
                           <div class="form-group">
                              <label class="col-form-label">Advance Amount<span class="text-danger">* </span></label>
                             <input type="text" name="advance" class="form-control" value="{{$data->advance}}">
                          </div>
                        </div>
                     </div>
                  </div>
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
<!-- /Add Documents Modal -->