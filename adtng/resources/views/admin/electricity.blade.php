@extends('user.main')

@section('description', 'Admin Dashboard')

@section('contents')
     <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <strong>Electricity Subscriptions</strong>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Customer Name</th>
                                            <th>Transaction ID</th>
                                            <th>Service</th>
                                            <th>Package</th>
                                            <th>Account Number</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cables as $key => $value)
                                            <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->trans_id }}</td>
                                            <td>{{ $value->service }}</td>
                                            <td>{{ $value->package }}</td>
                                            <td>{{ $value->accountNumber }}</td>
                                            <td>{{ $value->amount }}</td>
                                            <td>{{ $value->status }}</td>
                                            <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Customer Name</th>
                                            <th>Transaction ID</th>
                                            <th>Service</th>
                                            <th>Package</th>
                                            <th>Account Number</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('user.partials._footer')
        </div>
        <!--  END CONTENT PART  -->
@endsection
