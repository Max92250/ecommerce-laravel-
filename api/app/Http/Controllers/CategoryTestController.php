<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class CategoryTestController extends Controller
{
    public function filterByCategory(Request $request)
    {
        // Get the selected category from the form
        $selectedCategory = $request->input('category');

        // Fetch products from the external API based on the selected category
        $response = Http::get("https://dummyjson.com/products/category/$selectedCategory");

        // Check if the request was successful (status code 2xx)
        if ($response->successful()) {
            // Decode the JSON response
            $products = json_decode($response->body(), true);

                // Now you can process the $products array
                $products = json_decode($response->body(), true);
                return view('details.laptop',['products'=>$products['products']]);
                $products = json_decode($response->body(), true);
                return view('details.fragnance',['products'=>$products['products']]);
                
                $products = json_decode($response->body(), true);
                return view('tasks.product',['product'=>$products]);
                
        } else {
            // Handle unsuccessful response
            return response()->json(['error' => 'Failed to fetch products'], $response->status());
        }
    }
}
