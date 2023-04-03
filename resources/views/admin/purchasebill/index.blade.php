@extends('layouts.admin')

@section('content')

    
<div class="card">
    <div class="card-body">

      <h5 class="card-title">Purchase Bill Section</h5>

      @can('purchase_bill_add')
        <a href="{{route('admin.purchasebill.add')}}" class="btn btn-primary">Create new bill</a>
      @endcan

      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">Bill no</th>
            <th scope="col">Vendor</th>
            <th scope="col">Date</th>
            @can('purchase_bill_edit')
            <th scope="col">Edit</th>
            @endcan
            @can('purchase_bill_delete')
            <th scope="col">Delete</th>
            @endcan
          </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
            <tr>
                <th scope="row">{{$bill->bill_no}}</th>
                <td>{{$bill->vendor->name}}</td>
                <td>{{$bill->date_of_entry}}</td>
                @can('purchase_bill_edit')
                <td><a href="{{route('admin.purchasebill.edit', $bill->bill_no)}}">Edit</a></td>
                @endcan
                @can('purchase_bill_delete')
                <td><a href="{{route('admin.purchasebill.delete', $bill->bill_no)}}">Delete</a></td>
                @endcan()
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection