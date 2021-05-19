
  @extends('front.auth.main')

  @section('contents')
      <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{ asset('images/logo_1.png') }}" alt="logo" style="height: 60px;width: auto;" class="bounce">
              </div>
              <h3><font color="white">Verify Your Email Address</font></h3>
              @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

              Before proceeding, please check your email for a verification link.
              If you did not receive the email'
              <br><br>

              <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    {{-- <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>. --}}
                    <button class="btn btn-primary" type="submit">click here to request another</button>
                </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
        <!--     <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved.</p> -->
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


  @endsection
