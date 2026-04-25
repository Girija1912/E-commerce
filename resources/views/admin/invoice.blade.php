<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:20px;">

    <div style="max-width:700px; margin:auto; background:white; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        <!-- Header -->
        <h2 style="text-align:center; color:#333;">Invoice</h2>
        <hr>

        <!-- Customer Info -->
        <h3 style="color:#007bff;">Customer Details</h3>
        <p><strong>Name:</strong> {{ optional($data->user)->name }}</p>
        <p><strong>Address:</strong> {{ $data->receiver_address }}</p>
        <p><strong>Phone:</strong> {{ $data->receiver_phone }}</p>

        <hr>

        <!-- Product Info -->
        <h3 style="color:#007bff;">Product Details</h3>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr style="background:#007bff; color:white;">
                    <th style="padding:10px; border:1px solid #ddd;">Product</th>
                    <th style="padding:10px; border:1px solid #ddd;">Price</th>
                </tr>
            </thead>

            <tbody>
                <tr style="text-align:center;">
                    <td style="padding:10px; border:1px solid #ddd;">
                        {{ optional($data->product)->product_title }}
                    </td>
                    <td style="padding:10px; border:1px solid #ddd; color:green; font-weight:bold;">
                        ₹{{ optional($data->product)->product_price }}
                    </td>
                </tr>
            </tbody>
        </table>

        <hr>

        <!-- Total -->
        <div style="text-align:right; margin-top:20px;">
            <h3>Total: {{ optional($data->product)->product_price }}</h3>
        </div>

        <!-- Footer -->
        <p style="text-align:center; margin-top:30px; font-size:12px; color:gray;">
            Thank you for your purchase!
        </p>

    </div>

</body>

</html>