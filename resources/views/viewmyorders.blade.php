<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('User Dashboard')}}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table style="width:100%; border-collapse:collapse; margin-top:20px; font-family:Arial, sans-serif;">

                        <thead>
                            <tr style="background:#007bff; color:white;">
                                <th style="padding:12px; border:1px solid #ddd;">Product Id</th>
                                <th style="padding:12px; border:1px solid #ddd;">Address</th>
                                <th style="padding:12px; border:1px solid #ddd;">Phone</th>
                                <th style="padding:12px; border:1px solid #ddd;">Title</th>
                                <th style="padding:12px; border:1px solid #ddd;">Price</th>
                                <th style="padding:12px; border:1px solid #ddd;">Image</th>
                                <th style="padding:12px; border:1px solid #ddd;">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                            <tr style="text-align:center; background:#f9f9f9;">

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $order->id }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $order->receiver_address }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $order->receiver_phone }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ optional($order->product)->product_title }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd; color:green; font-weight:bold;">
                                    ₹{{ optional($order->product)->product_price }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">
                                    <img src="{{ asset('products/'.optional($order->product)->product_image) }}"
                                        style="height:100px; width:80px; border-radius:6px; object-fit:cover;">
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $order->status }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>