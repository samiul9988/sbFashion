@extends('admin.layouts.master')
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Product Details</h3>

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
                        Title
                    </th>
                    <th style="">
                        Description
                    </th>
                    <th>
                        Image
                    </th>
                    <th style="" class="text-center">
                        category
                     </th>
                     <th style="" class="text-center">
                        Quantity
                     </th>
                     <th style="" class="text-center">
                        Price
                     </th>
                     <th style="" class="text-center">
                        D-Price
                     </th>
                    <th style="" class="text-centert">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <img src="/images/{{ $product->image }}">
                    </td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount_price }}</td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ route('edit_product',$product->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ route('delete_product',$product->id) }}">
                            <i class="fas fa-trash-alt">
                            </i>
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
