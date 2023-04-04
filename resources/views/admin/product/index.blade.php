@extends('layouts.admin')

@section('content')
<!-- this is the product index-->
<div class="card">
    <div class="card-body">
      @can('product_add')
        <a class="btn btn-success" href="{{route('admin.product.add')}}">Add new Product</a>
      @endcan
      <h5 class="card-title">All Products</h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">slug</th>
            <th scope="col">Sub Categories</th>
            <th scope="col">Image</th>
            @can('product_manage')
            <th scope="col">Manage</th>
            @endcan
            @can('product_edit')
            <th scope="col">Edit</th>
            @endcan
            @can('product_delete')
            <th scope="col">Delete</th>
            @endcan
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{$product->title}}</th>
                <td>{{$product->slug}}</td>
                <td>
                  <ul>
                @foreach ($product->subCategories as $subcategory)
                    <li>{{$subcategory->content->title}}</li>
                @endforeach
                  </ul>
                </td>
                <td><img src="{{$product->cover_image}}" width="120px" /></td>
                @can('product_manage')
                <td><a href="{{route('admin.productdetail.index', $product->slug)}}">Manage</a></td>
                @endcan
                @can('product_edit')
                <td><a href="{{route('admin.product.edit', $product->slug)}}">Edit</a></td>
                @endcan
                @can('product_delete')
                <td><a href="{{route('admin.product.delete', $product->slug)}}">Delete</a></td>
                @endcan
            </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>
@endsection