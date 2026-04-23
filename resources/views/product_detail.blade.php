@extends('maindesign')

<base href="/public">
@section('product_detail')

<div style="max-width:800px; margin:30px auto; padding:20px; border:1px solid #ddd; border-radius:10px;">

    <h2 style="text-align:center;">Product Details</h2>

    <!-- Product Image -->
    <div style="text-align:center; margin-bottom:20px;">
        <img src="{{ asset('products/'.$product->product_image) }}"
            style="width:200px; height:200px; object-fit:cover;">
    </div>

    <!-- Product Info -->
    <div style="flex:1;">
        <h2>{{ $product->product_title }}</h2>


        <h3 style="color:green;">₹{{ $product->product_price }}</h3>

        <p>
            <strong>Description:</strong><br>
            {{ $product->product_description }}
        </p>

        <p>
            <strong>Available Quantity:</strong> {{ $product->product_quantity }}
        </p>

        <!-- Buttons -->
        <div style="margin-top:20px;">
            <button style="padding:10px 20px; background:#ff9900; border:none; color:white; border-radius:5px;">
                Add to Cart
            </button>

            <button style="padding:10px 20px; background:#007bff; border:none; color:white; border-radius:5px;">
                Buy Now
            </button>
        </div>
    </div>

</div>

@endsection