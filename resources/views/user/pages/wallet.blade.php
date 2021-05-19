@extends('user.main')

@section('title')
    <h4>
        <i class="icon icon-money-bag s-48"></i>
        Account Balance
    </h4>
@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce">
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="white">
                            <div class="card">
                                <div class="card-header green text-white b-b-light">
                                    <div class="row justify-content-end">
                                        <div class="col">
                                            Account Balance
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body no-p">
                                    <div class="">
                                        <div class="tab-pane animated fadeIn show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                            @if ($amounts)
                                                <div class="green text-white">
                                                <div class="pt-5 pb-2 pl-5 pr-5">
                                                    <h5 class="font-weight-normal s-14">Total Balance</h5>
                                                    <span class="s-48 font-weight-lighter text-primary">
                                                    <small>N</small>{{ number_format($amounts->balance) }}</span>
                                                        <div class="float-right">
                                                            <span class="icon icon-money-bag s-48"></span>
                                                        </div>
                                                    </div>
                                                    <canvas width="378" height="94" data-chart="spark" data-chart-type="line" data-dataset="[[28,530,200,430]]" data-labels="['a','b','c','d']" data-dataset-options="[
                                                    { borderColor:  '#29c1dc', backgroundColor: '#fe8a00'},
                                                    ]">
                                                </canvas>
                                            </div>
                                            @else
                                                <div class=" b-b" data-height="385">
                                                <div class="table-responsive">
                                                    <div class="card-footer text-black b-b-light">
                                                        <div class="row justify-content-end">
                                                           <div class="col">
                                                            No Approved Order Yet !!!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <button id="btn-WithdrawForm" data-toggle="modal" data-target="#editModal" class="btn btn-primary l-s-1 s-12 text-uppercase">
                            Withdraw
                        </button>
                </div>
                <div class="col-md-6">
                    <div class="white">
                        <div class="card">
                            <div class="card-header green text-white b-b-light">
                                <div class="row justify-content-end">
                                    <div class="col">
                                        Withdawal Requests
                                    </div>
                                </div>
                            </div>
                            @if (count($withdraws) > 0)
                            <br>
                                <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0">
                      <thead>
                        <tr class="no-b">
                          <th>S/N</th>
                          <th>Amount To Withdraw</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($withdraws as $key => $item)
                            <tr>
                            <td>{{ $key+1 }}</td>
                            <td>N{{ number_format($item->amount) }}</td>
                            @if ($item->status == 'pending')
                                <td><span class="badge badge-warning">{{ Str::ucfirst($item->status) }}</span></td>
                                @else
                                <td><span class="badge badge-success">{{ Str::ucfirst($item->status) }}</span></td>
                            @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      </div>
                            @else
                                <div class="card-footer text-black b-b-light">
                                <div class="row justify-content-end">
                                    <div class="col">
                                        No Withdrawal Request Yet !!!
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal">
        <div class="modal-dialog modal-md" role="document">
            <form method="post" action="{{ route('user.wallet.withdraw') }}" id="withdrawlForm">
                @csrf
                <div class="modal-content b-0">
                    <div class="modal-header r-0 green">
                        <h6 class="modal-title text-white" id="modalWithdraw"> <i class="icon icon-money"></i>Withdraw Funds</h6>
                        <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
                    </div>
                    <div class="modal-body  no-b">
                        <div class="form-row">
                            <label class="col-form-label">Amt. To Withdraw</label>
                            <div class="input-group col-sm-8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="icon icon-money"></i> </div>
                                </div>
                                <input type="number" name="amt_to_withdraw" id="amt_to_withdraw" class="form-control" id="amt_paid" required>
                                <div class="invalid-feedback" id="err_amt_to_withdraw"></div>
                            </div>
                        </div>
                        <br />
                    </div>
                    <div class="modal-footer">
                        <button id="btn-WithdrawForm" type="submit" class="btn btn-primary l-s-1 s-12 text-uppercase">
                            Withdraw
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
