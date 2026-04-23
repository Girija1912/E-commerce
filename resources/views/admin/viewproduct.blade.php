@extends('admin.maindesign')

@section('view_product')
<div class="list-inline-item">
    <form action="{{route('admin.searchproduct')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="search" name="search" placeholder="What are you searching for...">
            <button type="submit" class="submit">Search</button>
        </div>
    </form>
</div>
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
            <td><img src="{{asset('products/'.$product->product_image)}}" style="height:100px; width:80px">{{$product->product_image}}</td>
            <td>{{ optional($product->category)->category }}</td>
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

        {{$products->links()}}
        <!-- for pagination purpose   -->
    </tbody>
</table>

@endsection