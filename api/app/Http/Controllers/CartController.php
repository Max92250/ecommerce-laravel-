<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
public function showCartDetails(Request $request)
{
    $productId = $request->input('id');
    $productName = $request->input('name');
    $productPrice = $request->input('price');
    $productImages = $request->input('images');
 
 

   
    $this->addToCartLocally($productId, $productName, $productPrice,$productImages);

    // Optionally, you can return a response (e.g., cart count) if needed
    $cartCount = $this->getUpdatedCartCount();

    return response()->json(['cartCount' => $cartCount]);
}
public function deleteCartItem(Request $request)
{
    // Retrieve the index of the item to delete
    $index = $request->input('index');

    // Delete the item from the cart
    $this->deleteCartItemSession($index);
    return view('tasks.nav');

    
}
// Update addToCartLocally function to use local storage
private function addToCartLocally($productId, $productName, $productPrice, $productImages)
{
    // Retrieve the current cart items from local storage
    $cart = $this->getCartDataLocally();
    $cartCount = count($cart);

    // Check if the product is already in the cart
    $existingProduct = array_search($productId, array_column($cart, 'id'));

    if ($existingProduct !== false) {
        // Product already exists, update the quantity
        $cart[$existingProduct]['quantity'] += 1;
    } else {
        // Product not in the cart, add it
        $cart[] = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'images' => $productImages,
            'quantity' => 1,
        ];
    }

    // Update local storage with the modified cart
    $this->setCartDataLocally($cart);

    // Increment the cart count
    $cartCount += 1;

    // Calculate total price and total quantity
    $totalPrice = array_sum(array_column($cart, 'subtotal'));
    $totalQuantity = array_sum(array_column($cart, 'quantity'));

    // Update session data (optional, if needed on the server side)
    session(['cart' => $cart]);
    session(['cart_count' => $cartCount]);
    session(['cart_total_price' => $totalPrice]);
    session(['cart_total_quantity' => $totalQuantity]);

    return $cartCount;
}

// Update deleteCartItemSession function to use local storage
private function deleteCartItemSession($index)
{
    // Retrieve existing cart items from local storage
    $cart = $this->getCartDataLocally();

    // Remove the item at the specified index
    unset($cart[$index]);

    // Reset array keys after removing an item
    $cart = array_values($cart);

    // Save the updated cart back to local storage
    $this->setCartDataLocally($cart);
}
// Add this function to retrieve cart data from local storage
private function getCartDataLocally()
{
    return json_decode(request()->cookie('cart'), true) ?? [];
}

// Add this function to update cart data in local storage
private function setCartDataLocally($cartData)
{
    return response()->cookie('cart', json_encode($cartData), 60 * 24 * 7);
}


private function getUpdatedCartCount()
{
    // Retrieve the updated cart count from the session
    $cartCount = session('cart_count', 0);

    return $cartCount;
}


}
 if ($request->user()) {
            $user = $request->user();

            // Revoke all tokens for the authenticated user
            $user->tokens()->delete();

            // Perform the standard Laravel logout
            Auth::logout();
         $user = $this->getCurrentUser();
        $storageKey = 'user_cart_' + $user.id;
        localStorage.removeItem($storageKey);
        }

        // Clear the session
        $request->session()->flush();
       return redirect('login')->with('success', ' Please log in.');