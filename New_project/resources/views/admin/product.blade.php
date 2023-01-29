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
            <h2 class="h2_font">Add Product</h2>
            <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
          @csrf
              <div class="div_design">       
                          <label for="">Product name: </label>
                          <input type="text" name="name" placeholder="Write a title" required ="">  
          </div>
          <div class="div_design">       
                          <label for="">Product description: </label>
                          <input type="text" name="decription" required="" placeholder="Write a decription">  
          </div>
          <div class="div_design">       
                          <label for="">Quantity: </label>
                          <input type="number" name="quantity" min="0" required="" placeholder="Write a quantity">  
          </div>
          <div class="div_design">       
                          <label for="">Price: </label>
                          <input type="number" name="price" required="" placeholder="Write a price">  
          </div>
          <div class="div_design">       
                          <label for="">Discount price: </label>
                          <input type="number" name="discount"  placeholder="Write a discount price">  
          </div>
          <div class="div_design">
                          <label for="">Category: </label>
                          <select name="category" id="" required="">
                              <option value="" selected>Add category</option>
                              @foreach($category as $category)
                              <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                              @endforeach
                          </select>
          </div>
          <div class="div_design">       
                          <label for="">Image: </label>
                          <input type="file" name="image" required="">  
          </div>
          <div class="div_design">
                          <input type="submit" value="Add product" class="btn btn-primary">
          </div>
        </form>
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