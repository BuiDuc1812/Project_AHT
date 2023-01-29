<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           @include('admin.notification')
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>
                    <form action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input type="text" name="category" placeholder="Write a category name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </form>
                    <table class="center">
                        <tr>
                            <td>Category name</td>
                            <td>Action</td>
                        </tr>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $item->category_name }}</td>
                            <td><a onclick="return confirm('Xoá danh mục {{  $item->category_name  }}. Bạn chắc chứ ?')" class="btn btn-danger" href="{{ url('delete_category',$item->id) }}">Delete</a></td>
                          </tr>
                        @endforeach
                    </table>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>