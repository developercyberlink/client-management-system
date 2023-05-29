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
			<button class="btn btn-white">CSV</button>
			<button class="btn btn-white">PDF</button>
			<button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
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
						<h3 class="text-uppercase">Invoice #{{$invoice->invoice_no}} <span class="badge bg-inverse-danger">Unpaid </span></h3>
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
							<td>{{$i}}</td>
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
					</div>
					<div class="col-sm-5">
						<div class="m-b-20">
							<div class="table-responsive no-border">
								<table class="table mb-0">
									<tbody>
										<tr>
											<th>Subtotal:</th>
											<td class="text-right">NPR {{$invoice->total}}</td>
										</tr>
										<tr>
											<th>Discount:</th>
											<td class="text-right">NRP {{$invoice->discount}}</td>
										</tr>
										<tr>
											<th>Tax: <span class="text-regular">(13%)</span></th>
											<td class="text-right">NRP {{$invoice->vat}}</td>
										</tr>
										<tr>
											<th>Total:</th>
											<td class="text-right text-danger"><h5>NPR {{$invoice->total - $invoice->discount - $invoice->vat}}</h5></td>
										</tr>
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