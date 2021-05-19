
  @extends('front.auth.main')

  @section('contents')
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              {{-- <div class="brand-logo">
                <img src="{{ asset('images/logo_1.png') }}" alt="logo" style="height: 60px;width: auto;" class="bounce">
              </div> --}}
              <h2><font color="white">Welcome back!</font></h2>
              <h4 class="font-weight-light"><font color="white">Happy to see you again!</font></h4>
              <form class="pt-3" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" name="email" id="exampleInputEmail" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                {{-- <div class="col-md-6"> --}}
                          <p class="text-link d-block"><a href="{{ route('password.request') }}">Forget Password?</a></p>
                      {{-- </div> --}}
                {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      Remember Me
                    </label>
                  </div>
                </div> --}}
                <div class="my-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                  {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="User admin/dashboard.html">LOGIN</a> --}}
                  <br>
                  <div class="row">
                      <div class="col-md-12">
                          <p class="text-secondary text-center d-block ">Dont have an account? <a href="{{ route('register') }}"> Sign Up </a></p>
                      </div>
                  </div>
                  {{-- <span class=" text-secondary text-left d-block ">New? <a href="{{ route('register') }}"> Sign Up </a></span>
                  <span class=" text-secondary text-right d-block ">Dont have an account? <a href="{{ route('register') }}"> Sign Up </a></span> --}}
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6  login-half-bg d-flex flex-row">
        <!--     <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved.</p> -->
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  @endsection
