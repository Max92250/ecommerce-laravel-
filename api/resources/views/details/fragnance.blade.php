
@extends('tasks.navs')


@section('section2')
    <div class="body">
    
        @foreach ($products as $product)
        <div class="product-card">
       
            <a href="{{ route('products.show', ['id' => $product['id']]) }}">
                @if(isset($product['images'][0]))
                    <img class="img-flid" src="{{ $product['images'][0] }}" alt="{{ $product['title'] }}">
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
            </a>
        </div>
    @endforeach
    </div>
    @endsection