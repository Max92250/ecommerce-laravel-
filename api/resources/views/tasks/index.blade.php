
@extends('tasks.navs')


@section('section')
<div id="header-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 410px;">
            <img class="img-fluid" src="https://www.apple.com/newsroom/images/tile-images/Apple_iphone_11-rosette-family-lineup-091019.jpg.landing-big_2x.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="carousel-item" style="height: 410px;">
            <img class="img-fluid" src="https://i.ytimg.com/vi/1aqI7EnfbVM/maxresdefault.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">4 Products</p>
                <a href="{{ route('phones'); }}"" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="https://onsalesoffers.com/wp-content/uploads/2023/06/iphjon.png" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">smartphones</h5>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">4 Products</p>
                <a href="{{ route('laptop'); }}""  class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="https://cdn.thewirecutter.com/wp-content/media/2023/06/bestlaptops-2048px-9765.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">laptops</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">4 Products</p>
                <a href="{{ route('fragnance'); }}""  class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="https://puls-img.chanel.com/1687527727352-parfumvisual1jpg_1150x1080.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">fragrances</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">4 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="https://assets.teenvogue.com/photos/5dcdb2859e7c33000970e450/4:3/w_4163,h_3122,c_limit/Beauty_Soko-Glam_PROMO.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">skincare</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">4 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="https://bloomingdales.ae/dw/image/v2/BDSP_PRD/on/demandware.static/-/Sites-bloomingdales-master-catalog/default/dwecdeace8/images/hi-res/BLM/Gucci/215771739/215771739_IN.jpg?sw=435&sh=650&q=100" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">womens-dresses</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">4 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="https://en.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton-laureate-platform-desert-boot--AQ8Q1BTX02_PM2_Front%20view.png?wid=490&hei=490" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">womens-shoes</h5>
            </div>
        </div>
       
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Trandy Mens</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
    <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
            <p class="text-right">4 Products</p>
            <a href="" class="cat-img position-relative overflow-hidden mb-3">
                <img class="img-fluid" src="https://cdn2.chrono24.com/images/uhren/21534832-i7set8koq40hk7bpivqdzaw1-ExtraLarge.jpg" alt="">
            </a>
            <h5 class="font-weight-semi-bold m-0">mens-watches</h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
            <p class="text-right">4 Products</p>
            <a href="" class="cat-img position-relative overflow-hidden mb-3">
                <img class="img-fluid" src="https://cdna.lystit.com/520/650/n/photos/farfetch/9712a6d2/gucci--GG-Short-sleeved-Polo-Shirt.jpeg" alt="">
            </a>
            <h5 class="font-weight-semi-bold m-0">mens-tshirt</h5>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
            <p class="text-right">4 Products</p>
            <a href="" class="cat-img position-relative overflow-hidden mb-3">
                <img class="img-fluid" src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/1341ee9a-ad54-4a22-9868-0e0a9b6fe017/women-s-air-jordan-1-low-x-travis-scott-medium-olive-dz4137-106-release-date.jpg" alt="">
            </a>
            <h5 class="font-weight-semi-bold m-0">men shoes</h5>
        </div>
    </div>
    </div>
</div>
@endsection

 