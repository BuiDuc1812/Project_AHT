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
           <h2 class="h2_font">All Order</h2>
           <table class="center">
               <tr>
                   <th class="th_deg">Name</th>
                   <th class="th_deg">Email</th>
                   <th class="th_deg">Phone</th>
                   <th class="th_deg">Address</th>
                   <th class="th_deg">Product name</th>
                   <th class="th_deg">Quantity</th>
                   <th class="th_deg">Price</th>
                   <th class="th_deg">Payment status</th>
                   <th class="th_deg">Delivery status</th>
                   <th class="th_deg">Image</th>
                   <th class="th_deg">Delivered</th>
               </tr>
               @foreach($order as $order)
               <tr>
                   <td>{{ $order->name }}</td>
                   <td>{{ $order->email }}</td>
                   <td>{{ $order->phone }}</td>
                   <td>{{ $order->address }}</td>
                   <td>{{ $order->product_name }}</td>
                   <td>{{ $order->quantity }}</td>
                   <td>{{ $order->price }}</td>
                   <td>{{ $order->payment_status }}</td>
                   <td>{{ $order->delivery_status }}</td>
                   <td>
                       <img height="150px" src="upload/{{ $order->image }}">
                   </td>
                   <td>  
                    @if ($order->delivery_status="processing")
                        <a href="{{ url('delivered',$order->id) }}" class="btn btn-primary">Delivered</a>
                    @else
                    <p>Delivered</p>
                    @endif
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