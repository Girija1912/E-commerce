@extends('admin.maindesign')

@section('add_category')

@if(session('category_message'))
<div class="gb-4 bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded relative">
    {{session('category_message')}}
</div>
@endif
<div class="container-fluid">

    <form action="{{route('admin.postaddcategory')}}" method="POST">
        @csrf
        <input type="text" name="category" placeholder="Enter category name">
        <input type="submit" name="submit" value="Add Catagory">
    </form>
</div>

@endsection