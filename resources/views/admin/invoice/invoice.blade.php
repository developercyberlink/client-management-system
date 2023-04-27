<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">{{$data->invoice_no}}</span></p>
        {{-- <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">162695CDFS</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">03-06-2022</span></p> --}}
    </div>
        {{-- <div class="w-50 float-left logo mt-10">
            <img src="{{asset('img/logo.png')}}"> <span>Nicesnippets.com</span>     
        </div> --}}
    <div style="clear: both;"></div>
</div>
{{-- <div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p></p>
                    <p>360004</p>
                    <p>Near Haveli Road,</p>
                    <p>Lal Darvaja,</p>
                    <p>India</p>
                    <p>Contact : 1234567890</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>Rajkot</p>
                    <p>360012</p>
                    <p>Hanumanji Temple,</p>
                    <p>Lati Ploat</p>
                    <p>Gujarat</p>
                    <p>Contact : 1234567890</p>
                </div>
            </td>
        </tr>
    </table>
</div> --}}
{{-- <div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>Cash On Delivery</td>
            <td>Free Shipping - Free Shipping</td>
        </tr>
    </table>
</div> --}}
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            
            <th class="w-50">Description</th>
            {{-- <th class="w-50">Price</th> --}}
            <th class="w-50">Qty</th>
            <th class="w-50">Discount</th>
            <th class="w-50">Price</th>
            <th class="w-50">Grand Total</th>
        </tr>
        @foreach ($data1 as $item)
        <tr align="center">
           
           <td>{{$data->remarks}}</td>
           <td>{{$item->amount}}</td>
           {{-- <td>{{$data->quantity}}</td> --}}
           <td>{{$data->discount}}</td>
           <td>{{$item->rate * $item->amount* $item->time}}</td>
           <td>
               @if($data->discount == 0)
               {{$item->rate * $item->amount *$item->time }}
               @else
               {{$item->rate * $item->amount *$item->time-$data->discount}}
               @endif
           </td>
           
            
        </tr>
        @endforeach
        {{-- <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$254.2</td>
            <td>2</td>
            <td>$500</td>
            <td>$50</td>
            <td>$120.00</td>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$554.2</td>
            <td>5</td>
            <td>$500</td>
            <td>$50</td>
            <td>$100.00</td>
        </tr> --}}
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        {{-- <p>Sub Total</p> --}}
                        <p>Vat added amount (13%)</p>
                        <p>Total Payable</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        {{-- <p>$20</p>  --}}
                        <p>{{$data->vat}}</p>
                        <p>{{$data->total}}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>
</div>
</html>