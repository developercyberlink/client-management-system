@extends('layouts.admin')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">
<div class="row align-items-center">
	<div class="col">
		 
		 <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.clients.details',$invoice->user_id)}}"><i class="la la-angle-left"></i> Back </a></li>
         </ul>
	</div>
	<div class="col-auto float-right ml-auto">
		<div class="btn-group btn-group-sm">
			<a href="{{route('admin.invoice.email',$invoice->invoice_no)}}" class="btn btn-white">Email</a>
                <a href="{{route('admin.invoice.pdf',$invoice->invoice_no)}}" class="btn btn-white">PDF</a>
                <a href="" class="btn btn-white"><i class="fa fa-print fa-lg"></i>Print</a>             
		</div>
	</div>
</div>
</div>
<!-- /Page Header -->

<div class="row">
<div class="col-md-12">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6 m-b-20">
					<img src="{{asset('admin-assets/img/logo.png')}}" class="inv-logo" alt="">           
               <ul class="list-unstyled">
                    <li>Cyberlink Pvt. Ltd.</li>
                   <li>Dhobighat-4, Lalitpur</li>
                       
					</ul>
				</div>
				<div class="col-sm-6 m-b-20">
					<div class="invoice-details">
						<h3 class="text-uppercase">Invoice #{{$invoice->invoice_no}} 
							@if($invoice->status == 1)
								@if($invoice->invoice_status == '2')
								<span class="badge bg-inverse-warning">Cancle</span>
								@elseif($invoice->invoice_status == '1')
								<span class="badge bg-inverse-success">Paid</span>
								@else
								<span class="badge bg-inverse-danger">Unpaid</span>
								@endif
							@else
								@if($service->status == '2')
								<span class="badge bg-inverse-warning">Cancle</span>
								@elseif($service->status == '1')
								<span class="badge bg-inverse-success">Paid</span>
								@else
								<span class="badge bg-inverse-danger">Unpaid</span>
								@endif
							@endif
						</h3>
						
						<ul class="list-unstyled">
							<li>Date: <span>{{$invoice->created_at}}</span></li>
                    		<li>Due date: <span>{{$invoice->date_of_entry}}</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
					<h5>Invoice to:</h5>
						<ul class="list-unstyled">
						 <li><h5><strong>{{$user->name}}</strong></h5></li>
                   <li><span>{{$user->email}}</span></li>   
					</ul>
				</div>
				<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20"> 
					<span class="text-muted">Payment Details:</span>   
					<ul class="list-unstyled invoice-payment-details text-danger">
						 <li><h5>Amount: <span class="text-right">NPR {{$invoice->total}}</span></h5></li>
						 
					</ul>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Particular</th>
							<th>Qty</th>
							<th>Rate</th>						
							<th>Time</th>
							 <th>Amount</th>
						</tr>
					</thead>
					<tbody>
						@if($invoice->invoiceItems)
						 @for($i=0; $i<count($invoice->invoiceItems); $i++)
						<tr>
							<td>{{$i+1}}</td>
							<td>{{$invoice->invoiceItems[$i]->particular}}</td>
							<td>{{$invoice->invoiceItems[$i]->amount}}</td>
							<td>{{$invoice->invoiceItems[$i]->rate}}</td>
							<td>{{$invoice->invoiceItems[$i]->time}}</td>
							<td>{{$invoice->invoiceItems[$i]->rate * $invoice->invoiceItems[$i]->amount * $invoice->invoiceItems[$i]->time}}</td>
						</tr>
						@endfor
						@endif
					</tbody>
				</table>
			</div>
			<div>
				<div class="row invoice-payment">
					<div class="col-sm-7">
						<div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
							<label for="remarks">Remarks</label>
							<textarea name="remarks" rows="5" id="remarks" class="form-control" placeholder="Enter remarks here">
								{{$invoice->remarks}}
							</textarea>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="m-b-20">
							<div class="table-responsive no-border">
								<table class="table mb-0">
									<tbody>
											<tr>
											<th>Discount:</th>
											<td class="text-right">Rs. {{$invoice->discount}}</td>
										</tr>
										<tr>
											<th>Payable Amount:</th>
											<td class="text-right">Rs. {{$invoice->total - $invoice->vat}}</td>
										</tr>
										<tr>
											<th>Advance Amount:</th>
											<td class="text-right">Rs. {{$user->advance}}</td>
										</tr>
										<tr>
											<th>Tax: <span class="text-regular">(13%)</span></th>
											<td class="text-right">Rs. {{$invoice->vat}}</td>
										</tr>
										<tr>
											<th>Total:</th>
											<td class="text-right text-danger"><h5>Rs. {{$invoice->total}}</h5></td>
										</tr>

										@if($invoice->invoice_status != '2' && $invoice->invoice_status != '1' && $invoice->final_invoice != '1' && $invoice->status != null)
											<td>
												<a href="{{route('admin.invoice.cancleInvoice',$invoice->id)}}" class="btn btn-warning" id="cancel_button" onclick="return confirm('Are you sure you want to cancel the invoice?')">Cancel Invoice</a>
											</td>
										@endif
										
										@if($invoice->invoice_status != '2' && $invoice->invoice_status != '1' && $invoice->final_invocie != '1' && $invoice->status !=  null)
											<td>
												<a href="{{route('admin.clients.generateFinalInvoice',$invoice->id)}}" id="final_button" class="btn btn-secondary" onclick="finalButton();">Final Invoice</a>
											</td>
										@endif
										
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<!-- /Page Content -->
@endsection