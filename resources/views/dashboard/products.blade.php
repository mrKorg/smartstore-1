@extends('layouts.dashboard') @section('content')

    <h1>Products</h1>
    <div class="alert alert-success alert-dismissible fade in" style="display: none;" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span>
        </button>
        <span id="message"></span>
    </div>
    <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

        <div class="row">
            <div class="col-sm-12">
                <table id="products-table" class="table table-striped table-bordered dataTable no-footer"
                       role="grid" aria-describedby="datatable-fixed-header_info" data-token="{{ csrf_token() }}">
                    <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Old price</th>
                        <th>Price from</th>
                        <th>Price to</th>
                        <th>Count</th>
                        <th>Rating</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr data-id="{{$product->id}}" class="product-row">
                            <td>{{ $product->id }}</td>
                            <td class="product">{{ $product->product }}</td>
                            <td>{{ $product->category->category }}</td>
                            <td>{{ $product->brand->brand }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->old_price }}</td>
                            <td>{{ $product->price_from_date }}</td>
                            <td>{{ $product->price_to_date }}</td>
                            <td>{{ $product->count }}</td>
                            <td>{{ $product->rating }}</td>
                            <td>
                                <div class="product-edit" data-id="{{ $product->id }}"><span
                                            class="fa fa-pencil fa-2x"></span></div>
                                <div class="product-delete" data-id="{{ $product->id }}"><span
                                            class="fa fa-close fa-2x"></span></div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection