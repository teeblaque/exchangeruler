@extends('user.main')

@section('title')
    <h4>
        <i class="icon-orders"></i>
        Withdrawal Request
    </h4>
@endsection

@section('contents')
     <div class="container-fluid animatedParent animateOnce">
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card r-0 shadow">
                        <div class="card-header white pb-0">
                            <p>WithDrawal Request</p>
                        </div>
                        <br>
                        <div class="table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                       <th>Customer Code</th>
                                       <th>Customer Mobile</th>
                                       <th>Amount To Withdraw</th>
                                       <th>Account Number</th>
                                       <th>Account Name</th>
                                       <th>Bank Name</th>
                                       <th>status</th>
                                       <th>Date</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                            <tbody>
                             @foreach ($withdraws as $key => $order)
                                @if($order->user != '')
                                    @php
                                    $account = App\Account::where('user_id', $order->user->id)->first();
                                @endphp
                                @endif
                                 <tr>
                                 <td>{{ $key+1 }}</td>
                                 @if($order->user != '')
                                    <td>{{ Str::ucfirst($order->user->referal_code) }}</td>
                                    <td>{{ $order->user->mobile }}</td>
                                 @else
                                    <td></td>
                                    <td></td>
                                 @endif
                                 <td>N{{ number_format($order->amount) }}</td>
                                 @if($order->user != '')
                                    @if($account)
                                 <td>{{ $account->account_number }}</td>
                                 <td>{{ $account->account_name }}</td>
                                 <td>{{ $account->bank_name }}</td>
                                 @else
                                 <!--<td></td>-->
                                 <!--<td></td>-->
                                 <!--<td></td>-->
                                 @endif
                                 
                                 @endif
                                @if ($order->status == 'pending')
                                     <td><span class="badge badge-danger">{{ Str::ucfirst($order->status) }}</span></td>
                                     @else
                                     <td><span class="badge badge-success">{{ Str::ucfirst($order->status) }}</span></td>
                                 @endif
                                <td>
                                <span><i class="icon icon-timer"></i>{{ $order->created_at->format('d-M-Y H:i:s') }}</span>
                                </td>
                                <td>
                                @if ($order->status == 'pending')
                                     <button class="btn btn-danger shadow text-white delete" data-toggle="modal" data-target="#editModal"  onclick="fun_approve('{{ $order->id }}')"><i class="ti-pencil icon-md"></i>Confirm Payment</button>
                                    @else
                                    <button class="btn btn-info shadow text-white"><i class="icon-check"></i>Payment Confirmed</button>
                                @endif
                                </td>
                            </tr>
                             @endforeach
                        </table>
                        <input type="hidden" name="hidden_view" id="hidden_view" value="{{ route('admin.accountant.view') }}">
                    </div>
                    <br>
                     <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    {{-- <h4 class="modal-title text-success">Give Reason why you want to Cancel</h4> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.accountant.approve') }}" method="post" enctype="multipart/form-data">
                        @csrf
                             <div class="form-group">
                                <label for="edit_first_name">Payment Screenshot:</label>
                                <input type="file" name="avatar" id="avatar" class="form-control">
                             </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                            <input type="hidden" id="edit_id" name="edit_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit code ends -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function fun_approve(id)
        {
            var view_url = $("#hidden_view").val();
            $.ajax({
                url: view_url,
                type:"GET",
                data: {"id":id},
                success: function(result){
                    console.log(result);
                $("#edit_id").val(result.id);
            }
        });
        }
    </script>
@endsection
