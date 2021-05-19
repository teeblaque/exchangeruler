@extends('user.main')

@section('description', 'Create Bitcoin')

@section('stylesheet')
    <style>
        </style>
@endsection

@section('contents')
     <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <br>
                <div class="alert alert-primary" style="text-align: left;">
                    <strong>Attention! </strong>Kindly check the <strong>Bitcoin address</strong> before sending
                </div>
                @include('user.partials._failure')

                @include('user.partials._success')

                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div id="basic" class="layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Sell - Create New Order</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" id="paymentForm" enctype="multipart/form-data" novalidate method="POST" action="{{ route('user.bitcoin.create') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="validationCustom04">Order Type</label>
                                                    <select name="order_type" id="order_type" class="form-control" required>
                                                        <option value="">Select Order Type</option>
                                                        <option value="sell">Sell</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Product Type</label>
                                                    <select name="product_type" id="product_type" class="form-control" required>
                                                        <option value="" selected>Select product type</option>
                                                        <option value="bitcoin">Bitcoin</option>
                                                        <option value="ethereum">Ethereum</option>
                                                        <option value="usdt">USDT</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Services</label>
                                                    <select name="services" id="services" class="form-control" required>
                                                        <option value="" selected>Select service</option>
                                                        <option value="bitcoin">Bitcoin(500-599)</option>
                                                        <option value="bitcoin">Bitcoin(1000+ above)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Mode of Transaction</label>
                                                    <select name="services" id="services" class="form-control" required>
                                                        <option value="" selected>Select Transaction Method</option>
                                                        <option value="blockchain">BlockChain</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Rate($)</label>
                                                   <input type="tel" class="form-control" id="rate" name="rate" placeholder="0.00" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Total Amount($)</label>
                                                   <input type="tel" class="form-control" id="total_amt" name="total_amt" placeholder="0.00">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">BTC Amount</label>
                                                    <input type="tel" class="form-control" id="btc_amount" name="btc_amount" placeholder="Enter BTC Amount" required>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-8 col-lg-8 col-sm-12 layout-spacing">
                                                        <div class="form-group">
                                                            <label for="fullName">Send $0 worth of BTC to the address below.</label>
                                                            <input type="tel" class="form-control" id="btc_amount" name="btc_amount" placeholder="Enter BTC Amount" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                                                        <div class="form-group">
                                                            <label for="fullName">Click button to copy</label><br>
                                                            <button type="button" class="btn btn-dark" onclick="copyWalletAddress_btc();">
                                                    <span class="tooltiptext1" id="myTooltip_btc">Copy BTC address to clipboard</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">You will get</label>
                                                <input type="tel" class="form-control" id="btc_amount" name="btc_amount" placeholder="N0.00" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">Order Note</label><br>
                                                    <small style="color: red">(Enter the cards denomination e.g 100x2 50x2 25x4 etc. <br> If its Bitcoin , Please enter the wallet you are sending from Blockchain, paxful etc ):</small>
                                                    <textarea name="order_note" id="order_note" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="fullName">Upload Order Image</label>
                                                    <input type="file" class="form-control" id="order_image" name="order_image" required>
                                                    <small style="color: red">Please upload a valid image file (Images can be multiple). Size of each image should not be more than 2MB.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit">Create Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('user.partials._footer')
        </div>
        <!--  END CONTENT PART  -->
@endsection

@section('scripts')
    <script>
        $('document').ready(function(){

        });
    </script>
@endsection
