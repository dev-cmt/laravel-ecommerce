<x-frontend-layout :title="'Products List'">
    <div class="sg-page-content">

        <section class="grid-view-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="sg-sitebar sa-box">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="ac1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">All Categories</button>
                                    </div>
                                    <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="ac1" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="global-list">
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">Fashion</a></li>
                                                <li><a href="#">Shoes</a></li>
                                                <li><a href="#">Sport Shorts</a></li>
                                                <li><a href="#">Beauty shop</a></li>
                                                <li><a href="#">Women Clothing</a></li>
                                                <li><a href="#">Men Clothing</a></li>
                                                <li><a href="#">Electronics Accessories</a></li>
                                                <li><a href="#">Computer Accessories</a></li>
                                                <li><a href="#">Laptop</a></li>
                                                <li><a href="#">Smart Phone</a></li>
                                                <li><a href="#">Smart Phone</a></li>
                                                <li><a href="#">Kitchen Accessories</a></li>
                                                <li><a href="#">Show more</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="ac2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Price</button>                                            
                                    </div>
                                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="ac2" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="price-top">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Min">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Max">
                                                </div>
                                                <button type="submit" class="btn">Apply</button>
                                            </div>
                                            <div id="price_slider"></div>
                                            <div class="price_slider_amount">
                                                <input type="text" id="amount">
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="ac3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Brand</button>
                                    </div>
                                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="ac3" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form action="#" class="form-checkbox">
                                                <div class="form-group">
                                                    <input type="checkbox" id="samsung">
                                                    <label for="samsung">Samsung</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="apple">
                                                    <label for="apple">Apple</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="xiaome">
                                                    <label for="xiaome">Xiaome</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="iphone">
                                                    <label for="iphone">iPhone</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="realme">
                                                    <label for="realme">Realme</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="vivo">
                                                    <label for="vivo">Vivo</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="techno">
                                                    <label for="techno">Techno</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="javascript">
                                                    <label for="javascript">Javascript</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="ac4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Size</button>
                                    </div>
                                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="ac4" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form action="#" class="form-checkbox">
                                                <div class="form-group">
                                                    <input type="checkbox" id="small">
                                                    <label for="small">Small</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="medium">
                                                    <label for="medium">Medium</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="large">
                                                    <label for="large">Large</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="extra">
                                                    <label for="extra">Extra Large</label>
                                                </div>
                                            </form>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="ac5">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">Color</button>
                                    </div>
                                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="ac5" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form action="#" class="form-checkbox">
                                                <div class="form-group">
                                                    <input type="checkbox" id="white">
                                                    <label for="white">White</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="black">
                                                    <label for="black">Black</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="blue">
                                                    <label for="blue">Blue</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="green">
                                                    <label for="green">Green</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="brown">
                                                    <label for="brown">Brown</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="grey">
                                                    <label for="grey">Grey</label>
                                                </div>
                                            </form>                                              
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" id="ac6">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">Ratting</button>
                                    </div>
                                    <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="ac6" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <form action="#" class="form-checkbox">
                                                <div class="form-group">
                                                    <input type="checkbox" id="rating5">
                                                    <label for="rating5">
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="rating4">
                                                    <label for="rating4">
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="rating3">
                                                    <label for="rating3">
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="rating2">
                                                    <label for="rating2">
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="rating1">
                                                    <label for="rating1">
                                                        <span class="active"><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                        <span><i class="fa-solid fa-star"></i></span>
                                                    </label>
                                                </div>
                                            </form>                                             
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.accordion -->                                                        
                        </div><!-- /.sg-sitebar -->
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="sg-category-content sg-filter sa-box mb-3">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="left-content">
                                    <div class="title d-flex">
                                        <h1>Sort by</h1>
                                        <select class="form-control">
                                            <option value="">Default Sort </option>
                                            <option value="">Sort by latest </option>
                                            <option value="">Sort by popularity</option>
                                        </select>
                                    </div>                                        
                                </div>
                                <div class="right-content">
                                    <div class="d-flex">
                                        <select class="form-control">
                                            <option value="">Show by 10</option>
                                            <option value="">Show by 15</option>
                                            <option value="">Show by 20</option>
                                            <option value="">Show by 30</option>
                                        </select>    
                                        <ul class="filter-tabs global-list">
                                            <li class="grid-view-tab active"><span class="mdi mdi-name mdi-grid"></span></li>
                                            <li class="list-view-tab"><span class="mdi mdi-name mdi-format-list-bulleted"></span></li>
                                        </ul>                                             
                                    </div>
                                </div>
                            </div>   

                            <ul class="products grid-4">
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/2.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price"><del>$50.00</del> $25.00</span>
                                            <h3><a href="#">Trendy Shoes For Man With High Quality...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li ><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/3.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price">$30.00</span>
                                            <h3><a href="#">Wireless Bluetooth Headphones...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/w1.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price"><del>$1000.00</del> $700.00</span>
                                            <h3><a href="#">Apple Watch Series 7 45mm Sports Band...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/4.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price">$85.00</span>
                                            <h3><a href="#">Modern Sofa High Quality Living Room...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/6.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price"><del>$150.00</del> $85.00</span>
                                            <h3><a href="#">Stylish Short Sleeve T-shirt for Men...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/b1.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price">$195.00</span>
                                            <h3><a href="#">Calvin Klein Men's Slim Fit Suit...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/9.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price"><del>$90.00</del> $48.00</span>
                                            <h3><a href="#">Sony SRS-XB13 Extra BASS Wireless...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/10.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price"><del>$230.00</del> $185.00</span>
                                            <h3><a href="#">Withings ScanWatch - Hybrid Smartwatch...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/8.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price"><del>$230.00</del> $185.00</span>
                                            <h3><a href="#">Ball Gowns White Ivory Tulle Bridal Dress...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/m3.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price">$29.00</span>
                                            <h3><a href="#">Men's Jogger Pants Drawstring Zipper...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/m2.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price">$900.00</span>
                                            <h3><a href="#">Manufactum Gentleman’s Wallet...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                                <li>
                                    <div class="sg-product">
                                        <div class="product-thumb">
                                            <a href="details.html"><img src="{{asset('public/frontend')}}/images/product/wo4.png" alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="sg-rating">
                                                <ul class="global-list">
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li class="active"><span class="fa-solid fa-star"></span></li>
                                                    <li><span class="fa-solid fa-star"></span></li>
                                                </ul>
                                            </div>                                     
                                            <span class="price">$122.00</span>
                                            <h3><a href="#">Woman Fashion Ladies Heel Shoes...</a></h3>  
                                            <div class="icons">
                                                <ul class="global-list">
                                                    <li><a href="#"><span><i class="far fa-heart"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a></li>
                                                    <li><a href="#"><span><i class="fas fa-random"></i></span></a></li>
                                                    <li><a href="#"><span><i class="far fa-eye"></i></span></a></li>
                                                </ul>
                                            </div>                              
                                        </div>
                                    </div><!-- /.sg-product -->                                  
                                </li>
                            </ul>                               
                            <div class="show-more mt-4">
                               <a href="#" class="btn btn-primary">Show more</a>      
                            </div>
                        </div><!-- /.sg-category-content -->  
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.category-section -->

    </div><!-- /.sg-page-content -->
</x-frontend-layout>