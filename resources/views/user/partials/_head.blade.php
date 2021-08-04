<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ExchangeRuler - User Dashboard</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="refresh" content="120">
 <link href="{{ asset('favicon.png') }}" rel="icon">
  <link rel="stylesheet" href="{{ asset('userback/css/panel/app.css') }}">
  <link href="{{ asset('userback/css/panel/font-awesome.min.css" rel="stylesheet') }}">

  {{-- <link href="{{ asset('userback/css/panel/toastr.min.css" rel="stylesheet" type="text/css') }}" /> --}}
  {{-- <link href="{{ asset('userback/css/panel/jquery-editable-select.min.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('userback/css/panel/medium-zoom.css') }}" rel="stylesheet" type="text/css"> --}}
   <link rel="stylesheet" href="{{ asset('userback/css/main.css') }}">
  <script src="{{ asset('userback/js/modernizr-2.6.2.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('userback/dropify/dropify.min.css') }}">

<script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>

<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
    


 <meta charset="UTF-8">
    <title>chatapp</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
    
    
@yield('stylesheet')


