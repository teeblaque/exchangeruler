@extends('front.auth.main')

@section('contents')
     <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <a href="{{ route('index') }}"><img src="{{ asset('images/ADTlogo.png') }}" height="50" alt=" logo"></a>
                        <h3 class="">Verify Your Email Address</h3>
                        <br><br>
                        @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                            Before proceeding, please check your email for a verification link.
                            If you did not receive the email.
                            <br><br>

                        <form class="text-left" action="{{ route('verification.resend') }}" method="POST">
                            @csrf

                            <div class="form">
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary">Click here to request another</button>
                                    </div>
                                </div>
                                <div class="field-wrapper">
                                    <a href="{{ route('verification.resend') }}" class="forgot-pass-link"></a>
                                </div>

                            </div>
                        </form>
                        <p class="terms-conditions">© 2020 All Rights Reserved. <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>

@endsection
