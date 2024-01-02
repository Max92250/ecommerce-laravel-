
@extends('tasks.navs')


@section('section2')
   
    
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
    
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 pb-1">

                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                @if(isset($product['images'][0]))
                <a href="{{ route('products.show', ['id' => $product['id']]) }}" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="{{ $product['images'][0] }}" alt="{{ $product['title'] }}">
                </a>
                @else
                    <img src="placeholder_image_url" alt="Placeholder" style="max-width: 100%;">
                @endif
    
                @if(isset($product['title']))
                    <h3>{{ $product['title'] }}</h3>
                @else
                    <h3>No Title</h3>
                @endif
    
                @if(isset($product['description']))
                    <p>{{ $product['description'] }}</p>
                @else
                    <p>No Description</p>
                @endif
    
                @if(isset($product['price']))
                    <p>Price: ${{ $product['price'] }}</p>
                @else
                    <p>Price: Not Available</p>
                @endif
                
                <button class="bt btn" onclick="addToCart('{{ $product['id'] }}', '{{ $product['title'] }}', '{{ $product['price'] }}','{{$product['images'][0]}}')">Add to Cart</button>
                </div>
                </div>
        
        
    @endforeach
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 

    <script src="{{asset('js/cart.js')}}"></script>
    </div>
    @endsection