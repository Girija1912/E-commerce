@extends('admin.maindesign')

@section('add_product')

@if(session('product_message'))
<div class="gb-4 bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded relative">
    {{session('product_message')}}
</div>
@endif
<div class="container-fluid">

    <form action="{{route('admin.postaddproduct')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_title" placeholder="Enter category name">
        <textarea name="product_description" id="">Product Description...</textarea>
        <input type="number" name="product_quantity" placeholder="Enter product price">
        <input type="number" name="product_price" placeholder="Enter product quantity">
        <input type="file" name="product_image">
        <select>
            @foreach($categories as $category)
            <option value="{{$category->category}}">{{$category->category}}</option>
            @endforeach
        </select>
        <input type="submit" name="submit" value="Add Product">
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