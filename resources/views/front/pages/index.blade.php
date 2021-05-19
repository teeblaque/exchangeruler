 @extends('front.welcome')

 @section('stylesheets')
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


 <div section-scroll='0' class="wd_scroll_wrap">
     <section class="slider-area">
               <canvas id="canvas" style="opacity: 0.7">
          <div section-scroll='1' class="wd_scroll_wrap" style="display: none">
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
                     <!--<div class="carousel-nevigation" style="z-index: 1">-->
                     <!--    <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">-->
                     <!--        <i class="fa fa-angle-left"></i>-->
                     <!--    </a>-->
                     <!--    <a class="next" href="#carousel-example-generic" role="button" data-slide="next">-->
                     <!--        <i class="fa fa-angle-right"></i>-->
                     <!---    </a>-->
                     <!--</div>-->
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
                                                 <strong style="font-size: 80px;color: #f29c4e !important">Bitcoin
                                                 </strong> <br><span>&nbsp;With Ease</span> </h2>
                                             <br>
                                             <div class="buttons">
                                                 <a href="{{ route('register') }}" class="btn2"
                                                     data-animation="animated bounceInUp">Get Started</a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                                         <div class="btc_slider_about_img" data-animation="animated bounceInDown">
                                             <img src="{{ asset('test/images/about/logo_2.png') }}" width="400" height="400" alt="about_img"
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
                                                 <strong style="font-size: 80px;color: #f29c4e !important">Ethereum
                                                 </strong> <br><span>&nbsp;With Ease</span> </h2>
                                             <br>
                                             <div class="buttons">
                                                 <a href="{{ route('register') }}" class="btn2"
                                                     data-animation="animated bounceInUp">Get Started</a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                                         <div class="btc_slider_about_img" data-animation="animated bounceInDown">
                                             <img src="{{ asset('test/images/about/ent.png') }}" width="400" height="400" alt="about_img"
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
                                                 <strong style="font-size: 80px;color: #f29c4e !important">USDT
                                                 </strong> <br><span>&nbsp;With Ease</span> </h2>
                                             <br>
                                             <div class="buttons">
                                                 <a href="{{ route('register') }}" class="btn2"
                                                     data-animation="animated bounceInUp">Get Started</a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                                         <div class="btc_slider_about_img" data-animation="animated bounceInDown">
                                             <img src="{{ asset('test/images/about/usdt.png') }}" width="400" height="400" alt="about_img"
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
                                             <strong style="font-size: 80px;color: #f29c4e !important">GiftCard
                                             </strong> <br><span>&nbsp;With Ease</span> </h2>
                                         <br>
                                         <div class="buttons">
                                             <a href="{{ route('register') }}" class="btn2"
                                                 data-animation="animated bounceInUp">Get Started</a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  hidden-xs hidden-sm">
                                     <div class="btc_slider_about_img" data-animation="animated bounceInDown">
                                         <img src="{{ asset('test/images/about/GIFTCARDS.png') }}" style="width: 400px; height: 400px;" alt="about_img"
                                             class="spin4">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!--<div class="carousel-nevigation" style="z-index: 1">-->
                     <!--    <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">-->
                     <!--        <i class="fa fa-angle-left"></i>-->
                     <!--    </a>-->
                     <!--    <a class="next" href="#carousel-example-generic" role="button" data-slide="next">-->
                     <!--        <i class="fa fa-angle-right"></i>-->
                     <!--    </a>-->
                     <!--</div>-->
                 </div>
             </div>
         </div>
     </section>

     <section class="currency-area" style="visibility: visible!important;">
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

 <section class="py-5 why-us">
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
 </section>
 <section class=" started pt-5" id="howtouse">
     <div class="container">
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

 @endsection
