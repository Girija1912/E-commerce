@extends('admin.maindesign')

<base href="/public">
@section('update_category')

@if(session('updatecategory_message'))
<div class="gb-4 bg-green-100 border-green-400 text-green-700 px-4 py-3 rounded relative">
    {{session('updatecategory_message')}}
</div>
@endif
<div class="container-fluid">

    <form action="{{route('admin.postupdatecategory',$category->id)}}" method="POST">
        @csrf
        <input type="text" name="category" value="{{$category->category}}">
        <input type="submit" name="submit" value="Update Catagory">
    </form>
</div>

@endsection