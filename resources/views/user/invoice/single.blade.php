@extends('layouts.user')

@section('content')


<div class="card">
    <div class="card-body">

        <div class="page-content container">
            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Invoice
                    <small class="page-info">
                        <i class="fa fa-angle-double-right text-80"></i>
                        ID: {{$invoice->invoice_no}}
                    </small>
                </h1>
            </div>
        
            <div class="container px-0">
                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
        
                        <hr class="row brc-default-l1 mx-n1 mb-4" />
        
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <span class="text-sm text-grey-m2 align-middle">To:</span>
                                    <span class="text-600 text-110 text-blue align-middle">
                                        {{$invoice->user->name}}
                                    </span>
                                </div>
                            </div>
                            <!-- /.col -->
        
                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Invoice
                                    </div>
        
                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{date('Y-m-d', strtotime($invoice->created_at))}}</div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
        
                        <div class="mt-4">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="col-9 col-sm-5">Particular</div>
                                <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                                <div class="d-none d-sm-block col-sm-2">Rate</div>
                                <div class="col-2">Amount</div>
                            </div>
        
                            <div class="text-95 text-secondary-d3" id="row-area">
                                @foreach ($invoice->invoiceItems as $invoiceitem)
                                <div class="row mb-2 mb-sm-0 py-25" id="row">
                                    <div class="col-9 col-sm-5">{{$invoiceitem->particular}}</div>
                                    <div class="d-none d-sm-block col-2">{{$invoiceitem->amount}}</div>
                                    <div class="d-none d-sm-block col-2 text-95">{{$invoiceitem->rate}}</div>
                                    <div class="col-2 text-secondary-d2"><span id="total">{{$invoiceitem->amount * $invoiceitem->rate}}</span></div>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <hr>
        
                            <div class="row border-b-2 brc-default-l2"></div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    <p>{{$invoice->remarks}}</p>
                                </div>
        
                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1" id="subtotal">{{$invoice->total - $invoice->vat + $invoice->discount}}</span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Discount:
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2" id="discount-value">{{$invoice->discount}}</span>
                                        </div>
                                    </div>
        
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            VAT (13%)
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1" id="vat-calculation">{{$invoice->vat}}</span>
                                        </div>
                                    </div>
        
                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2" id="total-val">{{$invoice->total}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection