@extends('user.main')

@section('description', 'Packages')

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
                            {{-- @include('notify::messages') --}}
                            <strong>Transaction Details</strong>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Package type</th>
                                            <th>Package Name</th>
                                            <th>Product Code</th>
                                            <th>Price</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($packages as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ Str::ucfirst($item->tv_type) }}</td>
                                            <td>{{ $item->package }}</td>
                                            <td>{{ $item->product_code }}</td>
                                            <td>{{ $item->price }}</td>
                                            @if ($item->created_at != '')
                                                <td>{{ $item->created_at->format('d, M, Y') }}</td>
                                                @else
                                                <td></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Package type</th>
                                            <th>Package Name</th>
                                            <th>Product Code</th>
                                            <th>Price</th>
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
                                            <h4>Add Package</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" id="paymentForm" novalidate method="POST" action="{{ route('admin.packages') }}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="validationCustom04">Package Type</label>
                                                    <select name="package_type" id="package_type" class="form-control" required>
                                                        <option value="">Select Package Type</option>
                                                        <option value="dstv">Dstv</option>
                                                        <option value="gotv">Gotv</option>
                                                        <option value="startimes">Startimes</option>
                                                        <option value="mtn">Mtn</option>
                                                        <option value="glo">GLO</option>
                                                        <option value="9mobile">9Mobile</option>
                                                        <option value="spectranet">Spectranet</option>
                                                        <option value="smile">Smile</option>
                                                        <option value="waec">Waec</option>
                                                        <option value="neco">Neco</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="price">
                                                    <label for="validationCustom04">Package Name</label>
                                                   <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Enter Package Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">Product Code</label>
                                                <input type="tel" class="form-control" id="product_code" name="product_code" placeholder="Enter Product Code" required>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="fullName">Price</label>
                                                <input type="tel" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary submit-fn mt-2" type="submit">Submit</button>
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

        });
    </script>
@endsection
