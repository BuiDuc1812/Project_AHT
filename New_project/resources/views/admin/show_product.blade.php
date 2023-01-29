<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- <base href="/public"> --}}
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
           <h2 class="h2_font">Product List</h2>
           <table class="center">
               <tr>
                   <th class="th_deg">Name</th>
                   <th class="th_deg">Description</th>
                   <th class="th_deg">Quantity</th>
                   <th class="th_deg">Price</th>
                   <th class="th_deg">Discount price</th>
                   <th class="th_deg">Category</th>
                   <th class="th_deg">Image</th>
                   <th class="th_deg">Update</th>
                   <th class="th_deg">Delete</th>
               </tr>
               @foreach($product as $product)
               <tr>
                   <td>{{ $product->name }}</td>
                   <td>{{ $product->decription }}</td>
                   <td>{{ $product->quantity }}</td>
                   <td>{{ $product->price }}</td>
                   <td>{{ $product->discount }}</td>
                   <td>{{ $product->category }}</td>
                   <td>
                       <img height="150px" src="upload/{{ $product->image }}">
                   </td>
                   <td>  
                     <a href="{{ url('update_product',$product->id) }}" class="btn btn-success">Edit</a>
                   </td>
                   <td>
                     <a onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này chứ ?')"  href="{{ url('delete_product',$product->id) }}" class="btn btn-danger">Delete  
                     </a>
                   </td>
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