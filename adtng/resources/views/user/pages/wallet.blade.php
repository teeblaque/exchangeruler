@extends('user.main')

@section('description', 'Wallet')

@section('stylesheet')
    <style>
        #basic{
            display: none;
        }
        </style>
@endsection

@section('contents')
     <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <br><br>
                <div class="row layout-top-spacing">
                    <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <strong>Transaction Details</strong>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Trasnsaction Type</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trans as $key => $item)
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ Str::ucfirst($item->transaction_type) }}</td>
                                        <td>N{{ number_format($item->amount) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Trasnsaction Type</th>
                                            <th>Amount</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <h5 class="">Account Balance</h5>
                                    <p class="inv-balance">N{{ number_format($amounts->balance) }}</p>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                            {{-- <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a> --}}
                                            {{-- <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a> --}}
                                        </div>
                                        <a href="javascript:void(0);" id="wallet">Fund Wallet</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div id="basic" class="layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Fund Wallet</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" id="paymentForm" novalidate method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <label for="fullName">Enter Amount</label>
                                                <input type="hidden" name="email-address" id="email-address" value="{{ Auth::user()->email }}">
                                                <input type="tel" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                                                <div class="valid-feedback">
                                                    Great!!!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please Enter the amount you want to add to wallet
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit" onclick="payWithPaystack()">Pay</button>
                                    </form>
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
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
         window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('simple-example');
        var invalid = $('.simple-example .invalid-feedback');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
                invalid.css('display', 'block');
            } else {

                invalid.css('display', 'none');

                form.classList.add('was-validated');
            }
        }, false);
        });

        }, false);

        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
        e.preventDefault();
        let handler = PaystackPop.setup({
            key: 'pk_test_c7568fdfa19d15f7bfe9427229e688be470e1194', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
            alert('Window closed.');
            },
            callback: function(response){
                if (response.status === 'success') {
                    var amount_paid = document.getElementById("amount").value;
                    $.ajax({
                    type: "POST",
                    url: "{{ route('user.paystack') }}",
                    data: { amount: amount_paid }
                }).done(function(data){
                    console.log(data);
                    alert(data.msg);
                    window.location.reload();
                }).fail(function(data){
                    console.log(data);
                    alert('Cannot fund wallet at this time. kindly try again!!!')
                });
                } else {
                    alert('Cannot fund at this time. Please try again later');
                }
            }
        });
        handler.openIframe();
        }


        $('document').ready(function(){
            $('#wallet').on('click', function(){
                $('#basic').show();
            });

        });
    </script>
@endsection
