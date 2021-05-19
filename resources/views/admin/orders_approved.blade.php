@extends('user.main')

@section('title')
    <h4>
        <i class="icon-orders"></i>
        Orders
    </h4>
@endsection

@section('contents')
     <div class="container-fluid animatedParent animateOnce">
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card r-0 shadow">
                        <div class="card-header white pb-0">
                            <p>List of Orders</p>
                        </div>
                        <br>
                        <div class="table-responsive">

                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                       <th>Order Type</th>
                                       <th>Product Name</th>
                                       <th>Amount</th>
                                       <th>status</th>
                                       <th>Date</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                            <tbody>
                             @foreach ($orders as $key => $order)
                                 <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ Str::ucfirst($order->order_type) }}</td>
                                 @if ($order->catalogue != '')
                                    <td>{{ Str::ucfirst($order->catalogue->product_type) }}</td>
                                @else
                                    <td></td>
                                @endif
                                 <td>${{ $order->amount_dollar }}</td>
                                @if ($order->status == 'pending')
                                     <td><span class="badge badge-warning">{{ $order->status }}</span></td>
                                     @elseif($order->status == 'completed')
                                     <td><span class="badge badge-success">{{ $order->status }}</span></td>
                                     @else
                                     <td><span class="badge badge-danger">{{ Str::ucfirst($order->status) }}</span></td>
                                 @endif
                                <td>
                                <span><i class="icon icon-timer"></i>{{ $order->created_at->format('d-M-Y H:i:s') }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.details', ['id'=> $order->id]) }}"><button class="btn btn-primary btn-sm pull-right"><i class="ti-trash icon-md"></i>View Details</button></a>
                                </td>
                            </tr>
                             @endforeach
                        </table>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
@endsection
