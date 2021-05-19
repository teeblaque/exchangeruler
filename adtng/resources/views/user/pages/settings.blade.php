@extends('user.main')

@section('description', 'Settings')

@section('stylesheet')
    <style>
        </style>
@endsection

@section('contents')
     <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <br><br>
                @include('user.partials._failure')

                @include('user.partials._success')

                @if (!$accounts)
                    <div class="alert alert-danger" role="alert">
                        Kindly Update Your Bank Information !!!
                    </div>
                @endif

                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div id="basic" class="layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Account Settings</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area border-top-tab">
                                    <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="border-top-home-tab" data-toggle="tab" href="#border-top-home" role="tab" aria-controls="border-top-home" aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Personal Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#border-top-profile" role="tab" aria-controls="border-top-profile" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Bank Information</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="border-top-contact-tab" data-toggle="tab" href="#border-top-contact" role="tab" aria-controls="border-top-contact" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> Contact</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a class="nav-link" id="border-top-setting-tab" data-toggle="tab" href="#border-top-setting" role="tab" aria-controls="border-top-setting" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>Password Settings</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="borderTopContent">
                                        <div class="tab-pane fade show active" id="border-top-home" role="tabpanel" aria-labelledby="border-top-home-tab">
                                            <form action="{{ route('user.biodata') }}" method="post">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="userName">Fullname :</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Fullname">
                                                        <div class="invalid-feedback" id="err_names"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="email">Email:</label>
                                                        <input readonly type="email" class="form-control" id="email" placeholder="email" value="{{ Auth::user()->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                    <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                                                    <input readonly type="text" class="form-control" id="mobile" name="mobile" value="{{ Auth::user()->mobile }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    <label class="font-weight-semibold" for="join">Joined On :</label>
                                                    <input readonly type="text" class="form-control" id="join" value="{{ Auth::user()->created_at->format('d-M-Y') }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    <label class="font-weight-semibold" for="join">Referral Code :</label>
                                                    <input readonly type="text" class="form-control" id="refer" value="{{ Auth::user()->referal_code }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="font-weight-semibold" for="buy_ra" id="buy_ra">Refer a Friend to earn 250MB data</label><br>
                                                        <div class="tooltip1">
                                                            <button type="button" class="btn btn-dark" onclick="copyWalletAddress_btc();">
                                                                <span class="tooltiptext1" id="myTooltip_btc">Copy Referral Code to clipboard</span></button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <div class="col-sm-6">
                                                    <button id="btn-editUser" type="submit" class="btn btn-warning"><i class="anticon anticon-edit"></i> Update </button>
                                                    </div>
                                                    </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="border-top-profile" role="tabpanel" aria-labelledby="border-top-profile-tab">
                                            <form method="POST" action="{{ route('user.account') }}">
                                            @csrf
                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label class="font-weight-semibold" for="userName">Bank Account Name :</label>
                                        <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Fullname on Bank Account" value="{{ $accounts->account_name ?? '' }}" required>
                                        <div class="invalid-feedback" id="err_bank_account_name"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label class="font-weight-semibold" for="bank_account_no">Bank Account Number:</label>
                                        <input type="number" class="form-control" id="account_number" name="account_number" placeholder="Bank Account Number" value="{{ $accounts->account_number ?? '' }}" required>
                                        <div class="invalid-feedback" id="err_bank_account_no"></div>
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label class="font-weight-semibold" for="bank_name">Bank Name:</label>
                                        <select id="bank_name" name="bank_name" class="form-control">
                                        <option value="">Choose Bank</option>
                                        <option value="{{ $accounts->bank_name ?? '' }}" selected>{{ $accounts->bank_name ?? 'Select Bank' }}</option>
                                        <option value="Access Bank">Access Bank</option>
                                        <option value="Access Bank (Diamond)">Access Bank (Diamond)</option>
                                        <option value="ALAT by WEMA">ALAT by WEMA</option>
                                        <option value="ASO Savings and Loans">ASO Savings and Loans</option>
                                        <option value="CEMCS Microfinance Bank">CEMCS Microfinance Bank</option>
                                        <option value="Citibank Nigeria">Citibank Nigeria</option>
                                        <option value="Ecobank Nigeria">Ecobank Nigeria</option>
                                        <option value="Ekondo Microfinance Bank">Ekondo Microfinance Bank</option>
                                        <option value="Fidelity Bank">Fidelity Bank</option>
                                        <option value="First Bank of Nigeria">First Bank of Nigeria</option>
                                        <option value="First City Monument Bank">First City Monument Bank</option>
                                        <option value="Globus Bank">Globus Bank</option>
                                        <option value="Guaranty Trust Bank">Guaranty Trust Bank</option>
                                        <option value="Hasal Microfinance Bank">Hasal Microfinance Bank</option>
                                        <option value="Heritage Bank">Heritage Bank</option>
                                        <option value="Jaiz Bank">Jaiz Bank</option>
                                        <option value="Keystone Bank">Keystone Bank</option>
                                        <option value="Kuda Bank">Kuda Bank</option>
                                        <option value="One Finance">One Finance</option>
                                        <option value="Parallex Bank">Parallex Bank</option>
                                        <option value="Paycom (OPay)">Paycom (OPay)</option>
                                        <option value="Polaris Bank">Polaris Bank</option>
                                        <option value="Providus Bank">Providus Bank</option>
                                        <option value="Rubies MFB">Rubies MFB</option>
                                        <option value="Sparkle Microfinance Bank">Sparkle Microfinance Bank</option>
                                        <option value="Stanbic IBTC Bank">Stanbic IBTC Bank</option>
                                        <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                        <option value="Sterling Bank">Sterling Bank</option>
                                        <option value="Suntrust Bank">Suntrust Bank</option>
                                        <option value="TAJ Bank">TAJ Bank</option>
                                        <option value="TCF MFB">TCF MFB</option>
                                        <option value="Titan Bank">Titan Bank</option>
                                        <option value="Union Bank of Nigeria">Union Bank of Nigeria</option>
                                        <option value="United Bank For Africa">United Bank For Africa</option>
                                        <option value="Unity Bank">Unity Bank</option>
                                        <option value="VFD">VFD</option>
                                        <option value="Wema Bank">Wema Bank</option>
                                        <option value="Zenith Bank">Zenith Bank</option>
                                        </select>
                                        <div class="invalid-feedback" id="err_bank_name"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label class="font-weight-semibold" for="bank_account_no">Last Updated:</label>
                                        <input disabled type="text" class="form-control" id="updated_at" name="updated_at" placeholder="Last Updated Date" value="{{ $accounts->updated_at ?? '' }}">
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-6">
                                        <button id="btn-editUserBankInfo" type="submit" class="btn btn-warning"><i class="anticon anticon-edit"></i> Update Bank Info </button>
                                        </div>
                                        </div>
                                        </form>

                                        </div>

                                        <div class="tab-pane fade" id="border-top-setting" role="tabpanel" aria-labelledby="border-top-setting-tab">
                                           <form id="editUserPassword" data-id="843" method="POST" action="{{ route('user.change.password') }}">
                                                @csrf
                                            <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <label class="font-weight-semibold" for="old_pass">Current Password :</label>
                                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                                            <div class="invalid-feedback" id="err_password"></div>
                                            </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <label class="font-weight-semibold" for="old_pass">New Password :</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                                            <div class="invalid-feedback" id="err_new_password"></div>
                                            </div>
                                            </div>
                                            <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <label class="font-weight-semibold" for="old_pass">Confirm Password :</label>
                                            <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password" placeholder="Confirm New Password">
                                            <div class="invalid-feedback" id="err_new_password_confirmation"></div>
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                            <div class="col-sm-6">
                                            <button id="btn-editUserPassword" type="submit" class="btn btn-warning"><i class="anticon anticon-edit"></i> Change </button>
                                            </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('user.partials._footer')
        </div>
        <!--  END CONTENT PART  -->
@endsection

@section('scripts')
    <script>
         function copyWalletAddress_btc() {
            /* Get the text field */
            var copyText = document.getElementById("refer");
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Share Code: "+ copyText.value);
        }
    </script>
@endsection
