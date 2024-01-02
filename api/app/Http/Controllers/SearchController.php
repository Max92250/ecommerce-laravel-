<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function searchProducts(Request $request)
    {
        // URL of the API endpoint
        $apiUrl = 'https://dummyjson.com/products/search';


        $searchQuery = $request->input('q');

        // Check if the search query is empty
        if (empty($searchQuery)) {
            // You might want to handle this case appropriately, e.g., redirect back with an error message
            return redirect()->back()->with('error', 'Please provide a search query');
        }

        try {
            
            // Send a GET request to the API
            $response = Http::get($apiUrl, ['q' => $searchQuery]);

            // Check if the request was successful (status code 2xx)
            if ($response->successful()) {
                // Decode the JSON response
                $products = json_decode($response->body(), true);

                return view('details.laptop',['products'=>$products['products']]);

                return view('details.fragnance',['products'=>$products['products']]);
                
           
                return view('tasks.product',['product'=>$products]);
                
              
            } else {
                // Handle unsuccessful response
                return response()->json(['error' => 'Failed to fetch products'], $response->status());
            }
        } catch (\Exception $e) {
            // Handle exceptions, such as network errors
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
