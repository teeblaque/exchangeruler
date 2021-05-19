@extends('user.main')

@section('description', 'Electricity')

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
                <div class="row layout-top-spacing">
                    <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <strong>Transaction Details</strong>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Trasnsaction ID</th>
                                            <th>Package Name</th>
                                            <th>Service</th>
                                            <th>Account No</th>
                                            <th>Amount</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptions as $key => $item)
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->trans_id }}</td>
                                        <td>{{ $item->package }}</td>
                                        <td>{{ $item->service }}</td>
                                        <td>{{ $item->accountNumber }}</td>
                                        <td>N{{ number_format($item->amount) }}</td>
                                        <td>{{ $item->created_at->format('d-m-y') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Trasnsaction ID</th>
                                            <th>Package Name</th>
                                            <th>Service</th>
                                            <th>Account No</th>
                                            <th>Amount</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                        <div id="basic" class="layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Purchase Power</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" id="paymentForm" novalidate method="POST" action="{{ route('user.electricity') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="validationCustom04">Electricity Type</label>
                                                    <select name="service" id="service" class="form-control">
                                                        <option value="">Select Electricity Region</option>
                                                        <option value="ikeja">IKEJA</option>
                                                        <option value="ikeja_token">Ikeja Token</option>
                                                        <option value="eko_prepaid">Eko Distribution Prepaid</option>
                                                        <option value="eko_postpaid">Eko Distribution Postpaid</option>
                                                        <option value="kedco_prepaid">KEDCO Prepaid</option>
                                                        <option value="kedco_postpaid">KEDCO Postpaid</option>
                                                        <option value="abuja_prepaid">Abuja Prepaid</option>
                                                        <option value="abuja_postpaid">Abuja Postpaid</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Phone Number</label>
                                                   <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Email</label>
                                                   <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">Customer Number</label>
                                                    <input type="tel" class="form-control" id="customer_number" name="customer_number" placeholder="Enter Customer Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">Amount</label>
                                                <input type="tel" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit">Purchase</button>
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
    <script>
        $('document').ready(function(){

             $('#service').on('change', function(e){
                e.preventDefault();

                var prototype = $('#service').val();
                var url = '{{ route("user.cable.type", ":service") }}';
                url = url.replace(':service', prototype);

                var listItems= "";

                $.ajax({
                    type: "GET",
                    url: url
                }).done(function(data){
                    for (let index = 0; index < data.length; index++) {
                        const element = data[index];
                        // console.log('element', element);
                        listItems+= "<option value='" + element.id + "'>" + element.package + "</option>";
                    }
                    $("#package").html(listItems);

                }).fail(function(error){
                    console.log(error);
                });
            });

            $('#package').on('change', function(){
                var url = '/user/dstv-package/' + $(this).val();
                $.ajax({
                    type: "GET",
                    url: url
                }).done(function(data){
                    console.log(data);
                    $("#prices").val(data.price);
                    $("#product_code").val(data.product_code);
                }).fail(function(error){
                    console.log(error);
                });
            });

        });
    </script>
@endsection
