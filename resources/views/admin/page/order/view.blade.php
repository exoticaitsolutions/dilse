<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> View Order Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">View Order Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.blog.index')}}" type ="button" class="btn btn-success float-left" >Back </a>
                                <a href="javascript:void(0)" id="print_order" type ="button" class="btn btn-success float-right" >Print </a>

                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <h4>Billing  & Shipping Address</h4>
                                        <div class="billing-item">
                                            <strong>Full Name  :</strong> <span class="text-bold ">{{ $orders->full_name }}</span> <br>
                                            <strong>Email Address  :</strong> <span class="">{{ $orders->email_address }}</span> <br>
                                            <strong>Phone Number  :</strong> <span class="">{{ $orders->phone_number }}</span><br>
                                            <strong> Full Address   :</strong> <span class="">{{ $orders->shipping_address }}</span><br>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4>Order Details</h4>
                                        <div class="order-item">
                                            <strong>Order Number:</strong> #{{$orders->id}}<br>
                                            <strong>Date:</strong>  <span class="text-bold ">{{ $orders->order_date }}</span>  <br>

                                            <strong>Status:</strong> {{ $orders->status }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>Payment Details</h4>
                                        <div class="order-item">
                                            <strong>Payment Date:</strong> {{ $orders->payment->payment_date }}<br>
                                            <strong>Payment Method:</strong> {{ $orders->payment->payment_method }}<br>
                                            <strong>Total Amount:</strong> ${{ $orders->payment->payment_amount }}<br>
                                            <strong>Payment Status :</strong> {{ $orders->payment->payment_status }}<br>
                                        </div>
                                    </div>
                                    <hr>
                                        <div class="col-lg-12 mt-5">
                                            <div class="card card-static-2 mb-30 mt-30">
                                                <div class="card-title-2">
                                                    <h4>Recent Orders</h4>
                                                </div>
                                                <div class="card-body-table">
                                                    <div class="table-responsive">
                                                        <table id="datatable" class="table ucp-table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th style="width:130px">S.N.</th>
                                                                <th>Item Name</th>
                                                                <th style="width:150px" class="text-center">Price</th>
                                                                <th style="width:150px" class="text-center">Qty</th>
                                                                <th style="width:100px" class="text-center">Total</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($orders->orderItems as $key=>  $items)
                                                                <tr>
                                                                    <td  >{{ $key + 1 }}</td>
                                                                    <td>{{ $items->product->name }}</td>
                                                                    <td>{{ $items->product->price }}</td>
                                                                    <td>{{ $items->quantity }}</td>
                                                                    <td>{{ $items->price    }}</td>
                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">

                                        </div>
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-4">
                                                <strong>Sub Total :</strong>
                                            </div>
                                            <div class="col-8">
                                                ${{$orders->total_amount}}
                                            </div>
                                        </div>
{{--                                        <div class="row mt-3">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <strong>Shipping Fees :</strong>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-8">--}}
{{--                                                $300.00--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="row mt-3">--}}

{{--                                            <div class="col-4">--}}
{{--                                                <strong>Coupon Discount :</strong>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-8">--}}
{{--                                                $0.00--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="row mt-3">

                                            <div class="col-4">
                                                <strong>Total Amount :</strong>
                                            </div>
                                            <div class="col-8">
                                                ${{$orders->total_amount}}
                                            </div>

                                        </div>
                                        <div class="row mt-3">

                                            <div class="col-4">
                                                <strong>Status:</strong>
                                            </div>
                                            <div class="col-8">
                                                {{$orders->status}}
                                            </div>

                                        </div>

                                    </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
    </section>


</x-admin-app-layout>