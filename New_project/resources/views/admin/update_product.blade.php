<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="../public">
    {{-- <link rel="stylesheet" href="public/admin/assets/css/style.css"> --}}
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
            <h2 class="h2_font">Update Product</h2>
            <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="div_design">       
                          <label for="">Product name: </label>
                          <input type="text" name="name" placeholder="Write a title"value="{{ $product->name }}">  
          </div>
          <div class="div_design">       
                          <label for="">Product description: </label>
                          <input type="text" name="decription" value="{{ $product->decription }}"placeholder="Write a decription">  
          </div>
          <div class="div_design">       
                          <label for="">Quantity: </label>
                          <input type="number" name="quantity" min="0" value="{{ $product->quantity }}" placeholder="Write a quantity">  
          </div>
          <div class="div_design">       
                          <label for="">Price: </label>
                          <input type="number" name="price" value="{{ $product->price }}" placeholder="Write a price">  
          </div>
          <div class="div_design">       
                          <label for="">Discount price: </label>
                          <input type="number" name="discount" value="{{ $product->discount }}" placeholder="Write a discount price">  
          </div>
          <div class="div_design">
                          <label for="">Category: </label>
                          <select name="category" id="" required="">
                            @foreach($category as $category)
                                @if($product->category ==  $category->category_name )
                                    <option selected value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @else
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>     
                                @endif
                            @endforeach
                        </select>
          </div>
          <div class="div_design">       
            <label for="">Current product image: </label>
            <img height="150px" src="upload/{{ $product->image }}">
        </div>
        <div class="div_design">       
                        <label for="">Change product image: </label>
                        <input type="file"  name="image">  
        </div>
        <div class="div_design">
                        <input type="submit" value="Update product" class="btn btn-primary">
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