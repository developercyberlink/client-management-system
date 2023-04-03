@extends('layouts.admin')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">

      <h5 class="card-title">Create new Purchase Bill</h5>

      <form action="{{route('admin.purchasebill.create')}}" method="POST">
        @csrf

        <div class="page-content container">
            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Bill No:
                    <small class="page-info">
                        <i class="fa fa-angle-double-right text-80"></i>
                        ID: <input type="text" id="bill_no" name="bill_no">
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
                                        <select name="vendor" id="vendor-select" class="form-control" id="vendor">
                                            @foreach ($vendors as $vendor)
                                                <option value="{{$vendor->id}}">{{$vendor->name}} || {{$vendor->pan}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                    <a onclick="showVendorForm()" id="show-vendor-button" class="btn btn-primary" style="margin-top: 10px;">Vendor Doesn't Exist</a>
                                </div>
                                <div id="vendor-form" style="visibility:hidden" class="col-md-6" style="margin-top:50px; border-style: outset; padding:10px;">
                                    <input type="text" id="vendor-name" class="form-control" placeholder="Vendor Name">
                                    <input type="number" id="vendor-pan" class="form-control" placeholder="Vendor PAN">
                                    <a onclick="addNewVendor()" class="btn btn-success" style="margin-top:10px;">Add New Vendor</a>
                                </div>
                            </div>
                            <!-- /.col -->
        
                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Invoice
                                    </div>
        
                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <input type="date" id="date_of_entry" class="form-control" name="date_of_entry"></div>
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
                            </div>

                            <div class="text-center">
                                <button id="add" type="button" onclick="addRow()" class="btn btn-success">+</button>
                            </div>
        
                            <div class="row border-b-2 brc-default-l2"></div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    <label for="remarks">Remarks</label>
                                    <textarea name="remarks" rows="5" id="remarks" class="form-control">

                                    </textarea>
                                </div>
        
                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1" id="subtotal">0</span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Discount:
                                        </div>
                                        <div class="col-5">
                                            <input type="number" min="0" onchange="discountChange()" id="discount-percent" value="0" name="dicount">
                                            <input type="hidden" name="discount" id="discount">
                                        </div>
                                    </div>
        
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            VAT (13%) <input type="checkbox" onclick="vatClick()" id="vatcheck" name="vatcheck">
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1" id="vat-calculation"></span>
                                            <input type="hidden" name="vat" id="vat">
                                        </div>
                                    </div>
        
                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2" id="total-val">0</span>
                                            <input type="hidden" name="total" id="total">
                                        </div>
                                    </div>
                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            In words
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2" id="total-val-word">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <hr />
        
                            <div>
                                <input type="submit" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" value="Generate Invoice">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>

@endsection

@section('script')

    <script>
        $( document ).ready(function() {
            addRow();
        });

        let counter=0;
        let subtotal=0;
        let totalAmount=0;
        let discount=0;
        let vat=0;
        let total=0;

        var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
        var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

        function showVendorForm(){
            $('#vendor-form').css('visibility','visible');
            $('#show-vendor-button').css('visibility','hidden');
        }

        function addNewVendor(){
            let vendorName = $("#vendor-name").val();
            let vendorPan = $("#vendor-pan").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'post',
                url: "{{route('admin.vendor.createimmediate')}}",
                data: {"name":vendorName, "pan":vendorPan},
                success: function(data){
                    jQuery.each(data.errors, function(key, value){
                        Command: toastr["error"]( value, "Message");
                    });
                    jQuery.each(data.id, function(key, value){
                        let id = value;
                        let htmlObj = `
                            <option value="`+id+`" selected>`+vendorName+` || `+vendorPan+`</option>
                        `;
                        $("#vendor-select").append(htmlObj);
                        $('#vendor-form').css('visibility','hidden');
                    });
                    jQuery.each(data.success, function(key, value){
                        Command: toastr["success"]( value, "Message");
                    });
                }
            });
        }

        function inWords (num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return; var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
            return str;
        }

        function addRow(){

            counter++;

            let htmlObj = `
            <div class="row mb-2 mb-sm-0 py-25" id="row`+counter+`">
                <div class="col-9 col-sm-5"><input type="text" class="form-control" name="particular[]" id="particular`+counter+`" placeholder="Particular"></div>
                <div class="d-none d-sm-block col-2"><input type="number" class="form-control" min=0 name="amount[]" onchange=updateValue('`+counter+`') id="amount`+counter+`" placeholder="Quantity" required></div>
                <div class="d-none d-sm-block col-2 text-95"><input type="number" class="form-control" min=0 onchange=updateValue('`+counter+`') name="rate[]" id="rate`+counter+`" placeholder="Rate" required></div>
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

            subtotal -= amount*rate;

            $("#subtotal").html(subtotal);
            $("#row"+id).remove();

            calculateDiscount();
            calculateVat();
            calculateTotal();
        }

        function updateValue(id){
            let amount = $("#amount"+id).val();
            let rate = $("#rate"+id).val();
            let prevtotal = parseFloat($("#total"+id).text());
            subtotal -= prevtotal;
            subtotal += amount*rate;

            $("#total"+id).html(amount*rate);
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
            
            $("#discount").val(discount);
        }

        function calculateTotal(){
            total = parseFloat(subtotal) - parseFloat(discount) + parseFloat(vat);
            $('#total-val').html(total);
            $("#total").val(total);
            $('#total-val-word').html(inWords(parseInt(total)));
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