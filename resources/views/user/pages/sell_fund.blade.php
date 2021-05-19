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
                            <p> Sell - Create new Fund</p>
                        </div>
                        <div class="card-body">
                            <form id="addOrder"  action="#" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="name">Fund Type</label>
                                        <select name="order_type" id="order_type" class="form-control">
                                            <option value="">Select Fund Type</option>
                                            <option value="zelle">Zelle</option>
                                            <option value="cashapp">Cashapp</option>
                                            <option value="movo">Movo</option>
                                            <option value="simple">Simple fund</option>
                                            <option value="money lion">Money lion</option>
                                            <option value="Apple Pay">Apple Pay</option>
                                            <option value="Robinhood funds">Robinhood funds</option>
                                            <option value="Edd funds">Edd funds</option>
                                            <option value="Chime">Chime</option>
                                            <option value="Gobank">Gobank</option>
                                            <option value="Go2bank">Go2bank</option>
                                            <option value="Paypal">Paypal</option>
                                            <option value="Turbo funds">Turbo funds</option>
                                            <option value="Walmart money">Walmart money</option>
                                            <option value="Google pay">Google pay</option>
                                            <option value="Venmo">Venmo</option>
                                            <option value="Netspend fund">Netspend fund</option>
                                            <option value="Walmart money card funds">Walmart money card funds</option>
                                            <option value="Key2benefits funds">Key2benefits funds</option>
                                            <option value="lue bird funds">Blue bird funds</option>
                                            <option value="Coinme Voucher">Coinme Voucher</option>
                                            <option value="Payoneer">Payoneer</option>
                                            <option value="Skrill">Skrill</option>
                                            <option value="Neteller">Neteller</option>
                                            <option value="BOA">BOA</option>

                                        </select>
                                        <div class="invalid-feedback" id="err_type"></div>
                                    </div>

                                </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=2348180682860&text=Hello, I am {{ Auth::user()->name }}, I would like to make a enquiry" ><button id="btn-addOrder" type="button" class="btn btn-success pull-right float-right"><i class="anticon anticon-edit"></i> Send Request </button></a>

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

@endsection
