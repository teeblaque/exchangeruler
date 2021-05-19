@extends('user.main')

@section('description', 'Admin Dashboard')

@section('contents')
     <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <strong>Internet Subscription</strong>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Customer Name</th>
                                            <th>Transaction ID</th>
                                            <th>Network Type</th>
                                            <th>Data Type</th>
                                            <th>Price</th>
                                            <th>Phone Number</th>
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
                                            <td>{{ $value->network_type }}</td>
                                            <td>{{ $value->data_type }}</td>
                                            <td>{{ $value->price }}</td>
                                            <td>{{ $value->phone_number }}</td>
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
                                            <th>Network Type</th>
                                            <th>Data Type</th>
                                            <th>Price</th>
                                            <th>Phone Number</th>
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
