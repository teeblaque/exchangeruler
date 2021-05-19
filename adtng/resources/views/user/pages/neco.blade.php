@extends('user.main')

@section('description', 'NECO')

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
                                            <th>Service</th>
                                            <th>Package</th>
                                            <th>Price</th>
                                            <th>Pin</th>
                                            <th>Serial number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->trans_id }}</td>
                                            <td>{{ $item->service }}</td>
                                            <td>{{ $item->package }}</td>
                                            <td>N{{ number_format($item->price) }}</td>
                                            <td>{{ $item->pin }}</td>
                                            <td>{{ $item->serial_number }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Trasnsaction ID</th>
                                            <th>Service</th>
                                            <th>Package</th>
                                            <th>Price</th>
                                            <th>Pin</th>
                                            <th>Serial number</th>
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
                                            <h4>Check NECO Result</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" id="paymentForm" novalidate method="POST" action="{{ route('user.spectranet') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="validationCustom04">Select Product Type</label>
                                                    <select name="data_type" id="data_type" class="form-control" required>
                                                        <option value="">Select Data type</option>
                                                        @foreach ($packages as $item)
                                                            <option value="{{ $item->id }}">{{ $item->package }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" id="product_code" name="product_code" class="form-control">
                                                </div>
                                                <div class="form-group" id="price">
                                                    <label for="validationCustom04">Price</label>
                                                   <input type="tel" class="form-control" id="prices" name="prices" placeholder="Enter Price" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit">Check Result</button>
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

            $('#data_type').on('change', function(){
                var url = '/user/data/' + $(this).val();
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
