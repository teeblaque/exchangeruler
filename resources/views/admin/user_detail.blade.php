@extends('user.main')
<?php
session_start();
use App\User;

?>
@section('stylesheet')
    <style>
        img {
            pointer-events: none;
        }
    </style>
@endsection

@section('title')
    <h4>
        <i class="icon-orders"></i>
        User Details
    </h4>
@endsection

@section('contents')
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-6">
                    <div class="card white sticky">
                        <div class="card-header">User Details</div>
                        <div class="card-body">
                            @php
                            $_SESSION["id"]=$user->id;
                            @endphp
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">User Name</strong> <span class="float-right s-12"><b>{{ $user->name }}</b></span></li>
                            <li class="list-group-item"><i class="icon icon-eye text-success"></i><strong class="s-12"> Email</strong> <span class="float-right s-12"><b>{{ $user->email }}</b></span></li>
                            <li class="list-group-item"><i class="icon icon-folder text-primary"></i><strong class="s-12">Mobile </strong> <span class="float-right s-12"><b>{{ $user->mobile }}</b></span></li>
                            <li class="list-group-item"><i class="icon icon-folder text-primary"></i><strong class="s-12">Customer Code </strong> <span class="float-right s-12"><b>{{ $user->referal_code }}</b></span></li>
                             <li class="list-group-item"><i class="icon icon-money text-primary"></i><strong class="s-12">Date Joined</strong> <span class="float-right s-12"><b>{{ $user->created_at->format('d-M-Y') }}</b></span></li>
                        </ul>
                        </div>
                    </div>

                        <br>
                        <div class="card white sticky">
                            <div class="card-header">User Account Details</div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @php
                                        $account = App\Account::where('user_id', $user->id)->first();
                                    @endphp
                                @if ($account)
                                    <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Account Name</strong> <span class="float-right s-12"><b>{{ $account->account_name }}</b></span></li>
                                <li class="list-group-item"><i class="icon icon-eye text-success"></i><strong class="s-12"> Account Number</strong> <span class="float-right s-12"><b>{{ $account->account_number }}</b></span></li>
                                <li class="list-group-item"><i class="icon icon-folder text-primary"></i><strong class="s-12">Bank Name </strong> <span class="float-right s-12"><b>{{ $account->bank_name }}</b></span></li>
                                @endif
                            </ul>
                            </div>
                        </div>

                </div>
                <div class="col-md-6">
                    <div class="card white sticky">
                        <div class="card-header">Last Login Detail</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Last Login</strong> <span class="float-right s-12"><b>{{$user->last_login }}</b></span></li>
                            </ul>

                        </div>
                    </div><br><br>
                    
                     <!---  start-->
                      @php
                        $withdrawal = App\Withdrawal::where('user_id', $user->id)->first();
                        @endphp
                        @if($withdrawal)
                     <div class="card white sticky">
                        <div class="card-header">Withdrawal</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Withdrawal</strong> <span class="float-right s-12"><b>
                                    {{$withdrawal->amount}}
                                </b></span></li>
                            </ul>

                        </div>
                    </div>
                    @endif

                
                 @php
                        $wallet = App\Wallet::where('user_id', $user->id)->first();
                        @endphp
                        @if($wallet)
                <div class="card white sticky">
                        <div class="card-header">Initial Balance</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Initial Balance</strong> <span class="float-right s-12"><b>
                                    {{$wallet->balance+ $withdrawal->amount}}
                                </b></span></li>
                            </ul>

                        </div>
                    </div>
                </div>
               
                <div class="card white sticky">
                        <div class="card-header">Current Balance</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Current  Balance</strong> <span class="float-right s-12"><b>
                                    &nbsp&nbsp&nbsp&nbsp&nbsp{{$wallet->balance}}
                                </b></span></li>
                            </ul>

                        </div>
                    </div>
                </div>
                @endif

                <div class="card white sticky">
                        <div class="card-header">Credit User</div>
                        <div class="card-body">
                           <a href='/admin/user_balance/{{$user->id}}' class="btn btn-primary" type="submit">Credit user Balance</a>
                        </div>
                    </div>
                </div>
                <!---  end-->

                    <div class="card white sticky">
                        <div class="card-header">Total Transactions</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Total</strong> <span class="float-right s-12"><b>{{ $orders->count() }}</b></span></li>
                            </ul>

                        </div>
                    </div>
                </div>

        </div><br><br>

    </div>
@endsection
