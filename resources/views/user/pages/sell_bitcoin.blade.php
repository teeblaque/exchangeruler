@extends('user.main')

@section('title')
    <h4>
        <i class="icon-folder-add"></i>
        Sell - Create New Order
    </h4>
@endsection

@section('stylesheet')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      #btc_amount{
            display: none;
        }

        #btc_row{
            display: none;
        }

        #trans{
            display: none;
        }

  </style>
@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce">
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card r-0 shadow">
                        <div class="card-header white pb-0">
                            <p> Sell - Create New Order</p>
                        </div>
                        <div class="card-body">
                            <form id="addOrder" method="POST" action="{{ route('user.sell.bitcoin') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="" id="param" name="param">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="name">Order Type</label>
                                        <select name="order_type" id="order_type" class="form-control">
                                            <option value="">Select Order Type</option>
                                            <option value="sell" selected>Sell</option>
                                        </select>
                                        <div class="invalid-feedback" id="err_type"></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="name">Select Product Type</label>
                                        <select name="protype" id="protype" class="form-control">
                                            <option value="">Select Product Type</option>
                                            <option value="bitcoin">Bitcoin</option>
                                            <option value="usdt">USDT</option>
                                            <option value="ethereum">ETHEREUM</option>
                                            <!--<option value="giftcard">Giftcard</option>-->
                                        </select>
                                        <div class="invalid-feedback" id="err_type"></div>
                                    </div>
                                    <div class="alert alert-danger"><u>Crypto Wallet</u><br>
                                        <p><b>*Note:</b> Bitcoin(Bockchain and Paxful)</p>
                                        <p><b>*Note:</b> ETH(Bockchain and Paxful)</p>
                                        <p><b>*Note:</b> USDT(TRC 20)</p>
                                     </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="name">Services</label>
                                        <select name="services" id="services" class="form-control">
                                            <option value="" selected>Select Service Type</option>
                                            {{-- @foreach ($catalogue as $catalog)
                                                <option value="{{ $catalog->id }}">{{ Str::ucfirst($catalog->product_name) }}({{ $catalog->denomination }})</option>
                                            @endforeach --}}
                                        </select>
                                        <div class="invalid-feedback" id="err_type"></div>
                                    </div>

                                    <div class="form-group col-md-12" id="trans">
                                        <label class="font-weight-semibold" for="name">Mode of Transaction</label>
                                        <select name="transaction" id="transaction" class="form-control">
                                            <option value="" selected>Select Transaction Mode</option>
                                            {{-- @foreach ($blocks as $chain)
                                                <option value="{{ $chain->id }}">{{ Str::ucfirst($chain->product_type) }}</option>
                                            @endforeach --}}
                                        </select>
                                        <div class="invalid-feedback" id="err_type"></div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">Rate ($):</label>
                                        <input type="text" value="" class="form-control" id="our_rate" placeholder="0.00" name="our_rate" placeholder="Total Amount" readonly>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">Total Amount ($):</label>
                                        <input type="text" value="" class="form-control" id="amount_dollar" placeholder="0.00" name="amount_dollar">
                                        <div class="invalid-feedback" id="err_amount"></div>
                                    </div>

                                        <div class="form-group col-md-12" id="btc_amount">
                                            <label class="font-weight-semibold" for="sell_rate">BTC Amount:</label>
                                            <input type="text" placeholder="0.00" class="form-control" name="btc_amount" id="btc_amt" placeholder="Total Amount In BTC" readonly>
                                            <div class="invalid-feedback" id="err_amount"></div>
                                        </div>

                                </div>
                                <div id="btc_row">
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label class="font-weight-semibold" for="buy_ra" id="buy_wallet">Send $0 worth of BTC to the address below.</label>
                                            <input readonly type="text" class="form-control" id="wallet_address_btc" name="btc_address">
                                            <div class="invalid-feedback" id="err_amount"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="font-weight-semibold" for="buy_ra" id="buy_ra">Click button to copy</label><br>
                                            <div class="tooltip1">
                                                <button type="button" class="btn btn-dark" onclick="copyWalletAddress_btc();">
                                                    <span class="tooltiptext1" id="myTooltip_btc">Copy BTC address to clipboard</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        {{-- <label class="font-weight-semibold" for="sell_rate">You will get :</label> --}}
                                        <input readonly type="hidden" class="form-control" id="amount_naira" name="amount_naira" placeholder="N0.00">
                                        <div class="invalid-feedback" id="err_amount"></div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">Order Note<span style="color: red"> <br> (Enter the cards denomination e.g 100x2 50x2 25x4 etc. <br> If its Bitcoin , Please enter the wallet you are sending from Blockchain, paxful etc ):</span></label>
                                        <textarea name="order_note" id="order_note" cols="30" rows="5" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">Upload Order Image</label><br>
                                        <input type="file" id="input-file-now" class="dropify" name="avatar[]" multiple/><br>
                                        <label for="" style="color: red">Please upload a valid image file (Images can be multiple). Size of each image should not be more than 2MB.</label>
                                    </div>
                                </div>


                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button id="btn-addOrder" type="submit" class="btn btn-success pull-right float-right"><i class="anticon anticon-edit"></i> Create Order </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('document').ready(function(){
            var pams = '';
            var rate = '';
            function isEmpty(value){
                return (value == null || value.length === 0);
            }

            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            $('#protype').on('change', function(e){
                e.preventDefault();

                var prototype = $('#protype').val();

                var url = '{{ route("prototype", ":protype") }}';
                url = url.replace(':protype', prototype);

                var listItems= "";

                $.ajax({
                    type: "GET",
                    url: url
                }).done(function(data){
                    listItems = "<option value='' selected>- Select value -</option>";
                    for (let index = 0; index < data.length; index++) {
                        const element = data[index];
                        listItems+= "<option value='" + element.id + "'>" + element.product_name +"("+ element.denomination+")" + "</option>";
                    }
                    $("#services").html(listItems);

                }).fail(function(error){
                    console.log(error);
                });
            });

            $('#protype').on('change', function(e){
                e.preventDefault();

                var walletAdress = $('#protype').val();

                var url = '{{ route("walletAdress", ":walletAdress") }}';
                url = url.replace(':walletAdress', walletAdress);

                var listItems= "";

                $.ajax({
                    type: "GET",
                    url: url
                }).done(function(data){
                    console.log(data);
                    listItems = "<option value='' selected>- Select Mode of Transfer -</option>";
                    for (let index = 0; index < data.length; index++) {
                        const element = data[index];
                        listItems+= "<option value='" + element.id + "'>" + element.product_type + "</option>";
                    }
                    $("#transaction").html(listItems);

                }).fail(function(error){
                    console.log(error);
                });
            });

            $('#services').on('change', function(){
                pams = $('#param').val($(this).val());

                var url = '/user/service/value/' + $(this).val();
                $.ajax({
                    type: "GET",
                    url: url
                }).done(function(data){
                    // console.log(data);
                    rate = data.rate;
                    $("#our_rate").val(data.rate);
                    if (data.product_type == "bitcoin") {
                    $("#btc_amount").show();
                    $("#btc_row").show();
                    $('#trans').show();
                } else {
                    $("#btc_amount").hide();
                    $("#btc_row").hide();
                    $('#trans').hide();
                }
                }).fail(function(error){
                    console.log(error);
                });

            });

            $('#transaction').on('change', function(){

                var url = '/user/transaction/value/' + $(this).val();
                $.ajax({
                    type: "GET",
                    url: url
                }).done(function(data){
                    // console.log(data);
                    $('#wallet_address_btc').val(data.address)
                }).fail(function(error){
                    console.log(error);
                });

            });

            $('#amount_dollar').keyup(function(e){
                var amt = $('#amount_dollar').val();
                $('#buy_wallet').text('Send $'+ amt +' worth of BTC to the address below.');

                if (isEmpty(amt)) {
                    amt = 0;
                }
                $.ajax({
                    type: "GET",
                    url: "/user/conversion/"+amt,

                }).done(function(data){
                    $('#btc_amt').val(data);

                    var total = parseInt(amt) * parseInt(rate);
                    $('#amount_naira').val('N'+numberWithCommas(total));
                }).fail(function(error){
                    console.log(error);
                });
            });

            $('#btc_amt').on('click', function(e){
                e.preventDefault();

                var amt = $('#amount_dollar').val();

                if (isEmpty(amt)) {
                    amt = 0;
                }
                $.ajax({
                    type: "GET",
                    url: "/user/conversion/"+amt,

                }).done(function(data){
                    $('#btc_amt').val(data);

                    var total = parseInt(amt) * parseInt(rate);
                    $('#amount_naira').val('N'+numberWithCommas(total));
                }).fail(function(error){
                    console.log(error);
                });
            })

            $('#amount_dollar').keyup(function(e){
                var amt = $('#amount_dollar').val();
                var total = parseInt(amt) * parseInt(rate);
                $('#amount_naira').val('N'+numberWithCommas(total));
            });

        });
        function copyWalletAddress_btc() {
            /* Get the text field */
            var copyText = document.getElementById("wallet_address_btc");
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Copy the text: " + copyText.value);
        }
    </script>
@endsection
