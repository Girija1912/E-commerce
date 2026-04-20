@extends('admin.maindesign')


@section('view_category')

@if(session('deletecategory_message'))

<div style="background-color: orange; color:black">
    {{session('deletecategory_message')}}
</div>

@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>category Id</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->category}}</td>
            <td>
                <a href="{{ route('admin.categoryupdate', $category->id) }}"
                    style="color:green">
                    Update
                </a>
                <a href="{{ route('admin.categorydelete', $category->id) }}"
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