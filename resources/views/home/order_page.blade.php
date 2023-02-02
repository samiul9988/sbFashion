@extends('admin.layouts.master')
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Order Details</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th style="">
                        Id
                    </th>
                    <th style="">
                        Name
                    </th>
                    <th style="">
                        Email
                    </th>
                    <th>
                        Phone
                    </th>
                    <th style="" class="text-center">
                        Amount
                     </th>
                     <th style="" class="text-center">
                        Address
                     </th>
                     <th style="" class="text-center">
                        Status
                     </th>
                     <th style="" class="text-center">
                        Transaction ID
                     </th>
                    <th style="" class="text-centert">
                        Currency
                    </th>
                    <th style="" class="text-centert">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->transaction_id }}</td>
                    <td>{{ $order->currency }}</td>
                    <td>
                        <a href="">Cancel Order</a>
                    </td>
                    <td class="project-actions text-center">
                        <a class="btn btn-info btn-sm float" href="{{ route('edit_product',$product->id) }}">

                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ route('delete_product',$product->id) }}">

                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
@endsection
