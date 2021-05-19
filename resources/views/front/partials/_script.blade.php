<script>
  $(document).ready(function(){
    $("#showbutton").click(function(){
      $("#showing").slideToggle("slow");
    });
  });
</script>
<!--  <script>
$.noConflict();
</script> -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script>window.jQuery || document.write('<script src="static/js/jquery-1.9.1.min.js"><\/script>')</script>
<script src="{{ asset('static/js/main.js') }}"></script>
<!-- <script src="Test slider/js/vendor/jquery-3.2.1.min.js"></script> -->

<!-- bootstrap js -->
<!-- <script src="Test slider/js/bootstrap.min.js"></script> -->
<!-- owl.carousel js -->
<script src="{{ asset('test/js/owl.carousel.min.js') }}"></script>
<!-- meanmenu js -->
<script src="{{ asset('test/js/jquery.meanmenu.js') }}"></script>

<!-- particles js -->
<!-- wow js -->
<script src="{{ asset('test/js/wow.min.js') }}"></script>
<!-- smooth-scroll js -->
<script src="{{ asset('test/js/smooth-scroll.min.js') }}"></script>
<!-- plugins js -->
<script src="{{ asset('test/js/plugins.js') }}"></script>

<script src="{{ asset('test/js/main.js') }}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f4801e7cc6a6a5947af6563/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

  <script>
      $('document').ready(function(){
          var now = new Date();
            var hrs = now.getHours();
            console.log(hrs);
            var msg = "";

            if (hrs >=  0) msg = "Good Morning and Welcome To Exchange Ruler"; // REALLY early
            if (hrs >  6) msg = "Good Morning and Welcome To Exchange Ruler";      // After 6am
            if (hrs > 12) msg = "Good Afternoon and Welcome To Exchange Ruler";    // After 12pm
            if (hrs > 17) msg = "Good Evening and Welcome To Exchange Ruler";      // After 5pm
            if (hrs > 23) msg = "Good Evening and Welcome To Exchange Ruler";        // After 10pm

            $('#greeting').text(msg);
      })
  </script>
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6Q5WMG6QWH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6Q5WMG6QWH');
</script>
