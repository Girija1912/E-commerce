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
        @foreach($cart as $cartproduct)
        <tr>
            <td>{{$cartproduct->product->product_title}}</td>
            <td>{{$cartproduct->product->product_price}}</td>
            <td><img src="{{asset('products/'.$cartproduct->product->product_image)}}" style="height:100px; width:80px">{{$cartproduct->product->product_image}}</td>
            <td>
                <a href="{{route('removecartproduct',$cartproduct->id)}}"
                    style="color:Red"
                    onclick="return confirm('Are you sure?')">
                    Remove
                </a>
            </td>
        </tr>
        @endforeach


        <!-- for pagination purpose   -->
    </tbody>
</table>


@endsection