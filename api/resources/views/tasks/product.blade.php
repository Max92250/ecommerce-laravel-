
@extends('tasks.navs')


@section('section8')
    <style>
   


.mingo{
    height:380px;
}

.pingo{
    width:350px;
    margin-left:50px;
    


}
#mainImage{
    width:450px;
    height:300px;
}

      

        .main-image {
            width: 100%;
            height:300px;
  
        }

        .thumbnail-images {
            display: flex;
            justify-content: space-between;
            align-items: center;
    overflow: scroll;
    column-gap: 20px;
    overflow-x: hidden; /* Hide horizontal scrollbar */
  overflow-y: hidden;

            margin-top: 10px;
        }

        .thumbnail {
            width: 80px;
            height: 70px;
            cursor: pointer;
            margin-bottom: 5px;
           
        }

        .product-info {
            padding-left: 20px;
        }

        h1, p {
            margin: 0;
        }
        .container-fluid{
            width:80%;
            margin:0 auto;
        }
        
        #productCarousel{
            width:450px;
        }

      .cont{
        width:100vh;
        background:red;
      }

.carousel-inner{
    height:350px;
}
</style>

<!-- Product Details HTML with Thumbnails -->
<div id="app" data-user="{{ Auth::user() }}" class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-6 col-md-6 mb-4 pb-1">
        <div id="productCarousel" class="carousel slide " data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach ($product['images'] as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ $image }}"  id="mainImage"  class="d-block w-100" alt="Image {{ $index + 1 }}">
                    </div>
                @endforeach
            </div>
        
        
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Main Image -->
        
       
        <!-- Thumbnail Images -->
        <div class="pingo">
            <div class="thumbnail-images">
                @foreach ($product['images'] as $index => $image)
                    <img src="{{ $image }}" class="thumbnail img-fluid" alt="Thumbnail Image {{ $index + 1 }}" onclick="changeMainImage('{{ $image }}')">
                @endforeach
            </div>
        </div>
        </div>
   
    

    <!-- Product Info -->
  
        <div class="col-lg-4 mb-4 col-md-6 ml-4 pl-4 pb-1">
          <h4 class="title text-dark">
           {{$product['title']}}
          </h4>
          
          <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                {{$product['rating']}}
              </span>
            </div>
            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>{{$product['stock']}} orders</span>
            <span class="text-success ms-2"> In stock</span>
          </div>

          <div class="mb-3">
            <span class="h5">${{$product['price']}}</span>
            <span class="text-muted">/per box</span>
          </div>

          <p>
         {{$product['description']}}
          </p>

          <div class="row">
            <dt class="col-3">Brand:</dt>
            <dd class="col-9">{{$product['brand']}}</dd>

            <dt class="col-3">Color:</dt>
            <dd class="col-9">Br8wn,black,yellow,green</dd>

            <dt class="col-3">Material:</dt>
            <dd class="col-9">titanium</dd>

            <dt class="col-3">Category:</dt>
            <dd class="col-9">{{$product['category']}}</dd>
          </div>

          <hr />

          <div class="row mb-4">
            <div class="col-md-4 col-6">
              <label class="mb-2">Size</label>
              <select class="form-select border border-secondary" style="height: 35px;">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
              </select>
            </div>
            
          </div>
          <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
        
          <button class="btn btn-primary" onclick="addToCart('{{ $product['id'] }}', '{{ $product['title'] }}', '{{ $product['price'] }}','{{$product['images'][0]}}')">Add to Cart</button>
        
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <div class="w3-row w3-padding-64" id="about">
                        <div class="w3-col m6 w3-padding-large w3-hide-small">
                         <img src="{{$product['images'][0]}}" class="w3-round w3-image " alt="Table Setting" width="500" height="550">
                        </div>
                    
                        <div class="w3-col m6 w3-padding-large">
                          <h1 class="w3-center">Product Description</h1><br>
                          <p >The Catering was founded in blabla by Mr. Smith in lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute iruredolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.We only use <span class="w3-tag w3-light-grey">seasonal</span> ingredients.</p>
                          <p >Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                      </div>
                      <div class="container mb-4">
                        <div class="row  pb-3">
                            <div class="col-lg-6  col-md-6 mb-4 pb-1">
                                <img src="{{$product['images'][2]}}"  alt="Table Setting" width="550" height="350">
                            </div>
                            <div class="col-lg-5 ml-4  col-md-6 mb-4 pb-1">
                                <img src="{{$product['images'][3]}}" alt="Table Setting" width="550" height="350">
                            </div>
                          
                        </div>
                      </div>
                     
                
                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Additional Information</h4>
                    <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                </li>
                                <li class="list-group-item px-0">
                                    Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                </li>
                                <li class="list-group-item px-0">
                                    Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                </li>
                                <li class="list-group-item px-0">
                                    Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                </li>
                              </ul> 
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                </li>
                                <li class="list-group-item px-0">
                                    Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                </li>
                                <li class="list-group-item px-0">
                                    Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                </li>
                                <li class="list-group-item px-0">
                                    Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                </li>
                              </ul> 
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                            <div class="media mb-4">
                               
                                <div class="media-body">
                                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</div>   

      
<div class="container">
    @include('tasks.pik')
</div>





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{asset('js/cart.js')}}"></script>
@endsection