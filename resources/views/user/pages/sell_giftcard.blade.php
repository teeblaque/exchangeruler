@extends('user.main')

@section('title')
    <h4>
        <i class="icon-folder-add"></i>
        Sell Giftcard - Create New Order
    </h4>
@endsection

@section('stylesheet')
     <style>
        #overflowTest {
            color: black;
            padding: 15px;
            width: 80%;
            height: 150px;
            overflow: scroll;
            border: 1px solid #ccc;
        }
    </style>
    <style>
        .tooltip1 {
            position: relative;
            display: inline-block;
        }

        .tooltip1 .tooltiptext1 {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip1 .tooltiptext1::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip1:hover .tooltiptext1 {
            visibility: visible;
            opacity: 1;
        }
    </style>
@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce">
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card r-0 shadow">
                        <div class="card-header white pb-0">
                            <p> Sell Gift Card - Create New Order</p>
                        </div>
                        <div class="card-body">
                            <form id="addOrder" method="POST" action="{{ route('user.sell.giftcard') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="name">Gift-Card Type</label>
                                        <select name="giftcard_type" class="form-control" required>
                                            <option value="" selected>Select Gift Type</option>
                                            <option value="gamers">Off Gamers</option>
                                             <option value="footlocker">Footlocker</option>
                                             <option value="Sell">American Express</option>
                                             <option value="Sell">X-box</option>
                                             <option value="Sell">Gamestop</option>
                                             <option value="Sell">E-bay</option>
                                             <option value="Sell">Amazon</option>
                                        </select>
                                        <div class="invalid-feedback" id="err_type"></div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">What’s the card’s country</label>
                                      <select class="form-control" name="card_country">
                                        <option value="" selected>Select Card Country</option>
                                          <option value="usa">USA</option>
                                      </select>
                                    </div>
                                     <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">Select card type</label>
                                      <select class="form-control" name="card_type" id="card_type">
                                          <option>Physical</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">What’s the card value (USA)?</label>
                                        <input type="text" value="0.00" class="form-control" id="amount" name="amount" placeholder="Total Amount" required>
                                        <div class="invalid-feedback" id="err_amount"></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">Upload Gift-card Image</label>
                                        <input type="file" id="input-file-now" class="dropify" name="avatar"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="sell_rate">We will pay you :</label>
                                        <input disabled type="text" class="form-control" id="get_amount" name="get_amount" value="N0.00" readonly="">
                                        <div class="invalid-feedback" id="err_amount"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button  type="submit" class="btn btn-success pull-right float-right"><i class="anticon anticon-edit"></i> Comfirm </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
