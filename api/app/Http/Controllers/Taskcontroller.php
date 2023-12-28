<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all tasks
        
      
        $response = Http::get('https://dummyjson.com/products/category/smartphones');

        // Extract products from the response
        $products = json_decode($response->body(), true);
        return view('tasks.index',['products'=>$products['products']]);
    
    }
    public function phonedetails()
    {
        // Retrieve all tasks
        
      
        $response = Http::get('https://dummyjson.com/products/category/smartphones');

        // Extract products from the response
        $products = json_decode($response->body(), true);
        return view('details.phone',['products'=>$products['products']]);
    
    }
    public function laptopdetails()
    {
        // Retrieve all tasks
        
      
        $response = Http::get('https://dummyjson.com/products/category/laptops');

        // Extract products from the response
        $products = json_decode($response->body(), true);
        return view('details.laptop',['products'=>$products['products']]);
    
    }
    public function fragnancedetails()
    {
        // Retrieve all tasks
        
      
        $response = Http::get('https://dummyjson.com/products/category/fragrances');

        // Extract products from the response
        $products = json_decode($response->body(), true);
        return view('details.fragnance',['products'=>$products['products']]);
    
    }
    public function shopdetails()
    {
        
        
      
        $response = Http::get('https://dummyjson.com/products');

        $products = json_decode($response->body(), true);
        return view('details.shop',['products'=>$products['products']]);
    
    }
    // Assume you have a function to get the cart items from the 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::get('https://dummyjson.com/products/'.$id .'');

     
        $products = json_decode($response->body(), true);
        return view('tasks.product',['product'=>$products]);
        
      
    }
    public function showUpdateForm($id)
    {
        // Fetch the product from the external API
        $response = Http::get('https://dummyjson.com/products/'.$id .'');
        
        $products = json_decode($response->body(), true);
        return view('tasks.update',['product'=>$products]);
        
        
    }
    public function updateProduct(Request $request, $id)
    {
         $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {
            
            $product['title'] = $request->input('title');

            // Send the updated product back to the external API
            $response = Http::put("https://dummyjson.com/products/{$id}", [
                'title' => $request->input('title'),
            ]);
           return $response;
            return view('tasks.index');
        } catch (RequestException $exception) {
            return redirect()->back()->with('error', 'Product not found');
        }

       
    }
        
    
    public function addToCart(Request $request)
{

    return view('tasks.nav');

    
    

}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add any other validation rules as needed
        ]);

        // Update the task with the validated data
        $task->update($request->only(['title', 'description']));

        // Return the updated task as a resource
        return new TaskResource($task);
    }

    // Add other CRUD operations (store, destroy) as needed
}
