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
    <title>Shopping Cart</title>
</head>
<body>
 <style>
        /* Add your custom CSS styles for card and hover effects here */
        @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
    </style>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card">
                <div class="card-body p-4">
      
                  <div class="row">
      
                    <div class="col-lg-7">
                      <h5 class="mb-3"><a href="#!" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                      <hr>
      
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                          <p class="mb-1">Shopping cart</p>
                          <p class="mb-0">You have <span id="cartCounter"></span> items in your cart</p>
                        </div>
                        <div>
                          <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                              class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                      </div>
                <div id="cartItemsContainer" class="container mt-4">
    <!-- Cart items will be displayed here -->
</div>
         </div>
                    <div class="col-lg-5">
      
                      <div class="card bg-primary text-white rounded-3">
                        <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Card details</h5>
                          
                          </div>
      
                          <p class="small mb-2">Card type</p>
                          <a href="#!" type="submit" class="text-white"><i
                              class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                          <a href="#!" type="submit" class="text-white"><i
                              class="fab fa-cc-visa fa-2x me-2"></i></a>
                          <a href="#!" type="submit" class="text-white"><i
                              class="fab fa-cc-amex fa-2x me-2"></i></a>
                          <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>
      
                          <form class="mt-4">
                            <div class="form-outline form-white mb-4">
                              <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                placeholder="Cardholder's Name" />
                              <label class="form-label" for="typeName">Cardholder's Name</label>
                            </div>
      
                            <div class="form-outline form-white mb-4">
                              <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                              <label class="form-label" for="typeText">Card Number</label>
                            </div>
      
                            <div class="row mb-4">
                              <div class="col-md-6">
                                <div class="form-outline form-white">
                                  <input type="text" id="typeExp" class="form-control form-control-lg"
                                    placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                                  <label class="form-label" for="typeExp">Expiration</label>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-outline form-white">
                                  <input type="password" id="typeText" class="form-control form-control-lg"
                                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                  <label class="form-label" for="typeText">Cvv</label>
                                </div>
                              </div>
                            </div>
      
                          </form>
      
                          <hr class="my-4">
      
                          <div class="d-flex justify-content-between">
                            <p class="mb-2">Subtotal</p>
                           
                            <p class="mb-2"id="cartTotalAmount"></p>
                 
                          </div>
      
                          <div class="d-flex justify-content-between">
                            <p class="mb-2">Shipping</p>
                            <p class="mb-2">$20.00</p>
                          </div>
      
                          <div class="d-flex justify-content-between mb-4">
                            <p class="mb-2">Total(Incl. taxes)</p>
                            <p class="mb-2" id="total">$</p>
                          </div>
      
                          <button type="button" class="btn btn-info btn-block btn-lg">
                            <div class="d-flex justify-content-between">
                              
                              <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                            </div>
                          </button>
      
                        </div>
                      </div>
      
                    </div>
      
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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

       
        const cartItemsContainer = $('#cartItemsContainer');
        const cartTotalAmount = $('#cartTotalAmount');
        const cartTotal = $('#total');
        cartItemsContainer.empty(); 
        const uniqueProductIds = new Set(cartData.map(item => item.id));
        
        const cartCounter = uniqueProductIds.size;
        $('#cartCounter').text(cartCounter);
        console.log(cartCounter);
        cartData.forEach((item,index) => {
            const cartItemHtml = `
            <div class="card mb-3">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <div>
                                <img
                                  src="${item.images}"
                                  class="img-fluid rounded-3" alt="Shopping item" style="width: 80px;">
                              </div>
                              <div class="ms-3 ml-2">
                                <h5>${item.name}</h5>
                                <p class="small mb-0">256GB, Navy Blue</p>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                              <div style="width: 50px;">
                                <h5 class="fw-normal mb-0">${item.quantity}</h5>
                              </div>
                              <div style="width: 80px;">
                                <h5 class="mb-0">${item.price}<h5>
                              </div>
                            
                              <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                              <button class="btn btn-danger btn-sm delete-button" data-index="${index}">Delete</button>
                            </div>
                            
                          </div>
                        </div>
                      </div>
            `;
            cartItemsContainer.append(cartItemHtml);
        });
        const totalAmount = cartData.reduce((total, item) => total + Number(item.subtotal), 0);
const total = totalAmount + 20;
cartTotalAmount.text(totalAmount);
cartTotal.text(total);

        $('.delete-button').on('click', function () {
            const index = $(this).data('index');
            deleteCartItem(index);
          
        });
        
    function deleteCartItem(index) {
        const cartTotalAmount = $('#cartTotalAmount');
        const cartTotal = $('#total');
        const cart = getCartData();
        
        const uniqueProductIds = new Set(cart.map(item => item.id));
        
        const cartCounter = uniqueProductIds.size;
        $('#cartCounter').text(cartCounter);

        // Remove the item at the specified index
        cart.splice(index, 1);

        // Update local storage with the modified cart
        setCartData(cart);

        // Update the cart display and counter
        displayCartData();
        
        
    }
    
   



    }

    // Call the displayCartData function when the page loads
    $(document).ready(function() {
        displayCartData();
    });
</script>

</body>
</html>
