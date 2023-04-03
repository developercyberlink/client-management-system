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
                <button class="btn btn-white">CSV</button>
                <button class="btn btn-white">PDF</button>
                <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
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
                        <input type="hidden" name="id" value="{{$invoice->id}}">
                        <input type="hidden" value="{{$invoice->date_of_entry}}" id="date_of_entry" class="form-control" name="date_of_entry">
                        <input type="hidden" value="{{$invoice->invoice_no}}" id="invoice_no" name="invoice_no">
                        <input type="hidden" value="{{$invoice->user->id}}" id="user" name="user">
                        <img src="{{asset('admin-assets/img/logo.png')}}" class="inv-logo" alt="">                       
                        <ul class="list-unstyled">
                             <li>Cyberlink Pvt. Ltd.</li>
                            <li>Arun Thapa Chowk, Jhamsikhel</li>
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
                            <li><h5>Amount: <span class="text-right">NPR {{$invoice->total}}</span></h5></li>
                             
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
                                @for($i=0; $i<count($invoice->invoiceItems); $i++)
                                <div class="row mb-2 mb-sm-0 py-25" id="rowl{{$i}}">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="particular[]" value="{{$invoice->invoiceItems[$i]->particular}}" id="particularl{{$i}}" placeholder="Particular">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="number" class="form-control" name="amount[]" onchange="updateValue('l{{$i}}')" value="{{$invoice->invoiceItems[$i]->amount}}" id="amountl{{$i}}" placeholder="Quantity" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" onchange="updateValue('l{{$i}}')" value="{{$invoice->invoiceItems[$i]->rate}}" name="rate[]" id="ratel{{$i}}" placeholder="Rate" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" onchange="updateValue('l{{$i}}')" value="{{$invoice->invoiceItems[$i]->time}}" name="time[]" id="timel{{$i}}" placeholder="Time" required>
                                    </div>
                                    <div class="col-md-2">
                                        <span id="totall{{$i}}">{{$invoice->invoiceItems[$i]->rate * $invoice->invoiceItems[$i]->amount * $invoice->invoiceItems[$i]->time}}</span>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="#" class="btn btn-danger" onclick="deleteRow('l{{$i}}')">X</a>
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <div class="text-right">
                                <button id="add" type="button" onclick="addRow()" class="btn btn-success">+ Add more</button>
                            </div>
        
                            <div class="row border-b-2 brc-default-l2"></div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" rows="5" id="remarks" class="form-control">
                                        {{$invoice->remarks}}
                                    </textarea>
                                </div>
        
                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1" id="subtotal">{{$invoice->total + $invoice->discount - $invoice->vat}}</span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Discount:
                                        </div>
                                        <div class="col-5">
                                            <input type="number" min="0" onchange="discountChange()" value="{{$invoice->discount}}" id="discount-percent" value="0" name="discount">
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
        
                            <div>
                                <input type="submit" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" value="Update Invoice">
                            </div>
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

<script>

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

    function addRow(){

        counter++;

        let htmlObj = `
        <div class="row mb-2 mb-sm-0 py-25" id="row`+counter+`">
            <div class="col-9 col-sm-5"><input type="text" class="form-control" name="particular[]" id="particular`+counter+`" placeholder="Particular"></div>
            <div class="d-none d-sm-block col-2"><input type="number" class="form-control" name="amount[]" onchange=updateValue('`+counter+`') id="amount`+counter+`" placeholder="Quantity" required></div>
            <div class="d-none d-sm-block col-2 text-95"><input type="number" class="form-control" onchange=updateValue('`+counter+`') name="rate[]" id="rate`+counter+`" placeholder="Rate" required></div>
            <div class="d-none d-sm-block col-2 text-95"><input type="number" class="form-control" min=0 onchange=updateValue('`+counter+`') name="time[]" id="time`+counter+`" placeholder="Time"></div>
            <div class="col-2 text-secondary-d2"><span id="total`+counter+`">0</span></div>
            <div class="col-md-2">
                <a href="#" class="btn btn-danger" onclick=deleteRow('`+counter+`')>X</a>
            </div>
        </div>
        `;

        $("#row-area").append(htmlObj); 
    }

    function deleteRow(id){
        let amount = $("#amount"+id).val();
        let rate = $("#rate"+id).val();
        let time = $("#time"+id).val();

        subtotal -= (amount*rate*time);

        $("#subtotal").html(subtotal);
        $("#row"+id).remove();

        calculateDiscount();
        calculateVat();
        calculateTotal();
    }

    function updateValue(id){
        let amount = $("#amount"+id).val();
        let rate = $("#rate"+id).val();
        let time = $("#time"+id).val();

        let prevtotal = parseFloat($("#total"+id).text());
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