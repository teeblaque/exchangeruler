@extends('user.main')

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
        Order Details
    </h4>
@endsection

@section('contents')
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-6">
                    <div class="card white sticky">
                        <div class="card-header">User Details</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'accountant' || Auth::user()->role == 'user')
                                @if($orders->user != '')
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">User Name</strong> <span class="float-right s-12"><b>{{ $orders->user->name }}</b></span></li>
                            <li class="list-group-item"><i class="icon icon-eye text-success"></i><strong class="s-12"> Email</strong> <span class="float-right s-12"><b>{{ $orders->user->email }}</b></span></li>
                            <li class="list-group-item"><i class="icon icon-folder text-primary"></i><strong class="s-12">Mobile </strong> <span class="float-right s-12"><b>{{ $orders->user->mobile }}</b></span></li>
                                @endif
                            @endif

                            @if($orders->user != '')
                                <li class="list-group-item"><i class="icon icon-folder text-primary"></i><strong class="s-12">Customer Code </strong> <span class="float-right s-12"><b>{{ $orders->user->referal_code }}</b></span></li>
                            <li class="list-group-item"><i class="icon icon-money text-primary"></i><strong class="s-12">Date Joined</strong> <span class="float-right s-12"><b>{{ $orders->user->created_at->format('d-M-Y') }}</b></span></li>
                            @endif

                        </ul>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'accountant' || Auth::user()->role == 'superadmin')
                        <br>
                        <div class="card white sticky">
                            <div class="card-header">User Account Details</div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @php
                                        $account = App\Account::where('user_id', $orders->user_id)->first();
                                    @endphp
                                @if ($account)
                                    <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Account Name</strong> <span class="float-right s-12"><b>{{ $account->account_name }}</b></span></li>
                                <li class="list-group-item"><i class="icon icon-eye text-success"></i><strong class="s-12"> Account Number</strong> <span class="float-right s-12"><b>{{ $account->account_number }}</b></span></li>
                                <li class="list-group-item"><i class="icon icon-folder text-primary"></i><strong class="s-12">Bank Name </strong> <span class="float-right s-12"><b>{{ $account->bank_name }}</b></span></li>
                                @endif
                            </ul>
                            </div>
                        </div>
                    @endif

                    @if ($orders->status == 'cancelled')
                        <br>
                        <div class="card white sticky">
                            <div class="card-header">Cancellation Feedback</div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    @php
                                        $result = App\Terminate::where('order_id', $orders->id)->first();
                                    @endphp
                                @if($result)
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Reason</strong> <span class="float-right s-12"><b>{{ $result->reason }}</b></span></li>
                                <li class="list-group-item"><i class="icon icon-eye text-success"></i><strong class="s-12">Avatar</strong> <span class="float-right s-12"><a href="{{ url('images/cancel/'.$result->avatar) }}"><img src="{{ url('images/cancel/'.$result->avatar) }}" alt="reson avatar" style="width: 100px; height: 100px;"></a></span></li>
                                @endif
                            </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="card white sticky">
                        <div class="card-header">Transaction Details</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Order Type</strong> <span class="float-right s-12"><b>{{Str::ucfirst( $orders->order_type) }}</b></span></li>
                                @if (Auth::user()->role == 'user')
                                    @if ($orders->invalid != '')
                                    <li class="list-group-item"><i class="icon icon-eye text-success"></i><strong class="s-12">Admin Invalid Status</strong> <span class="float-right s-12"><span class="badge badge-danger">Invalid</span></span></li>
                                    @else
                                    <li class="list-group-item"><i class="icon icon-eye text-success"></i><strong class="s-12">Status</strong> <span class="float-right s-12"><span class="badge badge-warning">{{ Str::ucfirst($orders->status) }}</span></span></li>
                                @endif
                                @else
                                    <li class="list-group-item"><i class="icon icon-eye text-success"></i><strong class="s-12">Status</strong> <span class="float-right s-12"><span class="badge badge-warning">{{ Str::ucfirst($orders->status) }}</span></span></li>
                                @endif
                                @if($orders->catalogue != '')
                                    <li class="list-group-item"><i class="icon icon-folder text-primary"></i><strong class="s-12">Order Product </strong> <span class="float-right s-12"><b>{{ $orders->catalogue->product_name }}({{ $orders->catalogue->denomination }})</b></span></li>
                                @endif
                                @if ($orders->blockchain != null)
                                    <li class="list-group-item"><i class="icon icon-money text-primary"></i><strong class="s-12">Transaction Mode</strong> <span class="float-right s-12"><b>{{ Str::ucfirst($orders->blockchain->product_type) }}</b></span></li>
                                @endif

                                <li class="list-group-item"><i class="icon icon-money text-primary"></i><strong class="s-12"> </strong>Order Amount <span class="float-right s-12"><b>${{ $orders->amount_dollar }}</b></span></li>
                                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->role == 'user')
                                    {{-- <li class="list-group-item"><i class="icon icon-address-card-o text-warning"></i><strong class="s-12">Amount To Receive(N)</strong> <span class="float-right s-12">{{ $orders->amount_naira }}</span></li> --}}
                            @if($orders->user != '')
                                <input type="hidden" value="{{ $orders->user->id }}" name="user_id" id="user_id" class="form-control">
                                @else
                                <input type="hidden" value="0" name="user_id" id="user_id" class="form-control">
                            @endif
                            <input type="hidden" value="{{ $orders->amount_naira }}" name="amt_naira" id="amt_naira" class="form-control">
                                @endif
                                <li class="list-group-item"><i class="icon icon-address-card-o text-warning"></i><strong class="s-12">Order Rate ($)</strong> <span class="float-right s-12">{{ $orders->our_rate }}</span></li>
                                <li class="list-group-item"><i class="icon icon-address-card-o text-warning"></i><strong class="s-12">Transaction Date</strong> <span class="float-right s-12">{{ $orders->created_at->format('d-M-Y') }}</span></li>
                            </ul>
                        <div>
                            <br>
                            <label for="">Order Note</label>
                            <textarea cols="30" rows="4" class="form-control">{{ $orders->order_note }}</textarea>
                        </div>
                        <div>
                            <br>
                            <label for="">Order Image</label><br>
                           @foreach ($orders->images as $item)
                           @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                               <a href="{{ url('images/order/'.$item->avatar) }}" target="_blank"><img src="{{ url('images/order/'.$item->avatar) }}" alt="order" style="width: 100px; height: 100px;"></a>
                           @elseif(Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                               <img src="{{ url('images/order/'.$item->avatar) }}" alt="order" style="width: 100px; height: 100px;">
                           @endif

                           @endforeach
                        </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-12 text-center">
                    <br><br><br>
                    @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'junior')
                        @if ($orders->status == 'pending')
                            <button class="btn btn-info shadow text-white approve" onclick="fun_accept('{{ $orders->id }}')"><i class="icon-check"></i> Accept Order</button>
                        @endif
                            @if ($orders->status == 'validated')
                                <button class="btn btn-primary shadow text-white approve" onclick="fun_approve('{{ $orders->id }}')"><i class="icon-check"></i> Approve Order</button>
                            @endif
                            {{-- @if ($orders->status == 'pending')
                                <button class="btn btn-danger shadow text-white delete" data-toggle="modal" data-target="#editModal"  onclick="fun_cancel('{{ $orders->id }}')"><i class="ti-pencil icon-md"></i>Cancel Order</button>
                            @endif --}}
                            @if ($orders->status == 'not valid')
                                <button class="btn btn-danger shadow text-white delete" data-toggle="modal" data-target="#editModals"><i class="icon-check"></i> Cancel Orders</button>
                            @endif
                    @endif

                    @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                        @if ($orders->status == 'accepted' || $orders->status == 'not valid')
                         <button class="btn btn-primary shadow text-white approve" onclick="fun_payment('{{ $orders->id }}')"><i class="icon-money"></i>Validate Order</button>
                            {{-- <button class="btn btn-info shadow text-white approve" onclick="fun_validate('{{ $orders->id }}')"><i class="icon-check"></i> Validate Order</button> --}}
                        @endif
                        <button class="btn btn-primary shadow text-white delete" data-toggle="modal" data-target="#editModal"  onclick="fun_cancel('{{ $orders->id }}')"><i class="ti-pencil icon-md"></i>Update Order Amount</button>
                            @if ($orders->status == 'validated' || $orders->status == 'accepted') 
                            <!--<button class="btn btn-danger shadow text-white approve" onclick="fun_can('{{ $orders->id }}')"><i class="icon-check"></i> Cancel Order</button>-->
                                <button class="btn btn-danger shadow text-white delete" data-toggle="modal" data-target="#editModals"><i class="ti-pencil icon-md"></i>Cancel Order</button>
                             @endif 
                            
                    @endif

                    {{-- @if ($orders->status == 'approved' && Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                            <button class="btn btn-primary shadow text-white approve" onclick="fun_payment('{{ $orders->id }}')"><i class="icon-money"></i>Add Fund To Wallet</button>
                        @endif --}}

                </div>
                <input type="hidden" name="hidden_cancel" id="hidden_cancel" value="{{ route('admin.orders.cancel') }}">
                <input type="hidden" name="hidden_approve" id="hidden_approve" value="{{ route('admin.orders.approve') }}">
                <input type="hidden" name="hidden_accept" id="hidden_accept" value="{{ route('admin.orders.accept') }}">
                <input type="hidden" name="hidden_payment" id="hidden_payment" value="{{ route('admin.orders.payment') }}">
                <input type="hidden" name="hidden_validate" id="hidden_validate" value="{{ route('admin.orders.validate') }}">

        </div><br><br>

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
                    <form action="{{ route('admin.cancelorder') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="edit_first_name"> Amount in dollar:</label>
                                <input type="text" name="new_amt" id="new_amt" class="form-control" value="{{ $orders->amount_dollar }}" required>
                             </div>
                             
                             <div class="form-group">
                                <label for="edit_first_name"> Amount in Naira:</label>
                                <input type="text" name="new_amt_naira" id="new_amt_naira" class="form-control" value="{{ $orders->amount_naira }}" required>
                             </div>

                            <div class="form-group">
                                <label for="edit_first_name"> Reason:</label>
                                <textarea name="reason" id="reason" cols="5" rows="3" class="form-control"></textarea>
                             </div>

                             <div class="form-group">
                                <label for="edit_first_name"> Image:</label>
                                <input type="file" name="avatar" id="avatar" class="form-control">
                             </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                            <input type="hidden" id="order_id" name="order_id" value="{{ $orders->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   
    </div>
     <!-- Edit code ends -->
     
     <!-- Edit Modal start -->
    <div class="modal fade" id="editModals" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    {{-- <h4 class="modal-title text-success">Give Reason why you want to Cancel</h4> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.cancelorders') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="edit_first_name"> Reason:</label>
                                <textarea name="reasons" id="reasons" cols="5" rows="3" class="form-control"></textarea>
                             </div>

                             <div class="form-group">
                                <label for="edit_first_name"> Image:</label>
                                <input type="file" name="avatars" id="avatars" class="form-control">
                             </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                            <input type="hidden" id="order_ids" name="order_ids" value="{{ $orders->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   
    </div>
     <!-- Edit code ends -->
@endsection

@section('scripts')
    <script>
        function fun_can(id)
        {
            console.log(id);
            var conf = confirm("Are you sure you want to cancel this order??");
            if(conf){
                var delete_url = $("#hidden_cancel").val();
                $.ajax({
                    url: delete_url,
                    type:"POST",
                    data: {"id":id,  _token: "{{ csrf_token() }}" },
                    success: function(response){
                        alert(response);
                        location.reload();
                        // console.log(response);
                    }
                });
            }
            else{
                return false;
            }
        }

        function fun_validate(id)
        {
            console.log(id);
            var conf = confirm("Are you sure you want to validate this order??");
            if(conf){
                var delete_url = $("#hidden_validate").val();
                $.ajax({
                    url: delete_url,
                    type:"POST",
                    data: {"id":id, _token: "{{ csrf_token() }}" },
                    success: function(response){
                        alert(response);
                        location.reload();
                        // console.log(response);
                    }
                });
            }
            else{
                return false;
            }
        }

        function fun_accept(id)
        {
            console.log(id);
            var conf = confirm("Are you sure you want to accept this order??");
            if(conf){
                var delete_url = $("#hidden_accept").val();
                $.ajax({
                    url: delete_url,
                    type:"POST",
                    data: {"id":id, _token: "{{ csrf_token() }}" },
                    success: function(response){
                        alert(response);
                        location.reload();
                        // console.log(response);
                    }
                });
            }
            else{
                return false;
            }
        }

        function fun_approve(id)
        {
            console.log(id);
            var conf = confirm("Are you sure you want to approve this order??");
            if(conf){
                var delete_url = $("#hidden_approve").val();
                $.ajax({
                    url: delete_url,
                    type:"POST",
                    data: {"id":id, _token: "{{ csrf_token() }}" },
                    success: function(response){
                        alert(response);
                        location.reload();
                        // console.log(response);
                    }
                });
            }
            else{
                return false;
            }
        }

        function fun_payment(id)
        {
            var conf = confirm("Are you sure you want to confirm payment for this order??");
            if(conf){
                var user_id = $('#user_id').val();
                var amt = $('#amt_naira').val();
                console.log(amt);
                var payment_url = $("#hidden_payment").val();
                $.ajax({
                    url: payment_url,
                    type:"POST",
                    data: {"id":id, "user_id": user_id, "amt_naira": amt, _token: "{{ csrf_token() }}" },
                    success: function(response){
                        alert(response);
                        location.reload();
                        // console.log(response);
                    }
                });
            }
            else{
                return false;
            }
        }
    </script>
@endsection
