@extends('layouts.admin')

@section('content')

    
<div class="card">
    <div class="card-body">

      <h5 class="card-title">Invoice Section</h5>

      @can('invoice_add')
        <a href="{{route('admin.invoice.add')}}" class="btn btn-primary">Create new invoice</a>
      @endcan

      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">Invoice no</th>
            <th scope="col">User</th>
            <th scope="col">Date</th>
            @can('invoice_edit')
            <th scope="col">Edit</th>
            @endcan
            @can('invoice_delete')
            <th scope="col">Delete</th>
            @endcan
            <th scope="col">View PDF/ Send Mail</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
            <tr>
                <th scope="row">{{$invoice->invoice_no}}</th>
                <td>{{$invoice->user?$invoice->user->name:''}}</td>
                <td>{{$invoice->date_of_entry}}</td>
                @can('invoice_edit')
                <td><a href="{{route('admin.invoice.edit', $invoice->invoice_no)}}">Edit</a></td>
                @endcan
                @can('invoice_delete')
                <td><a href="{{route('admin.invoice.delete', $invoice->invoice_no)}}">Delete</a></td>
                @endcan()
                <td>
                  <a class="btn btn-secondary" href="{{route('admin.invoice.pdf',$invoice->invoice_no)}}" role="button" target="_blank">Export in PDF</a>
                  <br><br>
                  <a href="{{route('admin.invoice.email',$invoice->invoice_no)}}" class="btn btn-success" role="button">Send to email</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection