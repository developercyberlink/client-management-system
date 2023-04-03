@extends('layouts.user')

@section('content')

<h3 class="text-center">Invoices</h3>

<div class="card">
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Invoice no.</th>
                <th>Given date</th>
                <th>Total</th>
                <th>Discount</th>
                <th>VAT</th>
                <th>View</th>
            </tr>

            @foreach (Auth::user()->invoices as $invoice)
                <tr>
                    <td>{{$invoice->invoice_no}}</td>
                    <td>{{$invoice->created_at}}</td>
                    <td>{{$invoice->total}}</td>
                    <td>{{$invoice->discount}}</td>
                    <td>{{$invoice->vat}}</td>
                    <td><a href="{{route('user.invoice.single', $invoice->invoice_no)}}">View</a></td>
                </tr>
            @endforeach

        </table>
    </div>
</div>

@endsection