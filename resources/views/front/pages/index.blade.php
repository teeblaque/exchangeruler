<?php
session_start();
?>
@extends('front.welcome')

 @section('stylesheets')
<meta http-equiv="refresh" content="120">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <style>
     @media only screen
  and (min-device-width: 320px)
  and (max-device-width: 480px)
  and (-webkit-min-device-pixel-ratio: 2) {
.img-fluid{width:100%;height:100%;}
}

/* Portrait */
@media only screen
  and (min-device-width: 320px)
  and (max-device-width: 480px)
  and (-webkit-min-device-pixel-ratio: 2)
  and (orientation: portrait) {.img-fluid{width:100%;height:100%;}
}

/* Landscape */
@media only screen
  and (min-device-width: 320px)
  and (max-device-width: 480px)
  and (-webkit-min-device-pixel-ratio: 2)
  and (orientation: landscape) {
.img-fluid{width:100%;height:100%;}
}

/* ----------- iPhone 5, 5S, 5C and 5SE ----------- */

/* Portrait and Landscape */
@media only screen
  and (min-device-width: 320px)
  and (max-device-width: 568px)
  and (-webkit-min-device-pixel-ratio: 2) {
.img-fluid{width:100%;height:100%;}
}

/* Portrait */
@media only screen
  and (min-device-width: 320px)
  and (max-device-width: 568px)
  and (-webkit-min-device-pixel-ratio: 2)
  and (orientation: portrait) {.img-fluid{width:100%;height:100%;}
}

/* Landscape */
@media only screen
  and (min-device-width: 320px)
  and (max-device-width: 568px)
  and (-webkit-min-device-pixel-ratio: 2)
  and (orientation: landscape) {.img-fluid{width:100%;height:100%;}

}

/* ----------- iPhone 6, 6S, 7 and 8 ----------- */

/* Portrait and Landscape */
@media only screen
  and (min-device-width: 375px)
  and (max-device-width: 667px)
  and (-webkit-min-device-pixel-ratio: 2) { .img-fluid{width:100%;height:100%;}

}

/* Portrait */
@media only screen
  and (min-device-width: 375px)
  and (max-device-width: 667px)
  and (-webkit-min-device-pixel-ratio: 2)
  and (orientation: portrait) { .img-fluid{width:100%;height:100%;}

}

/* Landscape */
@media only screen
  and (min-device-width: 375px)
  and (max-device-width: 667px)
  and (-webkit-min-device-pixel-ratio: 2)
  and (orientation: landscape) { .img-fluid{width:100%;height:100%;}

}

/* ----------- iPhone 6+, 7+ and 8+ ----------- */

/* Portrait and Landscape */
@media only screen
  and (min-device-width: 414px)
  and (max-device-width: 736px)
  and (-webkit-min-device-pixel-ratio: 3) { .img-fluid{width:100%;height:100%;}

}

/* Portrait */
@media only screen
  and (min-device-width: 414px)
  and (max-device-width: 736px)
  and (-webkit-min-device-pixel-ratio: 3)
  and (orientation: portrait) { .img-fluid{width:100%;height:100%;}

}

/* Landscape */
@media only screen
  and (min-device-width: 414px)
  and (max-device-width: 736px)
  and (-webkit-min-device-pixel-ratio: 3)
  and (orientation: landscape) {
.img-fluid{width:100%;height:100%;}
}

/* ----------- iPhone X ----------- */

/* Portrait and Landscape */
@media only screen
  and (min-device-width: 375px)
  and (max-device-width: 812px)
  and (-webkit-min-device-pixel-ratio: 3) { .img-fluid{width:100%;height:100%;}

}

/* Portrait */
@media only screen
  and (min-device-width: 375px)
  and (max-device-width: 812px)
  and (-webkit-min-device-pixel-ratio: 3)
  and (orientation: portrait) {
.img-fluid{width:100%;height:100%;}
}

/* Landscape */
@media only screen
  and (min-device-width: 375px)
  and (max-device-width: 812px)
  and (-webkit-min-device-pixel-ratio: 3)
  and (orientation: landscape) {
.img-fluid{width:100%;height:100%;}
}
 </style>

 @endsection

 @section('contents')


  <div section-scroll='0' style="height: 600px" class="wd_scroll_wrap" style="opacity: 1">
     <section style="height: 600px" class="slider-area" style="opacity: 1">
        <canvas id="canvas" style="opacity: 1; top:0">
          <div section-scroll='1' class="wd_scroll_wrap">
    <section class="about-area pd-t70 pd-b100 jarallax bg-img">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="btc_timer_section_wrapper">
              <div id="clockdiv">
                <div>
                  <span class="days"></span>
                  <div class="smalltext">Days</div>
                </div>
                <div>
                  <span class="hours"></span>
                  <div class="smalltext">Hours</div>
                </div>
                <div>
                  <span class="minutes"></span>
                  <div class="smalltext">Minutes</div>
                </div>
                <div>
                  <span class="seconds"></span>
                  <div class="smalltext">Seconds</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
      </canvas>
         <div id="particles-js">
             <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 <div class="carousel-inner" role="listbox">
                     
                     
                     <div class="carousel-nevigation" style="z-index: 1">
                         <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">
                             <i class="fa fa-angle-left"></i>
                         </a>
                         <a class="next" href="#carousel-example-generic" role="button" data-slide="next">
                             <i class="fa fa-angle-right"></i>
                     -    </a>
                     </div>
                     
                     
                     
                     <div class="item active">
                         <div class="carousel-captions caption-1">
                             <div class="container">
                                 <div class="row">
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                         <div class="slider-content">
                                             <ul style="margin-bottom: -8% !important">
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon1">
                                                     <h2>Buy </h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon2">
                                                     <h2>and</h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon3">
                                                     <h2>Sell</h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon4">
                                                     <h2>Your</h2>
                                                 </li>
                                             </ul>
                                             <h2 data-animation="animated bounceInLeft" style="margin:-4% !important">
                                                 <strong style="font-size: 80px;color: #f29c4e !important">&nbspBitcoin
                                                 </strong> <br><span>&nbsp&nbsp;With Ease</span> </h2>
                                             <br>
                                             <div class="buttons">
                                                 <a href="{{ route('register') }}" class="btn2"
                                                     data-animation="animated bounceInUp">Get Started</a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                                         <div class="btc_slider_about_img" data-animation="animated bounceInDown">
                                             <img src="{{ asset('test/images/about/logo_2.png') }}" width="250" height="250" alt="about_img"
                                                 class="rotate8d">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                      <div class="item">
                         <div class="carousel-captions caption-1">
                             <div class="container">
                                 <div class="row">
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                         <div class="slider-content">
                                             <ul style="margin-bottom: -8% !important">
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon1">
                                                     <h2>Buy </h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon2">
                                                     <h2>and</h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon3">
                                                     <h2>Sell</h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon4">
                                                     <h2>Your</h2>
                                                 </li>
                                             </ul>
                                             <h2 data-animation="animated bounceInLeft" style="margin:-4% !important">
                                                 <strong style="font-size: 80px;color: #f29c4e !important">&nbspEthereum
                                                 </strong> <br><span>&nbsp&nbsp;With Ease</span> </h2>
                                             <br>
                                             <div class="buttons">
                                                 <a href="{{ route('register') }}" class="btn2"
                                                     data-animation="animated bounceInUp">Get Started</a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                                         <div class="btc_slider_about_img" data-animation="animated bounceInDown">
                                             <img src="{{ asset('test/images/about/ent.png') }}" width="250" height="250" alt="about_img"
                                                 class="rotate8d">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="carousel-captions caption-1">
                             <div class="container">
                                 <div class="row">
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                         <div class="slider-content">
                                             <ul style="margin-bottom: -8% !important">
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon1">
                                                     <h2>Buy </h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon2">
                                                     <h2>and</h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon3">
                                                     <h2>Sell</h2>
                                                 </li>
                                                 <li data-animation="animated bounceInDown" class="slider_social_icon4">
                                                     <h2>Your</h2>
                                                 </li>
                                             </ul>
                                             <h2 data-animation="animated bounceInLeft" style="margin:-4% !important">
                                                 <strong style="font-size: 80px;color: #f29c4e !important">&nbspUSDT
                                                 </strong> <br><span>&nbsp&nbsp;With Ease</span> </h2>
                                             <br>
                                             <div class="buttons">
                                                 <a href="{{ route('register') }}" class="btn2"
                                                     data-animation="animated bounceInUp">Get Started</a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                                         <div class="btc_slider_about_img" data-animation="animated bounceInDown">
                                             <img src="{{ asset('test/images/about/usdt.png') }}" width="250" height="250" alt="about_img"
                                                 class="rotate8d">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="item">
                         <div class="container">
                             <div class="row">
                                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                     <div class="slider-content">
                                         <ul style="margin-bottom: -8% !important">
                                             <li data-animation="animated bounceInDown" class="slider_social_icon1">
                                                 <h2>Buy </h2>
                                             </li>
                                             <li data-animation="animated bounceInDown" class="slider_social_icon2">
                                                 <h2>and</h2>
                                             </li>
                                             <li data-animation="animated bounceInDown" class="slider_social_icon3">
                                                 <h2>Sell</h2>
                                             </li>
                                             <li data-animation="animated bounceInDown" class="slider_social_icon4">
                                                 <h2>Your</h2>
                                             </li>
                                         </ul>
                                         <h2 data-animation="animated bounceInLeft" style="margin:-4% !important">
                                             <strong style="font-size: 80px;color: #f29c4e !important">&nbspGiftCard
                                             </strong> <br><span>&nbsp&nbsp;With Ease</span> </h2>
                                         <br>
                                         <div class="buttons">
                                             <a href="{{ route('register') }}" class="btn2"
                                                 data-animation="animated bounceInUp">Get Started</a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  hidden-xs hidden-sm">
                                     <div class="btc_slider_about_img" data-animation="animated bounceInDown">
                                         <img src="{{ asset('test/images/about/GIFTCARDS.png') }}" style="width: 250px; height: 250px;" alt="about_img"
                                             class="spin4">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="carousel-nevigation" style="z-index: 1">
                         <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">
                             <i class="fa fa-angle-left"></i>
                         </a>
                         <a class="next" href="#carousel-example-generic" role="button" data-slide="next">
                             <i class="fa fa-angle-right"></i>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     


  <style>
      .chart{
          width: 50%;
          margin-left:30%;
          height: 250px;
          font-size: 30px;
      }
  </style>

  <main id="main">
                <?php
                  $_SESSION['counter']=
                  '<div class="chart">
                   <a href="https://free-hit-counters.net/">Analyctics: Access more information here by clicking</a>
                   <script type="text/javascript" src="https://www.freevisitorcounters.com/auth.php?id=5cfd60b6eba63e2f8226cc01619a8fc1361f4a03"></script>
                    <script type="text/javascript" src="https://freevisitorcounters.com/en/home/counter/839605/t/0">
                    </script>
                   </div>';
                ?>

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <center><div style="width:80px; height:60px"><img class="card-img-top" src="/images/bitcoin.jpg" alt="Card image"></div></center><br>
              <p class="description">Buy and sell your Bitcoin with ease</p>
              <center><a href="{{ route('register') }}" class="btn btn-primary">Get started</a></center>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <center><div style="width:80px; height:60px"><img class="card-img-top" src="/images/ethereum1.png" alt="Card image"></div></center><br>
              <p class="description">Buy and sell your Ethereum with ease</p>
              <center><a href="{{ route('register') }}" class="btn btn-primary">Get started</a></center>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <center><div style="width:80px; height:60px"><img class="card-img-top" src="/images/usdt1.jpg" alt="Card image"></div></center><br>
              <p class="description">Buy and sell your USDT with ease</p>
              <center><a href="{{ route('register') }}" class="btn btn-primary">Get started</a></center>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <center><div style="width:80px; height:60px"><img class="card-img-top" src="/images/giftcard.jpg" alt="Card image"></div></center><br>
              <p class="description">Buy and sell your Giftcard with ease</p>
              <center><a href="{{ route('register') }}" class="btn btn-primary">Get started</a></center>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <hr style="2px red solid">
    <section id="clients" class="clients section-bg" style="background-color: white">
      <div class="container" data-aos="zoom-in" style="background-color: white">

        <center>
          <div class="row" style="background-color: white">
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" style="border: 0px solid white; color: black; background-color: white; margin-left: 3%">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <center><img class="card-img-top" src="assets/img/clients/itune.jpeg" style="width:140px; height:110px"></center><br>
              <p class="description" style="color: black"><b>iTunes encode</b></p>
             WE ARE BUYING AT THE RATE OF N289/$
            </div>
          </div>

          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" style="border: 0px solid #7284b7; color: black; background-color: white; margin-left: 3%">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <center><img class="card-img-top" src="assets/img/clients/onevanilla.jpeg" style="width:140px; height:100px"></center><br>
              <p class="description" style="color: black"><b>Onevanilla</b></p>
              WE ARE BUYING AT THE RATE OF N315/$
            </div>
          </div>

          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" style="border: 0px solid white; color: black; background-color: white; margin-left: 3%">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <center><img class="card-img-top" src="assets/img/clients/ebay.jpeg" style="width:140px; height:100px"></center><br>
              <p class="description" style="color: black"><b>Ebay</b></p>
              WE ARE BUYING AT THE RATE OF N329/$
            </div>
          </div>

          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" style="border: 0px solid white; color: black; background-color: white; margin-left: 2%">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <center><img class="card-img-top" src="assets/img/clients/xbox.png" style="width:140px; height:100px"></center><br>
              <p class="description" style="color: black"><b>Xbox AUD</b></p>
               WE ARE BUYING AT THE RATE OF N190/$
            </div>
          </div>

          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0" style="border: 0px solid white; color: black; background-color: white; margin-left: 3%">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <center><img class="card-img-top" src="assets/img/clients/apple.jpeg" style="width:140px; height:100px"></center><br>
              <p class="description" style="color: black"><b>Apple store Card</b></p>
               WE ARE BUYING AT THE RATE OF N336/$
            </div>
        </div>
      </center>

      </div>
    </section><!-- End Clients Section -->



    <!-- ======= Portfolio Section ======= -->

  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



 



    <!--  <section class="currency-area" style="visibility: visible!important;">
         <div class="btc mb-5 row justify-content-center">
             {{-- <div class="btc-rates btc-card mx-2 my-2 col-11 col-md-4"
          style="background-image: url(images/btc-watermark.svg);">
          <h4 class="mb-2"><img
            src="images/bit.png"
            class="img-fluid mr-2" alt="btc img"> OUR current BTC RATES</h4>
            <span class="text-green ">
              <strong> We're Buying
              at...
               <span class="d-block rate-text text-center" style="margin-top: -6%"> ₦400
                <span class="text-small">per dollar
               </strong>
              </span>

        </div> --}}
             {{-- <div id="btc_cont" class="btc-charts btc-card my-2 col-11  col-md-4 overflow-hidden" style="background-image: url(images/btc-watermark.svg);">
          <h4 class="mb-2">Bitcoin Price Chart</h4>
          <div style="width: 729px; height: 120px;" class="rv-xy-plot ">
            <svg class="rv-xy-plot__inner" width="729"
            height="120" style="margin: 2rem 0px 0px;">
            <path
            d="M0,34.94192139737987L22.633333333333333,0L45.266666666666666,33.13842794759821L67.9,37.106113537117956L90.53333333333333,18.321965065502166L113.16666666666666,27.923580786026204L135.8,31.48165938864633L158.43333333333334,24.829213973799142L181.06666666666666,28.58323144104809L203.7,24.787336244541528L226.33333333333331,20.72489082969432L248.96666666666664,40.38296943231437L271.6,43.046179039301265L294.23333333333335,43.68764192139735L316.8666666666667,61.08951965065502L339.5,39.478930131004404L362.1333333333333,40.463056768558985L384.76666666666665,42.13755458515284L407.4,52.597816593886485L430.0333333333333,50.40580786026206L452.66666666666663,48.74781659388646L475.29999999999995,40.44716157205242L497.9333333333333,33.30563318777292L520.5666666666667,38.28296943231445L543.2,52.72151179039297L565.8333333333334,61.68253275109175L588.4666666666667,59.43489082969429L611.1,70L633.7333333333333,63.60218340611356L656.3666666666667,60.65331877729257L679,60.068558951965024"
            class="rv-xy-plot__series rv-xy-plot__series--line " transform="translate(40,10)"
            style="opacity: 1; stroke:rgb(41, 193, 220)"></path>
          </svg>
        </div>
        </div> --}}
             <div class="container-fliud">
                 <div class="row">

                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <h1 class="mb-3">&nbsp;&nbsp;&nbsp;&nbsp;<strong>Current Giftcard Rates</strong></h1>
                         @foreach ($giftcard as $item)
                         <div class="rete-list bt_title wow fadeIn animated" data-wow-duration="1.0s"
                             style="visibility: visible !important; animation-duration: 1.0s; animation-name: fadeIn;">
                             {{-- style="background-image: url(images/steam.svg);" --}}
                             <div class="content">
                                 <div class="con gift-card ">
                                     <h2><img src="{{ url('images/catalogue/'.$item->avatar) }}"
                                             alt=""><span>{{ $item->product_name }}</span></h2>
                                     <button class="btn3">We're Buying
                                         at... N{{ $item->rate }}&nbsp;&nbsp;&nbsp;</button>
                                 </div>
                             </div>
                         </div>
                         @endforeach

                     </div>
                 </div>
             </div>
     </section>
 </div>
 
 </div> 
 -->





<!-- ======= About Section ======= -->
    <section id="about" style="background-color: white" class="about section-bg ">
      <div class="container" data-aos="fade-up" style="background-color: white">

        <div class="section-title">
          <h3>The Easiest and Most Secure way to Trade <span>Bitcoins and Giftcards</span></h3>
          <center><h4>Buy & Sell from anywhere!</4></center>
        </div>

        <div class="row">
          <div class="col-lg-12" data-aos="zoom-out" data-aos-delay="100">
            <center><img src="/images/main.png" class="img-fluid" alt=""></center>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->



<section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <center><div style="width:80px; height:60px"><img src="images/icon-1.svg" alt="Fast payout"
                     class="why-us-icon d-block mx-auto mb-3"></div></center><br>
              <span class="why-us-title text-center d-block">Fast
                     Payout</span>
              <p class="text-center">You get paid immediately your transaction is completed. Directly to your bank
                     account
                 </p>
            </div>
          </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <center><div style="width:80px; height:60px"><img src="images/icon-2.svg"
                     alt="Round the Clock Access" class="why-us-icon d-block mx-auto mb-3"></div></center><br>
              <span class="why-us-title text-center d-block">Round the Clock Access</span>
              <p class="text-center">We are online 24/7 to do business and help you make money round-the-clock.
                 </p>
            </div>
          </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <center><div style="width:80px; height:60px"><img src="images/icon-3.svg"
                     alt="Secure Trading" class="why-us-icon d-block mx-auto mb-3"></div></center><br>
              <span class="why-us-title text-center d-block">Secure Trading</span>
              <p class="text-center">We handle millions in transactions daily. Trust us to pay you every single time.
                 </p>
            </div>
          </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <center><div style="width:80px; height:60px"><img src="images/icon-4.svg"></div></center><br>
              <span class="why-us-title text-center d-block">No extra Charges</span>
              <p class="text-center">We charge nothing extra for transactions. You only pay according to our fixed
                     rates
                 </p>
            </div>
          </div>

            </div>

      </div>
    </section>

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100" style="padding-top:2%">
            <div class="member">
              <div class="member-img">
               <img src="images/icon-1.svg" alt="Fast payout"
                     class="why-us-icon d-block mx-auto mb-3"><span class="why-us-title text-center d-block">Fast
                     Payout</span>
                 <p class="text-center">You get paid immediately your transaction is completed. Directly to your bank
                     account
                 </p>

              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200" >
            <div class="member">
              <div class="member-img" style="padding-top:2%">
                <img src="images/icon-2.svg"
                     alt="Round the Clock Access" class="why-us-icon d-block mx-auto mb-3"><span
                     class="why-us-title text-center d-block">Round the Clock Access</span>
                 <p class="text-center">We are online 24/7 to do business and help you make money round-the-clock.</p>
            </div>
          </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300" style="padding-top:2%">
            <div class="member">
              <div class="member-img">
                <img src="images/icon-3.svg"
                     alt="Secure Trading" class="why-us-icon d-block mx-auto mb-3"><span
                     class="why-us-title text-center d-block">Secure Trading</span>
                 <p class="text-center">We handle millions in transactions daily. Trust us to pay you every single time.
                 </p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400" style="padding-top:2%">
            <div class="member">
              <div class="member-img">
                <img src="images/icon-4.svg"
                     alt="No extra Charges" class="why-us-icon d-block mx-auto mb-3"><span
                     class="why-us-title d-block text-center">No extra Charges</span>
                 <p class="text-center">We charge nothing extra for transactions. You only pay according to our fixed
                     rates
                 </p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->
 -->




<!--  <section class="py-5 why-us">
     <h1 class="text-center">The Easiest and Most Secure way to Trade Bitcoins and Giftcards</h1>
     <h3 class="mb-3 text-center"> Buy &amp; Sell from anywhere!</h3>
     <div class="carousel d-flex justify-content-center"><img src="images/main.png" class="mt-5 img-fluid"
             alt="Dashboard"></div>
     <div class="container">
         <div class="row ">
             <div class="col-12 col-sm-6 col-lg justify-content-center"><img src="images/icon-1.svg" alt="Fast payout"
                     class="why-us-icon d-block mx-auto mb-3"><span class="why-us-title text-center d-block">Fast
                     Payout</span>
                 <p class="text-center">You get paid immediately your transaction is completed. Directly to your bank
                     account
                 </p>
             </div>
             <div class="col-12 col-sm-6 col-lg justify-content-center"><img src="images/icon-2.svg"
                     alt="Round the Clock Access" class="why-us-icon d-block mx-auto mb-3"><span
                     class="why-us-title text-center d-block">Round the Clock Access</span>
                 <p class="text-center">We are online 24/7 to do business and help you make money round-the-clock.</p>
             </div>
             <div class="col-12 col-sm-6 col-lg justify-content-center"><img src="images/icon-3.svg"
                     alt="Secure Trading" class="why-us-icon d-block mx-auto mb-3"><span
                     class="why-us-title text-center d-block">Secure Trading</span>
                 <p class="text-center">We handle millions in transactions daily. Trust us to pay you every single time.
                 </p>
             </div>
             <div class="col-12 col-sm-6 col-lg justify-content-center"><img src="images/icon-4.svg"
                     alt="No extra Charges" class="why-us-icon d-block mx-auto mb-3"><span
                     class="why-us-title d-block text-center">No extra Charges</span>
                 <p class="text-center">We charge nothing extra for transactions. You only pay according to our fixed
                     rates
                 </p>
             </div>
         </div>
     </div>
 </section> -->


<div class="container" style="background-color: white">
 <section  class=" started pt-5" id="howtouse"  style="background-color: white">
     <div class="container" style="background-color: white">
         <h2 class="text-center text-md-left"><strong>Get Started in 3 Easy Steps</strong></h2>
         <div class="row d-flex  justify-content-between">
             <div class="col-12 col-md-6 col-lg-5 mt-5 order-2 order-md-1">
                 <div class="step d-flex   my-4"><span
                         class="index d-flex justify-content-center align-items-center mr-3 mt-2">1</span>
                     <div class="started-content   px-3 py-1"><span class="title d-block "><strong>Sign Up... or
                                 not</span>
                         <p>You can sell bitcoin &amp; giftcards to us without signing up. However, you need to sign up
                             to buy
                             bitcoin, and for faster transactions.</p></strong>
                     </div>
                 </div>
                 <div class="step d-flex active my-4"><span
                         class="index d-flex justify-content-center align-items-center mr-3 mt-2">2</span>
                     <div class="started-content px-3 py-1 py-"><span class="title d-block "><strong>Initiate Trade
                                 Easily</span>
                         <p>Initiate transactions from anywhere with the click of a button. We have designed the system
                             to
                             facilitate the smoothest buying and selling of the digital assets</p></strong>
                     </div>
                 </div>
                 <div class="step d-flex  my-4"><span
                         class="index d-flex justify-content-center align-items-center mr-3 mt-2">3</span>
                     <div class="started-content px-3 py-1"><span class="title d-block "><strong>Get Paid
                                 Instantly</span>
                         <p>You get paid immediately. Directly to your bank account.</p></strong>
                     </div>
                 </div>
             </div>
             <div
                 class="col-12 col-md-6 d-flex justify-content-center align-items-center step-img-container order-1 order-md-2">
                 <img src="{{ asset('images/how-to.png') }}" alt="get started" class="img-fluid step-image ">
                 <img src="{{ asset('images/how-to.png') }}" class="img-fluid step-image active"
                     alt="google play"><img src="{{ asset('images/how-to.png') }}" alt="product image"
                     class="img-fluid step-image "></div>
         </div>
         <div class="d-flex flex-column flex-md-row text-center justify-content-md-center align-items-md-center"><button type="button"
                     class="ant-btn btn btn-primary mb-4 mb-md-0 mx-md-5"><span>COMING SOON</span></button>
             <div class="d-none d-md-block divider ant-divider ant-divider-vertical" role="separator"></div>
             <div class="d-flex justify-content-center mx-md-5"><a href="#" rel="noopener noreferrer" target="_blank"
                     title="Click to view our android app"><img src="{{ asset('images/google-play-badge_white.svg') }}"
                         class="img-fluid download mx-2 mx-md-2" alt="google play icon"></a><a href="#"
                     rel="noopener noreferrer" target="_blank" title="Click to view our iOS app"><img
                         src="{{ asset('images/App-Store-Badge.svg') }}" class="img-fluid download mx-2 mx-md-2"
                         alt="iTunes icon"></a></div>
         </div>
     </div>
 </section>
</div>

 @endsection
