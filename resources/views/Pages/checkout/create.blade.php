@extends('layouts.app')
@section('title', 'Checkout')
@section('frontcontent')
<section class="checkout_page py_8">
    <div class="container">
    <form action="{{route('checkout.create')}}" method="post" class="woocommerce form" data-cc-on-file="false" id="payment-form" autocomplete="off"> @csrf

        <div class="main_checkout">
            <div class="checkout_form_details">
                <div class="cart_head">
                    <h3>Shopping Cart</h3>
                </div>
                <div class="checkout_change_form">
                    <div class="checkout_change_card shipment_change">
                        <div class="contact_info">
                            <div class="contact_lef">
                                <div class="contact_main">
                                    <div class="contact_icon">
                                    <img src="{{ asset('frontend/img/ship.png') }}">
                                    </div>
                                    <div class="contcat_text">
                                        <h5>Shipping Address</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipment_form checkout_formms">
                            @livewire('checkout.user-checkout-address-form')
                        </div>
                    </div>

                    <div class="checkout_change_card payment_change">
                        <div class="contact_info">
                            <div class="contact_lef">
                                <div class="contact_main">
                                    <div class="contact_icon">
                                    <img src="{{ asset('frontend/img/ship.png') }}">
                                    </div>
                                    <div class="contcat_text">
                                        <h5>Items in your Cart</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipment_form checkout_formms">
                            @livewire('checkout.user-product-cart-list')
                        </div>
                    </div>
                    <div class="checkout_change_card payment_change">
                        <div class="contact_info">
                            <div class="contact_lef">
                                <div class="contact_main">
                                    <div class="contact_icon">
                                    <img src="{{ asset('frontend/img/ship.png') }}">
                                    </div>
                                    <div class="contcat_text">
                                        <h5>Payment Method</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipment_form checkout_formms">
                            @livewire('checkout.user-paymnet-form')
                         </div>
                        <div class="summary-checkout">
                            <p class="checkout-info">Your personal data will used to process your order, support
                                your experience throughout this website, and for other purposes described in our
                                privacy policy.</p>
                            <button type="submit" class="theme_btn">
                                Place Your <strong class="font-italic">Order</strong> <span class="bx bx-right-arrow-alt float-right"></span>
                            </button>                </div>
                    </div>

                </div>

            </div>

        </div>
        </form>
    </div>
    </section>
@endsection