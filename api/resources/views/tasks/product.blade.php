<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <style>
   body {
            margin: 0;
            font-family: Arial, sans-serif;
            width:80%;
            margin:0 auto;
        }

        .product-details {
            display: grid;
            grid-template-columns: 4fr 3fr;
        
            padding: 20px;
            padding-top:50px;
            
            height: 70vh; /* Set height to 70% of the viewport height */
        }

.mingo{
    height:380px;
}

.pingo{
    width:380px;
    margin-left:50px;
    


}
#mainImage{
    width:100%;
    height:100%;
}

        .product-details .row {
            width: 100%;
            display: flex;
        }

        .product-details .col-md-4 {
            flex: 0 0 30%; /* Set width to 30% of the row */
            padding: 0 10px;
        }

        .product-details .col-md-8 {
            flex: 0 0 70%; /* Set width to 70% of the row */
            padding: 0 10px;
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
        

        #productCarousel{
            height:400px;
            padding:10px;
            margin-bottom: 10px;
          
        }

.carousel-inner{
    height:350px;
}
</style>
<!-- Product Details HTML with Thumbnails -->
<div class="product-details">
    <div class="row">
        <div id="productCarousel" class="carousel slide" data-ride="carousel">
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
  
        <div class="ps-lg-4">
          <h4 class="title text-dark">
           {{$product['title']}}
          </h4>
          
<div id="cartCounter">0</div>
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
            <dd class="col-9">Brown,black,yellow,green</dd>

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

    function updateCartCounter() {
        const cartData = getCartData();
        const cartCounter = cartData.length;
        $('#cartCounter').text(cartCounter);
    }

    function changeMainImage(imageUrl) {
        document.getElementById('mainImage').src = imageUrl;
    }

    function addToCart(productId, productName, productPrice, productImages) {
        const cart = getCartData();

        // Add the product to the cart
        const existingProductIndex = cart.findIndex(item => item.id === productId);

        if (existingProductIndex !== -1) {
            // Product already exists, update the quantity
            cart[existingProductIndex].quantity += 1;
            cart[existingProductIndex].subtotal = cart[existingProductIndex].quantity * productPrice;
        } else {
            // Product not in the cart, add it
            cart.push({
                id: productId,
                name: productName,
                price: productPrice,
                images: productImages,
                quantity: 1,
                subtotal: productPrice,
            });
        }

        // Update local storage with the modified cart
        setCartData(cart);

        // Optionally, you can update the cart display on the page
        updateCartCounter();

        // Handle the response, update the cart counter, etc.
        console.log('Product added to cart:', cart);
    }
</script>

</body>
</html>