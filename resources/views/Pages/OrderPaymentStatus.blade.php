@extends('layouts.app')
@section('title', 'Thank You')
@section('frontcontent')
    <div class="wraper">
        <section class="about_se py_8">
            <div class="thank-you-container">
                  @if($orderItem->status ==='Cancelled')
                    <h2>Order Cancelled with {{json_decode($orderItem->payment->paymnet_json,true)['message']}}</h2>
                    <p>We are sorry, but your payment was not successful. Please try again later or contact customer support for assistance.</p>

                @else
                    <h2>Thank you for your purchase!</h2>
                    <p>Thank you for your order. Your payment was successful, and your order has been confirmed. We will process your order shortly.</p>
                @endif


                <p>Your order details: {{$orderItem->id}}</p>
                <table>


                    <tr>
                        <th>Image</th>
                        <th>Product  ID</th>
                        <th>Name</th>
                        <th>Item Amount</th>
                        <th>Quantity</th>
                        <th>Order Type</th>
                    </tr>
                    @foreach ($orderItem->orderItems as $key=>  $items)
                        <tr>
                            <td><img src="{{Storage::url('products/'.$items->product->image )}}"></td>
                            <td>{{$items->id}}</td>
                            <td><a href="/menu/{{$items->product->slug}}">{{$items->product->name}}</a></td>
                            <td>${{$items->product->price}}</td>
                            <td>{{$items->quantity}}</td>
                            <td>{{$orderItem->order_type}}</td>
                        </tr>
                    @endforeach

                </table>
                <div class="login-content">If you want to order more. Click on the <a href="{{url('menu')}}">Menus</a></p>
                    {{-- <p>We'll send a confirmation email shortly.</p> --}}
                </div>
        </section>

        @endsection
        <style>
            .login-content {
                text-align: center;
                margin-top: 50px;
                font-size: 20px;
            }
            .login-content a{font-weight: 600;}
        </style>