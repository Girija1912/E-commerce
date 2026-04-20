@extends('admin.maindesign')


@section('view_product')

@if(session('deleteproduct_message'))

<div style="background-color: orange; color:black">
    {{session('deleteproduct_message')}}
</div>

@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>Product Id</th>
            <th>Product_title</th>
            <th>Product_description</th>
            <th>Product_quantity</th>
            <th>Product_price</th>
            <th>Product_image</th>
            <th>Product_category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->product_title}}</td>
            <td>{{$product->product_description}}</td>
            <td>{{$product->product_quantity}}</td>
            <td>{{$product->product_price}}</td>
            <td>{{$product->product_image}}</td>
            <td>{{$product->product_category}}</td>
            <td>
                <a href="{{route('admin.updateproduct',$product->id)}}"
                    style="color:green">
                    Update
                </a>
                <a href="{{route('admin.productdelete',$product->id)}}"
                    style="color:Red"
                    onclick="return confirm('Are you sure?')">
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection