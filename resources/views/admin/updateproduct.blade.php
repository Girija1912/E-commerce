@extends('admin.maindesign')

<base href="/public">
@section('update_product')

@if(session('updateproduct_message'))
<div class="gb-4 bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded relative">
    {{session('updateproduct_message')}}
</div>
@endif
<div class="container-fluid">

    <form action="{{route('admin.postupdateproduct',$products->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_title" value="{{$products->product_title}}">
        <textarea name="product_description" id="">{{$products->product_description}}</textarea>
        <input type="number" name="product_quantity" value="{{$products->product_quantity}}">
        <input type="number" name="product_price" value="{{$products->product_price}}">
        <input type="file" name="product_image" value="{{$products->product_image}}">
        <select name="product_category">
            @foreach($categories as $category)
            <option value="{{ $category->category }}"
                {{ $products->product_category == $category->category ? 'selected' : '' }}>
                {{ $category->category }}
            </option>
            @endforeach
        </select>
        <input type="submit" name="submit" value="Update Product">
    </form>
</div>
<style>
    form input,
    form textarea,
    form select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    form textarea {
        resize: none;
        height: 100px;
    }

    form input:focus,
    form textarea:focus,
    form select:focus {
        border-color: #007bff;
        outline: none;
    }

    form input[type="submit"] {
        background: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s;
    }

    form input[type="submit"]:hover {
        background: #0056b3;
    }
</style>
@endsection