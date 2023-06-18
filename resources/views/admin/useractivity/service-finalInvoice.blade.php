@extends('layouts.admin')
@section('content')
<!-- Page Content -->
<div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">  
    <div class="row align-items-center">
        <div class="col">
             
             <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="javascript:history.back(1)"><i class="la la-angle-left"></i> Back </a></li>
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
<form action="{{route('admin.invoice.update')}}" method="POST">
 @csrf
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 m-b-20">
                        @if($invoice)
                        <input type="hidden" name="id" value="{{$invoice ? $invoice->id : ''}}">
                        <input type="hidden" value="{{$invoice->date_of_entry}}" id="date_of_entry" class="form-control" name="date_of_entry">
                        <input type="hidden" value="{{$invoice->invoice_no}}" id="invoice_no" name="invoice_no">
                        <input type="hidden" value="{{$invoice->user->id}}" id="user" name="user">
                        @endif
                        <img src="{{asset('admin-assets/img/logo.png')}}" class="inv-logo" alt="">                       
                        <ul class="list-unstyled">
                             <li>Cyberlink Pvt. Ltd.</li>
                            <li>Arun Thapa Chowk, Jhamsikhel</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 m-b-20">
                        <div class="invoice-details">
                            <h3 class="text-uppercase">Invoice FIN-{{$invoice->invoice_no}}
                                 {{-- {{  $service->status == 1 ? 'bg-inverse-success' : 'bg-inverse-danger' }}">
                                    {{ $service->status == 1 ? "PAID":"UNPAID"  }} 
                                </span> --}}
                            </h3>
                            <ul class="list-unstyled">
                                <li>Start Date: <span>{{$cilent_service->registered}}</span></li>
                                <li>Expiry date: <span>{{$cilent_service->expiring}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-7 col-xl-9 m-b-20">
                        <h5>Invoice to:</h5>
                        <ul class="list-unstyled">
                            <li><h5><strong>{{$user->name}}</strong></h5></li>
                            <li><span>{{$user->email}}</span></li>                           
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-5 col-xl-3 m-b-20 ">
                        <span class="text-muted">Payment Details:</span>
                        <ul class="list-unstyled invoice-payment-details text-danger">
                            <li><h5>Amount: <span class="text-right">Rs. {{$invoice->total}}</span></h5></li>
                        </ul>
                    </div>
                 </div>
                    <div class="mt-4">
                            <div class="row">
                                <div class="col-md-4">Particular</div>  
                                <div class="col-md-1">Qty</div>
                                <div class="col-md-2">Rate</div>
                                <div class="col-md-2">Time</div>
                                <div class="col-md-2">Amount</div>
                                <div class="col-md-1"></div> 
                            </div>
        
                            <div class="text-95 text-secondary-d3" id="row-area">  
                                {{-- @for($i=0; $i<count($invoice->invoiceItems); $i++) --}}
                                 @foreach ($invoice_item as $item)
                                 <div class="row mb-2 mb-sm-0 py-25" id="rowl{{'1'}}">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="particular[]" value="{{$item->particular}}" readonly id="particularl" placeholder="Particular">
                                        
                                    </div>
                                    <div class="col-md-1"> 
                                        <input type="number" class="form-control" name="amount[]" onchange="updateValue()" value="{{$item->amount}}" id="amount" placeholder="Quantity" readonly required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" onchange="updateValue()" value="{{$item->rate}}" name="rate[]" id="rate" placeholder="Rate" readonly required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" onchange="updateValue()" value="{{$item->time}}" name="time[]" id="time" placeholder="Time" readonly required>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="totall{{'1'}}">{{$item->rate * $item->time}}</span>
                                    </div>
                                  
                                </div>
                                 @endforeach
                            </div>

        
                            <div class="row border-b-2 brc-default-l2"></div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" rows="5" id="remarks" class="form-control" placeholder="Enter remarks here">
                                        {{$invoice->remarks}}
                                    </textarea>
                                </div>
        
                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last"> 
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1" id="subtotal">
                                                {{$invoice->total + $invoice->discount - $invoice->vat}}
                                                {{-- {{$service->price * $service->time}} --}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Discount:
                                           </div>
                                        <div class="col-5">
                                            <input type="number" min="0" onkeyup="discountChange()" value="{{$invoice? $invoice->discount : $invoice->discount}}" id="discount-percent" name="discount">
                                        </div>
                                    </div>
        
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            VAT (13%) <input type="checkbox" @if($invoice->vat != null) checked @endif onclick="vatClick()" id="vatcheck" name="vatcheck">
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1" id="vat-calculation"> @if($invoice->vat != null) {{$invoice->vat}} @endif</span>
                                            <input type="hidden" name="vat" id="vat" value="@if($invoice->vat != null) {{$invoice->vat}} @else 0 @endif">
                                        </div>
                                    </div>
        
                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2" id="total-val">{{$invoice->total}}</span>
                                            <input type="hidden" name="total" id="total" value="{{$invoice->total}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <hr />
        
                            {{-- <div>
                                <input type="submit" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" value="Update Invoice">
                            </div> --}}
                        </div>
                    <div>                
                    
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</div>
<!-- /Page Content -->
@endsection

@section('script')

<script type="text/javascript">


    $( document ).ready(function() {
        calculateDatabaseValue();
    });
    let counter=0;
    let subtotal=0;
    let totalAmount=0;
    let discount=0;
    let vat=0;
    let total=0;

    function calculateDatabaseValue(){
        subtotal = {{$invoice->total}} + {{$invoice->discount}} - {{$invoice->vat}};
        discount = {{$invoice->discount}};
        vat = {{$invoice->vat}};
        total = {{$invoice->total}};
    }

 

    function updateValue(){
        let amount = $("#amount").val();
        let rate = $("#rate").val();
        let time = $("#time").val();

        let prevtotal = parseFloat($("#total").text());
        let currentTotal = amount*rate*time;

        subtotal -= prevtotal;
        subtotal += currentTotal;

        $("#total"+id).html(currentTotal);
        $("#subtotal").html(subtotal);

        calculateDiscount();
        calculateVat();
        calculateTotal();
    }

    function calculateVat(){
        if($('#vatcheck').is(":checked")){
            vat = ((subtotal-discount)*0.13).toFixed(2);
        }else{
            vat = 0;
        }
        $("#vat-calculation").html(vat);
        $("#vat").val(vat);
    }

    function calculateDiscount(){
        discount = $('#discount-percent').val();
    }

    function calculateTotal(){
        total = parseFloat(subtotal) - parseFloat(discount) + parseFloat(vat);
        $('#total-val').html(total);
        $("#total").val(total);
    }

    function vatClick(){
        calculateVat();
        calculateTotal();
    }

    function discountChange(){
        calculateDiscount();
        calculateTotal();
    }

</script> 

@endsection