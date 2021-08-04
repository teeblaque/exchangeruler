<head>
    <meta http-equiv="refresh" content="120">
</head>
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
            <div class="lightSlider" data-item="6" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="7000" data-pager="false" data-auto="true" data-loop="true">
              @if (Auth::user()->role == 'junior')
                
                <h1>Good</h1>
                
              <div >
                <div class="white text-center p-4">
                  <h6 class="mb-3">Pending Orders</h6>
                <span class="s-48 font-weight-lighter text-secondary">{{ $pending->count() }}</span>
                  <div class="mt-3"><span class="badge badge-secondary r-30"><i class="icon-new_releases mr-2"></i> Pending</span></div>
                </div>
              </div>

              @else
              @php
                $query =\DB::table('withdrawals');
                    $sum1=$query->sum('withdrawals.amount');
                
                 $query = \DB::table('wallets');
                    $sum_wallets=$query->sum('wallets.balance');
              @endphp
              
               @if (Auth::user()->role == 'superadmin')
            <div>
                <div class="white text-center p-4" >
                  <h6 class="mb-3">Total Withdrawals</h6>
                <span class="s-48 font-weight-lighter text-danger"><h3 style="color: #e77543">N{{ number_format($sum1) }}</h3></span>
                  <div class="mt-3"><span class="badge badge-dark r-30"><i class="icon-toll mr-2"></i> All</span></div>
                </div>
              </div>
              
              <div>
                <div class="white text-center p-4">
                  <h6 class="mb-3">Total Balance</h6>
                <span class="s-48 font-weight-lighter text-success"><h3 style="color: #4a808f">N{{ number_format($sum_wallets) }}</h3></span>
                  <div class="mt-3"><span class="badge badge-dark r-30"><i class="icon-toll mr-2"></i> All</span></div>
                </div>
              </div>
              
                  <div>
                <div class="white text-center p-4">
                  <h6 class="mb-3 text-info">Total Orders</h6>
                <span class="s-48 font-weight-lighter text-info">{{ $total->count() }}</span>
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
              <div>
                <div class="white text-center p-4">
                  <h6 class="mb-3">Total Users</h6>
                <span class="s-48 font-weight-lighter text-success" style="color:green !important;">{{ $users->count() }}</span>
                  <div class="mt-3"><span class="badge badge-success r-30" style="background-color: green"><i class="icon-user mr-2"></i>&nbsp; Users&nbsp;</span></div>
                </div>
              </div>
              <div>
               <div class="white text-center p-4">
                <h6 class="mb-3">Total Staffs</h6>
               <span class="s-48 font-weight-lighter text-primary" style="color:indigo !important;">{{ $staffs->count() }}</span>
                <div class="mt-3"><span class="badge badge-primary r-30"  style="background-color: indigo !important"><i class="icon-female mr-2"></i>&nbsp; Staffs &nbsp;</span></div>
              </div>
            </div>
            <div>
              <div class="white text-center p-4">
                <h6 class="mb-3">Total Admin</h6>
              <span class="s-48 font-weight-lighter text-danger">{{ $admin->count() }}</span>
                <div class="mt-3"><span class="badge badge-success r-30"><i class="icon-user mr-2"></i>&nbsp; Administrator&nbsp;</span></div>
              </div>
            </div>
             @endif
                
              @endif
          </div>
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <style>
              .chart{
                  width: 100%;
                  height: 450px;
                  background-color: white;
              }
          </style>
           @if (Auth::user()->role == 'superadmin')
          <!--<div class="chart">-->
          <!--    <canvas id="myChart" style="width: 100%" height="400"></canvas>-->
          <!--</div>-->
          @endif
          <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Order', 'Pending Order', 'Completed Order', 'Cancel order'],
                    datasets: [{
                        label: '#Order Information',
                        data: [<?php echo $total->count() ?>,<?php echo $pending->count() ?>, <?php echo $complete->count() ?>, <?php echo $cancel->count() ?>],
                        backgroundColor: [
                            'rgba(0, 0, 255, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(255, 0, 255, 1)',
                        ],
                        borderColor: [
                            'rgba(255, 0, 0, 1)',
                            'rgba(0, 255, 0, 1)',
                            'rgba(0, 0, 255, 1)',
                            'rgba(100, 100, 0, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>


<style>
.chart_real{
    display: flex;
    padding-left: 10%;
}
    .wrapper{
        width: 300px;
        height: 300px;
    }
    
     .wrapper1{
        width: 300px;
        height: 300px;
    }
</style>

@if (Auth::user()->role == 'superadmin')
<center>
<!--<div class="chart_real">-->
<!--<div class="wrapper">-->
<!--              <canvas id="Chart1" width="300" height="300"></canvas>-->
<!--</div>-->
<!--<div class="wrapper1">-->
<!--              <canvas id="Chart2" width="300" height="300"></canvas>-->
<!--</div>-->
<!--</div>-->
</center>
@endif    
 @if (Auth::user()->role == 'superadmin')
          <script>
            var ctx = document.getElementById('Chart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Total Withdrawals', 'Total Balance'],
                    datasets: [{
                        label: '# Withrawal and Balance Information',
                        data: [<?php echo $sum1; ?>, <?php echo $sum_wallets;?>],
                        backgroundColor: [
                            'rgba(255, 0, 255, 1)',
                            'rgba(0, 0, 255, 1)',
                        ],
                        borderColor: [
                            'rgba(255, 0, 255, 1)',
                            'rgba(0, 0, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

var ctx = document.getElementById('Chart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Completed orders', 'Cancel orders'],
        datasets: [{
            label: '# Pending and Completed Orders',
            data: [<?php echo $complete->count(); ?>, <?php echo $cancel->count();?>],
            backgroundColor: [
                'rgba(0, 255, 0, 1)',
                'rgba(255, 0, 0, 1)',
            ],
            borderColor: [
                'rgba(255, 255, 0, 1)',
                'rgba(0, 0, 0, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});
</script>
@endif
</script>

          <div class="container-fluid animatedParent animateOnce">
            <div class="row my-3">
              <div class="col-md-12">
                <div class="card r-0 shadow">
                  <div class="card-header white">
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
                            <td>{{ $item->order_type }}</td>
                            @if ($item->catalogue != '')
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
