<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('show_cart') }}">Cart</a>
               </li>
                <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                 </form>
            @if (Route::has('login'))
                 @auth
                 <li class="nav-item">
                    <a href="{{ url('/user/profile') }}" class="nav-link">{{ Auth::user()->name }}</a>
                </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit(); " role="button">
                                    <i class="fas fa-sign-out-alt"></i>
                    
                                    {{ __('Log Out') }}
                                </a>
                            </li>
                        </form>
                 @else
                <li class="nav-item">
                    <a style="margin-right:10px " class="btn btn-primary" class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                 </li>
                 @if (Route::has('register'))
                 <li class="nav-item">
                     <a class="btn btn-success " href="{{ route('register') }}">Đăng ký</a>
                 </li>
                @endif
                 @endauth
               @endif
             </ul>
          </div>
       </nav>
    </div>
 </header>