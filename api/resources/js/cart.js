


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

        setCartData(cart);

        // Optionally, you can update the cart display on the page
        updateCartCounter();

        // Handle the response, update the cart counter, etc.
        console.log('Product added to cart:', cart);
    }

