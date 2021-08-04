<?php
use App\PostModel;
?>
@extends('user.main')

@section('title')
    <h4>
        <i class="icon-edit"></i>
        Account Settings
    </h4>
@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce">
<div class="row my-3">
<div class="col-12">
    @if (!$accounts)
    <div class="alert alert-danger" role="alert">
        Kindly Update Your Bank Information !!!
    </div>
    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Check Info update here</button>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Important Announcement</h4>
        </div>
        <div class="modal-body">
          <p>
            @foreach(PostModel::all() as $post)
             <b>{{ $post['subject']}}</b><br><hr>
             <p>{{$post['message']}}</p>
            @endforeach
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!--end of modal box  -->

@endif
<div class="card no-b">
<div class="card-header white pb-0">
<div class="d-flex justify-content-between">
<div class="align-self-center">
<ul class="nav nav-pills mb-3" role="tablist">
<li class="nav-item">
<a class="nav-link r-20 active show" id="w3--tab1" data-toggle="tab" href="#user-info" role="tab" aria-controls="user-info" aria-expanded="true" aria-selected="true">Personal Information</a>
</li>
<li class="nav-item">
<a class="nav-link r-20" id="w3--tab2" data-toggle="tab" href="#bank-account" role="tab" aria-controls="bank-account" aria-selected="false">Bank Information</a>
</li>
<li class="nav-item">
<a class="nav-link r-20" id="w3--tab2" data-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="false">Password</a>
</li>
</ul>
</div>

<div class="align-self-center">
<h5>Account Settings</h5>
</div>
</div>
</div>
<div class="card-body no-p">
<div class="tab-content">
<div class="tab-pane fade active show  p-5" id="user-info" role="tabpanel" aria-labelledby="user-info">
<div class="card">
<div class="card-header white pb-0">
<p>Account Settings</p>
</div>
<div class="card-body">

<form id="editUser" data-id="843" method="POST" action="{{ route('user.biodata') }}">
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
    <label class="font-weight-semibold" for="buy_ra" id="buy_ra">Refer a Friend to earn N1000</label><br>
    <div class="tooltip1">
        <button type="button" class="btn btn-dark" onclick="copyWalletAddress_btc();">
            <span class="tooltiptext1" id="myTooltip_btc">Copy Referral Code to clipboard</span></button>
    </div>
</div>
</div>
<div class="form-group row">
<div class="col-sm-6">
<button id="btn-editUser" type="submit" class="btn btn-success"><i class="anticon anticon-edit"></i> Update </button>
</div>
</div>
</form>

</div>
</div>
</div>
<div class="tab-pane fade  p-5" id="bank-account" role="tabpanel" aria-labelledby="bank-account">
<div class="card">
<div class="card-header white pb-0">
<p>Bank Information</p>
</div>
<div class="card-body">

<form id="editUserBankInfo" data-id="843" method="POST" action="{{ route('user.account') }}">
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
<option value="">Choose</option>
<option value="{{ $accounts->bank_name ?? '' }}" selected>{{ $accounts->bank_name ?? '' }}</option>
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
<button id="btn-editUserBankInfo" type="submit" class="btn btn-success"><i class="anticon anticon-edit"></i> Update Bank Info </button>
</div>
</div>
</form>

</div>
</div>
</div>
<div class="tab-pane fade  p-5" id="change-password" role="tabpanel" aria-labelledby="change-password">
<div class="card">
<div class="card-header white pb-0">
<p>Change Password</p>
</div>
<div class="card-body">

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
<button id="btn-editUserPassword" type="submit" class="btn btn-success"><i class="anticon anticon-edit"></i> Change </button>
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
</div>
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

$(document).ready(function() {
  $('#myModal').modal('show');
});
    </script>
@endsection
