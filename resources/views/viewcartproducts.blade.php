@extends('maindesign')

@section('viewcartsproduct')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Product_title</th>
            <th>Product_price</th>
            <th>Product_image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $price=0;
        @endphp
        @foreach($cart as $cartproduct)
        <tr>
            <td>{{$cartproduct->product->product_title}}</td>
            <td>{{$cartproduct->product->product_price}}</td>
            <td><img src="{{asset('products/'.$cartproduct->product->product_image)}}" style="height:100px; width:80px">{{$cartproduct->product->product_image}}</td>
            <td>
                <a href="{{route('removecartproduct',$cartproduct->id)}}"
                    style="color:white; border:1px; border-radius:5px; margin-top:30px; padding:10px; background-color:red"
                    onclick="return confirm('Are you sure?')">
                    Remove
                </a>
            </td>
        </tr>
        @php
        $price=$price+$cartproduct->product->product_price;
        @endphp
        @endforeach
        <tr style="background-color: gray;">
            <td>Total Price:</td>
            <td>₹{{$price}}</td>
            <td></td>
            <td></td>
        </tr>
    </tbody>


</table>
@if(session('confirmOrder_message'))

<div style="background-color: green; color:black">
    {{session('confirmOrder_message')}}
</div>

@endif
<div class="order-container">
    <form action="{{route('confirm_order')}}" method="POST">
        @csrf
        <input type="text" name="receiver_address" id="" placeholder="Enter your address" required>
        <input type="text" name="receiver_phone" id="" placeholder="Enter your phone" required>
        <input class="btn btn-primary" type="submit" name="submit" value="Confirm Order">
    </form>
</div>
<style>
    .order-container {
        max-width: 400px;
        margin: 60px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    .order-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .order-container input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        transition: 0.3s;
    }

    .order-container input:focus {
        border-color: #007bff;
        outline: none;
    }

    .order-container input[type="submit"] {
        background: #28a745;
        color: white;
        border: none;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .order-container input[type="submit"]:hover {
        background: #218838;
    }
</style>


@endsection