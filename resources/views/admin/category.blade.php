<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css');
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <style class="text/css">
        .div_center{
            text-align: center;
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
        .table-hover
        {
            margin-top: 50px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar');
      <!-- partial -->
        @include('admin.header');
        <!-- partial -->

        {{-- Category Aria --}}
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                @if (Session::get('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif
                <h2>Add Category</h2>
                <form action="{{ route('add_category') }}" method="POST">
                    @csrf
                    <input class="" type="text" name="category" placeholder="Write Category Name" id="">
                    <input class="btn btn-primary" type="submit" name="submit"  value="Add Category">
                </form>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Category Name</th>
                        <th>Creat Time</th>
                        <th>Update Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach ($categories as $category)
                       <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td><label class="badge badge-danger">Delete</label></td>
                      </tr>
                       @endforeach
                    </tbody>
                  </table>
            </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    <!-- End custom js for this page -->
  </body>
</html>
