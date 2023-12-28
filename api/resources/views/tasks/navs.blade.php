<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
 
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<style>
      
    
        a{
            text-decoration: none;
            color:rgb(72, 33, 33);
        }

        .product-card {

            width: 320px;
            height:400px;
            border: 1px solid #ccc;
            color:black;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
.img-fluid{
    width: 100%;
            height: 300px;
            object-fit: contain;
           /* Choose the appropriate value: cover, contain, fill, etc. */
}

.img-flid{
    width: 270px;
            height: 200px;
           
           /* Choose the appropriate value: cover, contain, fill, etc. */
}
        .product-card:hover {
            transform: scale(1.05);
        }

        .product-image {
            max-width: 100%;
            height: auto;
        }

        h3 {
            margin-top: 0;
        }
        h5{
            padding-top: 5px;
            text-align: center;
        }

        p {
            margin-bottom: 10px;
            font-size: 10px;
 
     
        h5{
            padding-top: 5px;
            text-align: center;
        }
a{
    text-decoration: none;
}
     
    </style>
<body>
   
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="{{ route('index')}}"  class="nav-item nav-link">Home</a>
            <a href="{{ route('shop')}}" class="nav-item nav-link">Shop</a>
            <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
 
            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>
        <div class="navbar-nav ml-auto py-0">
            <a href="" class="nav-item nav-link">{{session('user')}}</a>
            <a href="{{route('logout')}}" class="nav-item nav-link">logout</a>
        </div>
    </div>
    </nav>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
       
        <div class="col-lg-4 col-6 text-left">
            <form action="{{ route('searchProducts') }}" method="GET">
                <div class="input-group">
                <input type="text" id="searchQuery"  class="form-control" placeholder="Search for products" name="q" required>
                <span class="input-group-text bg-transparent text-primary">
                    <i class="fa fa-search" type="submit"></i>
                </span>
                </div>
            </form>
        </div>
       
        <div class="col-lg-4 col-6 text-left">
        <form action="{{ route('filterByCategory') }}" method="GET">
            <div class="input-group">

            <select name="category" id="category"  class="form-control"  required>
                <option value="smartphones">smartphones</option>
                <option value="laptops">laptops</option>
                <option value="skincare">skincare</option>
                <!-- Add more categories as needed -->
            </select>
            <span >
            <button class="input-group-text bg-transparent text-primary" type="submit">Filter</button>
            </span>
            </div>
        </form>
        </div>
     
        <div class="col-lg-3 col-6 text-right">
           
            <a href="{{ route('addToCart'); }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary" ></i>
                <span class="badge" id="Counter">0</span>
            </a>
        </div>
    </div>     
    @yield('section')
    @yield('section1')
    @yield('section2')
    @yield('section3')
    @yield('section4')
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">Fruitables</h1>
                            <p class="text-secondary mb-0">Fresh products</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                            <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                            popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                        <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link" href="">About Us</a>
                        <a class="btn-link" href="">Contact Us</a>
                        <a class="btn-link" href="">Privacy Policy</a>
                        <a class="btn-link" href="">Terms & Condition</a>
                        <a class="btn-link" href="">Return Policy</a>
                        <a class="btn-link" href="">FAQs & Help</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="btn-link" href="">My Account</a>
                        <a class="btn-link" href="">Shop details</a>
                        <a class="btn-link" href="">Shopping Cart</a>
                        <a class="btn-link" href="">Wishlist</a>
                        <a class="btn-link" href="">Order History</a>
                        <a class="btn-link" href="">International Orders</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function getCurrentUser() {
            return {!! Auth::user() !!} || null;
        }

        function getCartData() {
            const user = getCurrentUser();
            const storageKey = user ? 'user_cart_' + user.id : 'cart';
            return JSON.parse(localStorage.getItem(storageKey)) || [];
        }

        function setCartData(cartData) {
            const user = getCurrentUser();
            const storageKey = user ? 'user_cart_' + user.id : 'cart';

            if (cartData.length === 0) {
                localStorage.removeItem(storageKey);
            } else {
                localStorage.setItem(storageKey, JSON.stringify(cartData));
            }
        }

        function displayCartData() {
            const cartData = getCartData();
            const uniqueProductIds = new Set(cartData.map(item => item.id));
            const cartCounter = uniqueProductIds.size;
            console.log(cartCounter);
            $('#Counter').text(cartCounter);
        }

        $(document).ready(function() {
            displayCartData();
        });
    </script>
</body>
</html>