@extends('user.main')

@section('description', 'Data')

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
                                            <th>Phone Number</th>
                                            <th>Network</th>
                                            <th>Data Type</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->trans_id }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->network_type }}</td>
                                            <td>{{ $item->data_type }}</td>
                                            <td>N{{ number_format($item->price) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Trasnsaction ID</th>
                                            <th>Phone Number</th>
                                            <th>Network</th>
                                            <th>Data Type</th>
                                            <th>Amount</th>
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
                                            <h4>Subscribe Data</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" id="paymentForm" novalidate method="POST" action="{{ route('user.data.apply') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="validationCustom04">Select Network Type</label>
                                                    <select name="network_type" id="network_type" class="form-control" required>
                                                        <option value="">Select Network Type</option>
                                                        <option value="MTN">MTN</option>
                                                        <option value="GLO">GLO</option>
                                                        <option value="9MOBILE">9MOBILE</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Select Data Type</label>
                                                    <select name="data_type" id="data_type" class="form-control" required>
                                                        <option value="">Select Data type</option>
                                                    </select>
                                                    <input type="hidden" id="product_code" name="product_code" class="form-control">
                                                </div>
                                                <div class="form-group" id="price">
                                                    <label for="validationCustom04">Price</label>
                                                   <input type="tel" class="form-control" id="prices" name="prices" placeholder="Enter Price" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">Phone Number</label>
                                                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit">Subscribe</button>
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

             $('#network_type').on('change', function(e){
                e.preventDefault();

                var prototype = $('#network_type').val();

                var url = '{{ route("user.data.type", ":protype") }}';
                url = url.replace(':protype', prototype);

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
                    $("#data_type").html(listItems);

                }).fail(function(error){
                    console.log(error);
                });
            });

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
