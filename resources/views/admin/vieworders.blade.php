@extends('admin.maindesign')

@section('view_orders')


<table class="table table-striped">
    <thead>
        <tr>
            <th>Product Id</th>
            <th>Receivers_address</th>
            <th>Receivers_phone</th>
            <th>Product_title</th>
            <th>Product_price</th>
            <th>Product_image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->receiver_address}}</td>
            <td>{{$order->receiver_phone}}</td>
            <td>{{ optional($order->product)->product_title }}</td>
            <td>{{ optional($order->product)->product_price }}</td>
            <td><img src="{{ asset('products/'.optional($order->product)->product_image) }}" style=" height:100px; width:80px"></td>
            <td>
                <form action="" method="POST">
                    <select name="status" id="">
                        <option value="{{$order->status}}">{{$order->status}}</option>
                        <option value="Delivered">Delivered</option>
                        <option value="pending">pending</option>
                    </select>
                    <input type="submit" value="submit" name="submit">
                </form>
            </td>
            <td>
                <a href="#"
                    style="color:green">
                    Update
                </a>
                <a href="#"
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