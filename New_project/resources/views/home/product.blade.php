<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ url('product_details',$products->id) }}" class="option1">
                     Product details
                     </a>
                     <form action="{{ url('add_cart',$products->id) }}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                        <input type="number" name="quantity" min="1" value="1">

                           </div>
                           <div class="col-md-4">
                        <input type="submit" value="Add to cart">

                           </div>
                     </div>
                     </form>
                     {{-- <a href="" class="option2">
                     Buy Now
                     </a> --}}
                  </div>
               </div>
               <div class="img-box">
                  <img src="upload/{{ $products->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $products->name }}
                  </h5>
                  @if($products->discount!=null)
                  <div> 
                    <h6 style="text-decoration: line-through; color:blue">
                       Price
                     ${{ $products->price }}
                  </h6>
                    <h6 style=" background-color: red; color:white; padding: 4px 0">
                    Sale
                    ${{ $products->discount }}
                 </h6>
                 
                  </div>
                  
                  @else
                  <h6 style="color: blue">
                    Price
                    ${{ $products->price }}
                 </h6>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
         {!! $product->appends(Request::all())->links('pagination::bootstrap-5') !!}
       </div>
          
       {{-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> --}}
    </div>
 </section>