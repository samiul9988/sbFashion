@extends('admin.layouts.master')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">ADD PRODUCT</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('update_product',$products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" value="{{ $products->title }}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" name="description" value="{{ $products->description }}" class="form-control" id="exampleInputPassword1" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Image Upload</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="image" value="{{ $products->image }}" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Category</label>
            <select name="category" id="">
                <option value="{{ $products->category }}" selected="">Select AnyOne</option>
                @foreach ($categories as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Quantity</label>
            <input type="number" name="quantity" value="{{ $products->quantity }}" class="form-control" id="exampleInputPassword1" placeholder="Quantity">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" name="price" value="{{ $products->price }}" class="form-control" id="exampleInputPassword1" placeholder="Price">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Discount Price</label>
            <input type="number" name="discount_price" value="{{ $products->discount_price }}" class="form-control" id="exampleInputPassword1" placeholder="Discount Price">
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection
