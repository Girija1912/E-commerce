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
                <form action="{{route('admin.change_status',$order->id)}}" method="POST">
                    @csrf
                    <select name="status" id="">
                        <option value="{{$order->status}}">{{$order->status}}</option>
                        <option value="Delivered">Delivered</option>
                        <option value="pending">pending</option>
                    </select>
                    <input type="submit" value="submit" name="submit" onclick="return confirm('Are you sure?')">
                </form>
            </td>
            <td><a href="{{route('admin.downloadpdf',$order->id)}}" class="btn btn-primary">Download PDF</a></td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection