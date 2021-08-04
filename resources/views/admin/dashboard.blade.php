<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@extends('user.main')
<?php
session_start();
use App\Order;
?>
@section('title')
    <h4>
        <i class="icon-orders"></i>
        Users
    </h4>
@endsection
@section('contents')

    <div class="container-fluid animatedParent animateOnce">

                  
                  <style>
                  .wrap{
                      display: flex;
                      overflow: scroll;
                  }
                    .one{
                        width: 30%;
                        height: 80px;
                        background-color: green;
                        float: left;
                        margin-left: 2%;
                        font-size: 20px;
                        padding-top: 30px;
                        padding-left: 30px;
                    }
                    hr{
                        border: 0.5px solid #4a808f;
                    }
             
                     
                  </style>
                      <hr class="hr">
                      <center><i class="fa fa-bar-chart" style='font-size: 18px'></i> <h2 class="text text-primary"><u><b>Analytics and Charts</b></u></h2></center>
                      <hr>
                      <center><h2 class="text text-primary"><b>Number of Visitors on website</b></h2></center>
                      <p class="alert alert-primary">Please, click the link below:[visitorCounter] </p>
                      <?php
                      echo $_SESSION['counter'];
                      ?>
                    <hr>
                    
                     @php
                $facebook =\App\User::where('social_media', 'facebook')->count();
                $instalgram =\App\User::where('social_media', 'instalgram')->count();
                $twitter =\App\User::where('social_media', 'twitter')->count();
                
                
            
                $query =\DB::table('withdrawals');
                    $sum1=$query->sum('withdrawals.amount');
                
                 $query = \DB::table('wallets');
                    $sum_wallets=$query->sum('wallets.balance');
                    
                    $pending=\App\Order::where('status', 'pending')->count();
                    $completed=\App\Order::where('status', 'completed')->count();
                    $cancelled=\App\Order::where('status', 'cancelled')->count();
                    $total=\App\Order::count();
            
               
              @endphp
              
              <style>
               .wrapper20{
                        width: 300px;
                        height: 300px;
                        margin-left: 20%;
                    }
                .chart_real{
                    display: flex;
                    padding-left: 10%;
                }
                
                    .wrapper{
                        width: 300px;
                        height: 300px;
                        display: flex;
                        margin-left: 10%;
                    }
                    
                     .wrapper1{
                        width: 300px;
                        height: 300px;
                    }
              </style>
              
                    <center><h2 class="text text-primary"><b>Social Media Graphs</b></h2></center>
                    
                    <div class="wrapper20">
                        <canvas id="Chart20" width="300" height="300"></canvas>
                    </div>

        <script>
            var ctx = document.getElementById('Chart20').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Facebook', 'Instalgram', 'Twitter'],
                    datasets: [{
                        label: '# Social Media Analytics',
                        data: [{{$facebook}}, {{$instalgram}}, {{$twitter}}],
                        backgroundColor: [
                            '#e77543',
                            '#4a808f',
                            '#006539',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
        <hr>
        <center><h2 class="text text-primary"><b>Transaction Analytics</b></h2></center>
        <center><h4 class="text text-primary"><b>Order and Withdrwal</b></h4></center>
        <!--Transaction analysis begins here-->
        
        @php
        use Carbon\Carbon;
        $dateDay=Carbon::now()->day;
        $dateMonth=Carbon::now()->month;
        $dateYear=Carbon::now()->year;
        
        
        
        $dateDay= \App\Order::whereDay('updated_at', '=', $dateDay)->get()->count();
        
        $dateWeek= \App\Order::where('created_at', '>', Carbon::now()->startOfWeek())
                            ->where('created_at', '<', Carbon::now()->endOfWeek())
                            ->get()->count();
       
        $dateMonth= \App\Order::whereMonth('updated_at', '=', $dateMonth)->get()->count();
        $dateYear= \App\Order::whereYear('updated_at', '=', $dateYear)->get()->count();
        
        
         $dateDay1= \App\Withdrawal::whereDay('updated_at', '=', $dateDay)->get()->count();
        
        $dateWeek1= \App\Withdrawal::where('created_at', '>', Carbon::now()->startOfWeek())
                            ->where('created_at', '<', Carbon::now()->endOfWeek())
                            ->get()->count();
       
        $dateMonth1= \App\Withdrawal::whereMonth('updated_at', '=', $dateMonth)->get()->count();
        $dateYear1= \App\Withdrawal::whereYear('updated_at', '=', Carbon::now()->year)->get()->count();
        @endphp
         <div class="container-fluid animatedParent animateOnce my-3">
          <div class="animated fadeInUpShort">
            <div class="lightSlider" data-item="6" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="7000" data-pager="false" data-auto="true" data-loop="true">
             <div>
                <div class="white text-center p-4" >
                  <h6 class="mb-3">Today Transaction</h6>
                <h4>Order: {{$dateDay}}</h4>
                 <h4>Withdrawals: {{$dateDay1}}</h4>
                  <div class="mt-3"><span class="badge badge-dark r-30"><b>Date: {{Carbon::now()->day}}</b> </span></div>
                  <div class="mt-3"><span class="badge badge-dark r-30"><b>of {{Carbon::now()}}</b> </span></div>
                </div>
              </div>
              
              <div>
                <div class="white text-center p-4">
                  <h6 class="mb-3">Transaction for the week</h6>
                     <h4>Order:{{$dateWeek}}</h4>
                     <h4>Withdrawals: {{$dateWeek1}}</h4>
                  <div class="mt-3"><span class="badge badge-dark r-30"><b>Week: {{Carbon::now()->weekOfMonth}}</b> </span></div>
                </div>
              </div>
              
                <div>
                <div class="white text-center p-4" >
                  <h6 class="mb-3">Transactions for the month</h6>
                  <h4>Order: {{$dateMonth}}</h4>
                  <h4>Withdrawals: {{$dateMonth1}}</h4>
                <!--<span class="s-48 font-weight-lighter text-danger">-->
                  
                <!--</span>-->
                  <div class="mt-3"><span class="badge badge-dark r-30"><b>Month: {{Carbon::now()->month}}</b> </span></div>
                </div>
              </div>
              
              <div>
                <div class="white text-center p-4" >
                  <h6 class="mb-3">Transactions for the Year</h6> 
                <span class="s-48 font-weight-lighter text-danger">
                <h4 style="color: #e77543">Order: {{$dateYear}}</h4>
                <h4>Withdrawals: {{$dateYear1}}</h4>
                </h6>
                </span>
                  <div class="mt-3"><span class="badge badge-dark r-30"><b>Year: {{Carbon::now()->year}}</b> 
                  </span>
                  </div>
                </div>
              </div>
            </div>
        </div><br><br>
            
            <!--End of transaction analysis-->
            <style>
                .chartA{
                    width: 800px;
                    height: 400px;
                    margin-left: 10%;
                    display: flex;
                    flex-direction: row;
                }
            </style>
            
            <!--beginning of daily chart -->
            <center><h4 class="text text-primary"><u><b>Daily(Today) Chart: Order and Withdrwal</b></u></h4></center>
            
            <div class="chartA">
             <div><canvas id="myChartD" style="width: 100%" height="400"></canvas></div>
             &nbsp&nbsp&nbsp&nbsp
             <div><canvas id="myChartD1" style="width: 100%" height="400"></canvas></div>
            </div>
          <hr>
          <script>
            var ctx = document.getElementById('myChartD').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Order', 'Withdrawal'],
                    datasets: [{
                        label: '#Order and Withdrawal Information',
                        data: [<?php echo $dateDay; ?>,<?php echo $dateDay1;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
            
            
             var ctx = document.getElementById('myChartD1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Order', 'Withdrawal'],
                    datasets: [{
                        label: '#Order and Withdrawal Information',
                        data: [<?php echo $dateDay; ?>,<?php echo $dateDay1;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
            <!--end of daily chart -->
            
            <!--beginning of weekly chart -->
            <center><h4 class="text text-primary"><u><b>Weekly Chart: Order and Withdrwal</b></u></h4></center>
            
            <div class="chartA">
              <div><canvas id="myChartW" style="width: 100%" height="400"></canvas></div>
              <div><canvas id="myChartW1" style="width: 100%" height="400"></canvas></div>
            </div>
          <hr>
          <script>
            var ctx = document.getElementById('myChartW').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Order', 'Withdrawal'],
                    datasets: [{
                        label: '#Order and Withdrawal Information',
                        data: [<?php echo $dateWeek; ?>,<?php echo $dateWeek1;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
            
            
            var ctx = document.getElementById('myChartW1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Order', 'Withdrawal'],
                    datasets: [{
                        label: '#Order and Withdrawal Information',
                        data: [<?php echo $dateWeek; ?>,<?php echo $dateWeek1;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
            <!--end of weekly chart -->
            
            <!--beginning of monthly chart -->
            <center><h4 class="text text-primary"><u><b>Monthly chart: Order and Withdrwal</b></u></h4></center>
            
             <div class="chartA">
              <div><canvas id="myChartM" style="width: 100%" height="400"></canvas></div>
              <div><canvas id="myChartM1" style="width: 100%" height="400"></canvas></div>
            </div>
          <hr>
          <script>
            var ctx = document.getElementById('myChartM').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Order', 'Withdrawal'],
                    datasets: [{
                        label: '#Order and Withdrawal Information',
                        data: [<?php echo $dateMonth; ?>,<?php echo $dateMonth1;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
            
            var ctx = document.getElementById('myChartM1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Order', 'Withdrawal'],
                    datasets: [{
                        label: '#Order and Withdrawal Information',
                        data: [<?php echo $dateMonth; ?>,<?php echo $dateMonth1;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
            <!--end of monthly chart -->
            
            <!--beginning of yearly chart -->
            <center><h4 class="text text-primary"><u><b>Yearly Chart: Order and Withdrwal</b></u></h4></center>
            
             <div class="chartA">
              <div><canvas id="myChartY" style="width: 100%" height="400"></canvas></div>
              <div><canvas id="myChartY1" style="width: 100%" height="400"></canvas></div>
          </div>
          <hr>
          <script>
            var ctx = document.getElementById('myChartY').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Order', 'Withdrawal'],
                    datasets: [{
                        label: '#Order Information and Withdrawal ',
                        data: [<?php echo $dateYear; ?>,<?php echo $dateYear1;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
                
                
                var ctx = document.getElementById('myChartY1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Order', 'Withdrawal'],
                    datasets: [{
                        label: '#Order Information and Withdrawal ',
                        data: [<?php echo $dateYear; ?>,<?php echo $dateYear1;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
            <!--end of yearly chart -->
        
        <div class="chart">
              <center><canvas id="myChart" style="width: 100%" height="400"></canvas></center>
          </div>
          </hr>
          <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Order', 'Pending Order', 'Completed Order', 'Cancel order'],
                    datasets: [{
                        label: '#Order Information and Withdrawal ',
                        data: [<?php echo $total; ?>,<?php echo $pending;?>, <?php echo $completed; ?>, <?php echo $cancelled ?>],
                        backgroundColor: [
                            '#4a808f',
                            '#e77543',
                            '#006539',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
                            'rgba(0, 0, 0, 1)',
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
            
        
        @php
                $query =\DB::table('withdrawals');
                    $sum1=$query->sum('withdrawals.amount');
                
                 $query = \DB::table('wallets');
                    $sum_wallets=$query->sum('wallets.balance');
                    
                    $pending=\App\Order::where('status', 'pending')->count();
                    $completed=\App\Order::where('status', 'completed')->count();
                    $cancelled=\App\Order::where('status', 'cancelled')->count();
                    $total=\App\Order::count();
              @endphp
              
              <div class="wrapper">
              <canvas id="Chart1" width="300" height="300"></canvas>
               <canvas id="Chart2" width="300" height="300"></canvas>
            </div>
        <hr>
</div>
</center>
 

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
                            '#e77543',
                            '#006539',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
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
            
            var ctx = document.getElementById('Chart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Completed orders', 'Cancel orders'],
                    datasets: [{
                        label: '# Pending and Completed Orders',
                        data: [<?php echo $completed; ?>, <?php echo $cancelled;?>],
                        backgroundColor: [
                            '#4a808f',
                            '#ffbf00',
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 1)',
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
    </div>


    <!-- Edit code ends -->


@endsection
