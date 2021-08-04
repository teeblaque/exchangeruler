@extends('front.auth.main')

@section('contents')
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
      <div class="row flex-grow">
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
          <div class="auth-form-transparent text-left p-3">
            <div class="brand-logo">
              {{-- <img src="{{ asset('images/logo_1.png') }}" alt="logo" style="height: 60px;width: auto;" class="bounce"> --}}
            </div>
            <h2><font color="white">Welcome!</font></h2>
            {{-- <h4 class="font-weight-light"><font color="white">Happy to see you again!</font></h4> --}}
            <form class="pt-3" method="POST" {{ route('register') }}>
                @csrf
              <div class="ant-tabs-content ant-tabs-content-animated ant-tabs-top-content" style="margin-left: 0%;">
                <div role="tabpanel"  class="ant-tabs-tabpane">
                 <div class="form-group">
                  <label for="exampleInputEmail">Full Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0 @error('name') is-invalid @enderror" id="exampleInputEmail" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Email Address</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                <input type="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required autocomplete="email" id="exampleInputEmail" placeholder="youremail@mail.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="exampleInputEmail">Phone Number</label>
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <span class="input-group-text bg-transparent border-right-0">
                            <i class="ti-user text-primary"></i>
                          </span>
                        </div>
                        <input class="form-control form-control-lg border-left-0 @error('mobile') is-invalid @enderror" placeholder="Phone Number" type="tel" autocomplete="mobile" name="mobile" required=""
                    value="{{ old('mobile') }}">
                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                      </div>
                    </div>
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
                    <input type="password" name="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Confirm Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password_confirmation" class="form-control form-control-lg border-left-0" id="password-confirm" placeholder="Confirm Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Referral Code(Optional)</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" name="referee" placeholder="Enter referral code(optional)">
                  </div>
                </div>
{{--
                    <div class="form-group">
                  <label for="exampleInputEmail">Affiliate Code(Optional)</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="affiliate_code" id="exampleInputEmail" placeholder="Enter affiliate code(optional)">
                  </div>
                </div> --}}
                
                
                <label for="social_media">*Got our advertisment from?</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <select class="form-control form-control-lg border-left-0" id="social_media" name="social_media" required>
                        <option value="facebook">Facebook</option>
                        <option value="instalgram">Instagram</option>
                        <option value="twitter">Twitter</option>
                    </select>
                  </div>
                    
                    <!--<div class="radio">-->
                    <!--  <label><input type="radio" name="social_media" value="facebook" checked> Facebook</label>-->
                    <!--</div>-->
                    <!--<div class="radio">-->
                    <!--  <label><input type="radio" name="social_media" value="instalgram"> Instalgram</label>-->
                    <!--</div>-->
                    <!--<div class="radio disabled">-->
                    <!--  <label><input type="radio" name="social_media" value="twitter">Twitter</label>-->
                    <!--</div>-->
 
                
                    <div class="form-group d-flex flex-column justify-content-center"><span class="terms">By
                      signing up you agree to our <span class="text-primary">Terms and Conditions </span></span>
                      </div>

                      <div class="my-3">
                          <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Sign Up</button>
                        {{-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">Sign Up</a> --}}
                    </div>
                  </form>
                </div>
              </div>

              <br>
              <span
                      class=" text-secondary text-center d-block ">Already have an account? <a href="{{ route('login') }}"> Login </a>
                    </span>
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
