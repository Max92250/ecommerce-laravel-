<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    public function index()
    {
     
        $apiUrl = 'https://api.escuelajs.co/api/v1/products';
        $response = Http::get($apiUrl);

        $products = $response->json();
        return view('tasks.index', compact('products'));
    }
}