<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .center{
            margin: 0 auto;
            width: 50%;
            min-height: 60vh;
            padding: 30px;
        }
        table,th, td{
            border: 1px solid gray;
        }
        .th_deg{
            font-size: 24px;
            padding: 5px 12px;
            background: skyblue
        }
        .total_deg{
            font-size: 20px;
            padding: 40px
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->
         @if(session()->has('message'))
                 
         <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{ session()->get('message') }}
          </div>
             
         @endif
      <!-- why section -->
<div class="center">
    <table>
        <tr>
            <th class="th_deg">Product name</th>
            <th class="th_deg">Quantity</th>
            <th class="th_deg">Price</th>
            <th class="th_deg">Image</th>
            <th class="th_deg">Action</th>
        </tr>
        <?php $totalprice=0 ?>
        @foreach ($cart as $cart)
        <tr>
            <td>{{ $cart->product_name }}</td>
            <td>{{ $cart->quantity }}</td>
            <td>{{ $cart->price }}</td>
            <td><img width="200px" src="upload/{{ $cart->image }}" alt=""></td>
            <td><a onclick="return confirm('Bạn chắc chứ ?')" class="btn btn-danger" href="{{ url('remove_cart',$cart->id) }}">Remove</a></td>
        </tr>
        <?php $totalprice = $totalprice + $cart->price ?>
        @endforeach      
    </table>
    <div>
        <h5 class="total_deg">Totalprice: {{ $totalprice }}</h5>
    </div>
    <div>
        <h1 style="font-size: 24px; padding-bottom:15px">Proceed to order</h1>
        <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash on Delivery</a>
        <a href="{{ url('stripe',$totalprice) }}" class="btn btn-danger">pay using Card</a>
    </div>
</div>
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>