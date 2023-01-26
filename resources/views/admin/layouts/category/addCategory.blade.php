@extends('admin.layouts.master')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('store_category') }}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Category</label>
                  <div class="col-sm-8">
                    <input type="text" name="category" class="form-control" id="inputEmail3" placeholder="category">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">ADD CATEGORY</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
