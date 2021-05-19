@extends('user.main')

@section('title')
    <h4>
        <i class="icon-box"></i>
        Dashboard
    </h4>
@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce my-3">
            <div class="animated fadeInUpShort">
              <div class="lightSlider" data-item="4" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="3000" data-pager="false" data-auto="true" data-loop="false">
                <div>
                  <div class="white text-center p-4">
                    <h6 class="mb-3">Total Orders</h6>
                  <span class="s-48 font-weight-lighter text-dark">{{ $total->count() }}</span>
                    <div class="mt-3"><span class="badge badge-dark r-30"><i class="icon-toll mr-2"></i> All</span></div>
                  </div>
                </div>

                <div>
                  <div class="white text-center p-4">
                    <h6 class="mb-3">Pending Orders</h6>
                  <span class="s-48 font-weight-lighter text-secondary">{{ $pending->count() }}</span>
                    <div class="mt-3"><span class="badge badge-secondary r-30"><i class="icon-new_releases mr-2"></i> Pending</span></div>
                  </div>
                </div>
                <div>
                  <div class="white text-center p-4">
                    <h6 class="mb-3">Completed Orders</h6>
                  <span class="s-48 font-weight-lighter text-success">{{ $complete->count() }}</span>
                    <div class="mt-3"><span class="badge badge-success r-30"><i class="icon-check mr-2"></i> Completed</span></div>
                  </div>
                </div>
                <div>
                  <div class="white text-center p-4">
                    <h6 class="mb-3">Cancelled Orders</h6>
                  <span class="s-48 font-weight-lighter text-danger">{{ $cancel->count() }}</span>
                    <div class="mt-3"><span class="badge badge-danger r-30"><i class="icon-times mr-2"></i> Cancelled</span></div>
                  </div>
                </div>
              </div>
              <div class="animatedParent animateOnce">
                <div class="row my-3">
                  <div class="col-12">
                    <div class="card r-0 shadow">
                      <div class="card-header white pb-0">
                        <p>Last 10 Orders</p>
                      </div>
                      <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0">
                      <thead>
                        <tr class="no-b">
                          <th>S/N</th>
                          <th>Order Type</th>
                          <th>Product Name</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transactions as $key => $item)
                            <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ Str::ucfirst($item->order_type) }}</td>
                            @if($item->catalogue != '')
                                <td>{{ Str::ucfirst($item->catalogue->product_type) }}</td>
                                @else
                                <td></td>
                            @endif
                            <td>${{ $item->amount_dollar }}</td>
                            @if ($item->status == 'pending')
                                     <td><span class="badge badge-warning">{{ Str::ucfirst($item->status) }}</span></td>
                                     @elseif($item->status == 'completed')
                                     <td><span class="badge badge-success">{{ Str::ucfirst($item->status) }}</span></td>
                                     @else
                                     <td><span class="badge badge-danger">{{ Str::ucfirst($item->status) }}</span></td>
                                 @endif
                          <td>
                            <a href="{{ route('admin.orders.details', ['id'=> $item->id]) }}"><button class="btn btn-primary btn-sm pull-right"><i class="ti-trash icon-md"></i>View Details</button></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="control-sidebar-bg shadow white fixed"></div>
          </div>
@endsection

