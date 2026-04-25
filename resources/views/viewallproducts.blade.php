@extends('maindesign')

@section('viewallproducts')


<div class="container">

    <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
                <a href="{{route('product_detail',$product->id)}}">
                    <div class="img-box">
                        <img src="{{asset('products/'.$product->product_image)}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h6>
                            {{$product->product_title}}
                        </h6>
                        <h6>
                            Price
                            <span>
                                {{$product->product_price}}
                            </span>
                        </h6>
                    </div>
                    <div style="margin-top:20px;">
                        <a href="{{route('add_to_cart',$product->id)}}" style="padding:10px 20px; background:#ff9900; border:none; color:white; border-radius:5px;">
                            Add to Cart
                        </a>
                        <a href="#" style="padding:10px 20px; background:#ff9900; border:none; color:white; border-radius:5px;">
                            Buy
                        </a>
                    </div>
                    <div class="new">
                        <span>
                            New
                        </span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

</div>


@endsection