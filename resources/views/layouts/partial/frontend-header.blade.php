<div class="popup-modal modal fade" tabindex="-1" id="sg-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{asset('public/frontend')}}/images/product/modal.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h2>Get <span>25%</span> Discount</h2>
                        <p>Subscribe to the yoori shop newsletter to receive updates on special offers.</p>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" required="required" placeholder="Email Address">
                            </div>
                            <button class="btn btn-primary text-uppercase" name="submit" type="submit">Subscribe</button>
                        </form>
                        <div class="social">
                            <ul class="global-list">
                                <li><a href="#"><span><i class="fa-brands fa-facebook"></i></span></a></li>
                                <li><a href="#"><span><i class="fa-brands fa-twitter"></i></span></a></li>
                                <li><a href="#"><span><i class="fa-brands fa-linkedin"></i></span></a></li>
                                <li><a href="#"><span><i class="fa-brands fa-instagram"></i></span></a></li>
                                <li><a href="#"><span><i class="fa-brands fa-pinterest"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="form-group tnc">
                            <input type="checkbox" name="tnc" id="tnc">
                            <label for="tnc">Don't show this popup again</label>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<header class="sg-header">
    <div class="sg-topbar">
        <div class="container">
            <div class="topbar-content">
                <div class="left-content">
                    <ul class="global-list d-flex">
                        <li>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">English</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><img src="{{asset('public/frontend')}}/images/others/flag1.png" alt="Image" class="img-fluid">English</a></li>
                                    <li><a class="dropdown-item" href="#"><img src="{{asset('public/frontend')}}/images/others/flag2.png" alt="Image" class="img-fluid">France</a></li>
                                    <li><a class="dropdown-item" href="#"><img src="{{asset('public/frontend')}}/images/others/flag3.png" alt="Image" class="img-fluid">Jarman</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">USD</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">USD</a></li>
                                    <li><a class="dropdown-item" href="#">BDT</a></li>
                                    <li><a class="dropdown-item" href="#">AUD</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-content">
                    <ul class="global-list">
                        <li><span><i class="fas fa-phone-volume"></i></span><a href="#">Live Chat: +12 345 678 99</a></li>
                        <li><span><i class="far fa-user"></i></span><a href="{{route('login')}}">Sign In/ </a> <a href="{{route('register')}}"> Register</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.sg-topbar -->  

    <div class="header-middle">
        <div class="container">
            <div class="botom-content">
                <div class="sg-logo">
                    <a href="index-2.html"><img src="{{asset('public/frontend')}}/images/logo.png" alt="Logo" class="img-fluid"></a>
                </div>
                <div class="sg-search"> 
                    <div class="search-form">
                        <form action="#">
                            <input type="text" class="form-control" placeholder="Search Product">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form><!-- /form -->
                    </div><!-- /form -->                    
                </div><!-- /.sg-search -->

                <div class="user-option">
                    <ul class="global-list">
                        <li>
                            <div class="d-flex">
                                <div class="icon">
                                    <i class="fa-solid fa-shuffle"></i>
                                </div>
                                <div class="text">
                                    <span class="badge">0</span>
                                    <span>Compare</span>
                                </div>                                        
                            </div>
                        </li>
                        <li>
                            <div class="d-flex">
                                <div class="icon">
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                                <div class="text">
                                    <span class="badge">0</span>
                                    <span>Wishlist</span>
                                </div>                                        
                            </div>
                        </li>
                        <li class="sg-dropdown">
                            <div class="d-flex">
                                <div class="icon">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <div class="text">
                                    <span class="badge">3</span>
                                    <span>Cart</span>
                                </div>                                        
                            </div>
                            <div class="sg-dropdown-menu">
                                <span class="title">Cart Items</span>
                                <ul class="global-list">
                                    <li>
                                        <div class="sg-product">
                                            <span class="remove-icon fa-solid fa-xmark"></span>
                                            <div class="product-thumb">
                                                <a href="#"><img src="{{asset('public/frontend')}}/images/product/w1.png" alt="Image" class="img-fluid"></a>
                                            </div>
                                            <div class="product-info">
                                                <h3><a href="#">Apple Watch Series 7 45mm Sports Band...</a></h3>
                                                <span class="price">$ 700.00</span>
                                            </div>
                                        </div>                                            
                                    </li> 
                                    <li>
                                        <div class="sg-product">
                                            <span class="remove-icon fa-solid fa-xmark"></span>
                                            <div class="product-thumb">
                                                <a href="#"><img src="{{asset('public/frontend')}}/images/product/9.png" alt="Image" class="img-fluid"></a>
                                            </div>
                                            <div class="product-info">
                                                <h3><a href="#">Sony SRS-XB13 Extra BASS Wireless...</a></h3>
                                                <span class="price">$ 1009.00</span>
                                            </div>
                                        </div>                                            
                                    </li> 
                                    <li>
                                        <div class="text-center buttons">
                                            <a href="#" class="btn btn-primary">View cart</a>
                                            <a href="#" class="btn btn-primary">Checkout</a>
                                        </div>
                                    </li>  
                                </ul>                                        
                            </div>
                        </li>
                    </ul>
                </div>                          
            </div>                             
        </div><!-- /.container -->         
    </div><!-- /.header-middle -->   

    <div class="header-bottom style-1">
        <div class="container">
            <div class="bottom-content">
                <div class="sg-categorie-menu categorie-lg align-self-lg-center">
                    <div class="top-content">                                
                        <button class="sg-toggle">
                            <span class="toggle-bar bar1"></span>
                            <span class="toggle-bar bar2"></span>
                            <span class="toggle-bar bar3"></span>
                        </button>
                        <span>All Categories</span>
                    </div>
                    <div class="categorie-menu" id="categorie-menu">
                        <div class="categorie-menu-content">
                            <ul class="global-list"> 
                                <li class="active"><a href="#"><img src="{{asset('public/frontend')}}/images/others/1.svg" alt="svg" class="img-fluid">All Offers</a></li>
                                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/2.svg" alt="svg" class="img-fluid">Fashion & Clothing</a></li>
                                <li class="sg-dropdown active">
                                    <a href="#"><img src="{{asset('public/frontend')}}/images/others/3.svg" alt="svg" class="img-fluid">Electronic Gadget</a>
                                    <div class="sg-dropdown-menu">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h3>Digital Camera</h3>
                                                <ul class="global-list">
                                                    <li><a href="#">Digital SLR Camera</a></li>
                                                    <li><a href="#">Sports & Action Camera</a></li>
                                                    <li><a href="#">Camcorders</a></li>
                                                    <li><a href="#">Photo Printer</a></li>
                                                    <li><a href="#">Camera Lenses</a></li>
                                                    <li><a href="#">Digital Memory Cards</a></li>
                                                    <li><a href="#">Digital Memory Cards</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <h3>Headphone</h3>
                                                <ul class="global-list">
                                                    <li><a href="#">Wireless Headphone</a></li>
                                                    <li><a href="#">General Headphone</a></li>
                                                    <li><a href="#">Sound Speaker</a></li>
                                                    <li><a href="#">Earphone</a></li>
                                                    <li><a href="#">Bluetooth Headphone</a></li>
                                                    <li><a href="#">Apply Headphone</a></li>
                                                    <li><a href="#">Base Box</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <h3>Furniture</h3>
                                                <ul class="global-list">
                                                    <li><a href="#">Sofas & Couches</a></li>
                                                    <li><a href="#">Armchairs</a></li>
                                                    <li><a href="#">Bed Frames</a></li>
                                                    <li><a href="#">Beside Tables</a></li>
                                                    <li><a href="#">Dressing Tables</a></li>
                                                    <li><a href="#">Home Fragrance</a></li>
                                                    <li><a href="#">Clocks</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="sg-product">
                                                    <div class="product-info">
                                                        <p>New Arrivals</p>
                                                        <h4>Amazing Feature</h4>
                                                        <span class="price">From $95.00</span>
                                                    </div>
                                                    <div class="product-thumb">
                                                        <img src="{{asset('public/frontend')}}/images/others/w1.png" alt="Img" class="img-fluid">
                                                    </div>
                                                    <a href="#" class="btn">Shop Now!</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div>
                                </li>
                                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/4.svg" alt="svg" class="img-fluid">Skin Care</a></li>
                                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/5.svg" alt="svg" class="img-fluid"> Computer Accessories</a></li>
                                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/6.svg" alt="svg" class="img-fluid">Cameras</a></li>
                                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/7.svg" alt="svg" class="img-fluid">Home & Garden</a></li>
                                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/8.svg" alt="svg" class="img-fluid">Game & Toys</a></li>
                                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/9.svg" alt="svg" class="img-fluid">Health & Beauty</a></li>
                                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/10.svg" alt="svg" class="img-fluid">Bag & Lages</a></li>
                                <li><a href="#"><strong>View All Categories</strong> <span class="fa-solid fa-arrow-right "></span></a></li>
                            </ul>
                      
                        </div><!-- /.categorie-menu-content -->
                    </div><!-- /.categorie-menu -->                                                      
                </div><!-- /.categorie-menu -->   

                <div class="right-content">
                    <div class="sg-menu">
                        <nav class="navbar navbar-expand-lg">
                            <div class="sg-logo">
                                <a href="index-2.html"><img src="{{asset('public/frontend')}}/images/logo.png" alt="Logo" class="img-fluid"></a>
                            </div>  
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>                                  
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active sg-dropdown">
                                        <a href="index-2.html">Home</a>
                                        <ul class="sg-dropdown-menu">
                                            <li><a href="index-2.html">Home V-1</a></li>
                                            <li class="active"><a href="index1.html">Home V-2<span class="badge">New</span></a></li>
                                        </ul>
                                    </li> 
                                    <li class="nav-item"><a href="shop.html">Shop</a></li>
                                    <li class="nav-item"><a href="gift-voucher.html">gift voucher</a></li>
                                    <li class="nav-item sg-dropdown">
                                        <a href="#">Page</a>
                                        <ul class="sg-dropdown-menu">
                                            <li><a href="details.html">Shop Details</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="campaign-page.html">Campaign Page</a></li>
                                            <li><a href="check-out.html">Check Out Page</a></li>
                                            <li><a href="order-history.html">Order History</a></li>
                                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                            <li><a href="payment.html">Payment Page</a></li>
                                            <li><a href="profile.html">Profile Page</a></li>
                                            <li><a href="edit-profile.html">Edit Profile</a></li>
                                            <li><a href="notification.html">Notification</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="sign-in.html">Sign In</a></li>
                                            <li><a href="sign-up.html">Sign Up</a></li>
                                        </ul>
                                    </li>                                    
                                    <li class="nav-item"><a href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a href="about.html">About Us</a></li>        
                                </ul>
                            </div>
                        </nav><!-- /.navbar -->
                    </div><!-- /.sg-menu --> 
                    <div class="offer">
                        <a href="#"><span><i class="fa-solid fa-location-dot"></i></span> Track Order</a>
                    </div>                             
                </div>                         
            </div>                
        </div><!-- /.container -->
    </div><!-- /.header-bottom --> 

    <div class="sg-categorie-menu categorie-sm">
        <div class="sg-toggle"><span class="fa-solid fa-xmark"></span></div>
        <div class="categorie-menu-content">
            <ul class="global-list"> 
                <li class="active"><a href="#"><img src="{{asset('public/frontend')}}/images/others/1.svg" alt="svg" class="img-fluid">All Offers</a></li>
                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/2.svg" alt="svg" class="img-fluid">Fashion & Clothing</a></li>
                <li class="sg-dropdown active">
                    <a href="#"><img src="{{asset('public/frontend')}}/images/others/3.svg" alt="svg" class="img-fluid">Electronic Gadget</a>
                    <div class="sg-dropdown-menu">
                        <div class="row">
                            <div class="col-lg-3">
                                <h3>Digital Camera</h3>
                                <ul class="global-list">
                                    <li><a href="#">Digital SLR Camera</a></li>
                                    <li><a href="#">Sports & Action Camera</a></li>
                                    <li><a href="#">Camcorders</a></li>
                                    <li><a href="#">Photo Printer</a></li>
                                    <li><a href="#">Camera Lenses</a></li>
                                    <li><a href="#">Digital Memory Cards</a></li>
                                    <li><a href="#">Digital Memory Cards</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h3>Headphone</h3>
                                <ul class="global-list">
                                    <li><a href="#">Wireless Headphone</a></li>
                                    <li><a href="#">General Headphone</a></li>
                                    <li><a href="#">Sound Speaker</a></li>
                                    <li><a href="#">Earphone</a></li>
                                    <li><a href="#">Bluetooth Headphone</a></li>
                                    <li><a href="#">Apply Headphone</a></li>
                                    <li><a href="#">Base Box</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h3>Furniture</h3>
                                <ul class="global-list">
                                    <li><a href="#">Sofas & Couches</a></li>
                                    <li><a href="#">Armchairs</a></li>
                                    <li><a href="#">Bed Frames</a></li>
                                    <li><a href="#">Beside Tables</a></li>
                                    <li><a href="#">Dressing Tables</a></li>
                                    <li><a href="#">Home Fragrance</a></li>
                                    <li><a href="#">Clocks</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <div class="sg-product">
                                    <div class="product-info">
                                        <p>New Arrivals</p>
                                        <h4>Amazing Feature</h4>
                                        <span class="price">From $95.00</span>
                                    </div>
                                    <div class="product-thumb">
                                        <img src="{{asset('public/frontend')}}/images/others/w1.png" alt="Img" class="img-fluid">
                                    </div>
                                    <a href="#" class="btn">Shop Now!</a>
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div>
                </li>
                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/4.svg" alt="svg" class="img-fluid">Skin Care</a></li>
                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/5.svg" alt="svg" class="img-fluid"> Computer Accessories</a></li>
                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/6.svg" alt="svg" class="img-fluid">Cameras</a></li>
                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/7.svg" alt="svg" class="img-fluid">Home & Garden</a></li>
                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/8.svg" alt="svg" class="img-fluid">Game & Toys</a></li>
                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/9.svg" alt="svg" class="img-fluid">Health & Beauty</a></li>
                <li><a href="#"><img src="{{asset('public/frontend')}}/images/others/10.svg" alt="svg" class="img-fluid">Bag & Lages</a></li>
                <li><a href="#"><strong>View All Categories</strong> <span class="fa-solid fa-arrow-right "></span></a></li>
            </ul>
      
        </div><!-- /.categorie-menu-content -->
    </div><!-- /.categorie-menu -->

    <div class="user-option sm-cart">
        <div  class="c-toggle"><span class="fa-solid fa-xmark"></span></div>
        <div class="sg-dropdown">
            <div class="sg-dropdown-menu">
                <span class="title">Cart Items</span>
                <ul class="global-list">
                    <li>
                        <div class="sg-product">
                            <span class="remove-icon fa-solid fa-xmark"></span>
                            <div class="product-thumb">
                                <a href="#"><img src="{{asset('public/frontend')}}/images/product/w1.png" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="product-info">
                                <h3><a href="#">Apple Watch Series 7 45mm Sports Band...</a></h3>
                                <span class="price">$ 700.00</span>
                            </div>
                        </div>                                            
                    </li> 
                    <li>
                        <div class="sg-product">
                            <span class="remove-icon fa-solid fa-xmark"></span>
                            <div class="product-thumb">
                                <a href="#"><img src="{{asset('public/frontend')}}/images/product/9.png" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="product-info">
                                <h3><a href="#">Sony SRS-XB13 Extra BASS Wireless...</a></h3>
                                <span class="price">$ 1009.00</span>
                            </div>
                        </div>                                            
                    </li> 
                    <li>
                        <div class="text-center buttons">
                            <a href="#" class="btn btn-primary">View cart</a>
                            <a href="#" class="btn btn-primary">Checkout</a>
                        </div>
                    </li>  
                </ul>                                       
            </div>
        </div>
    </div>                           

    <div id="sm_menu" class="sticky-sm-menu">
        <div class="sm-menu-content">
            <div class="container">
                <ul class="global-list">
                    <li>
                        <a href="index-2.html">
                            <span><i class="fa-solid fa-house"></i></span>
                            <span>Home</span>
                        </a>                                
                    </li>
                    <li>
                        <a href="#" class="sg-toggle">
                            <span><i class="fa-solid fa-bars"></i></span>
                            <span>Categories</span>
                        </a>                                
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="fa-regular fa-heart"></i></span>
                            <span>Wishlist</span>
                        </a>                                
                    </li>
                    <li>
                        <a href="#"  class="c-toggle">
                            <span><i class="fa-solid fa-briefcase"></i></span>
                            <span>Cart</span>
                        </a>                                
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="fa-regular fa-user"></i></span>
                            <span>Account</span>
                        </a>                                
                    </li>
                </ul>                        
            </div>
        </div>
    </div>
</header><!-- /.sg-header -->