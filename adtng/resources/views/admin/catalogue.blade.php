@extends('user.main')

@section('description', 'Catalogues')

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
                            <strong>Catalogue</strong>
                            <div class="table-responsive mb-4 mt-4">
                                <table id="zero-config" class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Avatar</th>
                                            <th>Product Type</th>
                                            <th>Product Name</th>
                                            <th>Denomination</th>
                                            <th>Rate ($)</th>
                                            @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->role == 'accountant')
                                                <th>Action</th>
                                        @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($catalogues as $key => $catalogue)
                                            <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ url('images/catalogue/'.$catalogue->avatar) }}" alt="avatar" style="width: 50px; height: 50px;"></td>
                                            <td>{{ Str::ucfirst($catalogue->product_type) }}</td>
                                            <td>{{ Str::ucfirst($catalogue->product_name) }}</td>
                                            <td>{{ $catalogue->denomination }}</td>
                                            <td>{{ $catalogue->rate }}</td>
                                            @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->role == 'accountant')
                                            <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal"  onclick="fun_edit('{{ $catalogue->id }}')"><i class="ti-pencil icon-md"></i>Edit</button>
                                            &nbsp;&nbsp;<button class="btn btn-danger btn-sm pull-right" onclick="fun_delete('{{ $catalogue->id }}')"><i class="ti-trash icon-md"></i>Delete</button>
                                            </td>
                                    @endif

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Avatar</th>
                                            <th>Product Type</th>
                                            <th>Product Name</th>
                                            <th>Denomination</th>
                                            <th>Rate ($)</th>
                                            @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->role == 'accountant')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="hidden" name="hidden_view" id="hidden_view" value="{{ route('admin.catalogue.edit') }}">
                                <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{ route('admin.catalogue.delete') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                        <div id="basic" class="layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Create Catalogue</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form class="simple-example" id="paymentForm" novalidate method="POST" action="{{ route('admin.catalogue') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="validationCustom04">Product Type</label>
                                                    <select name="product_type" id="product_type" class="form-control" required>
                                                        <option value="" selected>Select Product Type</option>
                                                        <option value="bitcoin">Bitcoin</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="price">
                                                    <label for="validationCustom04">Product Name</label>
                                                   <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">Denomination</label>
                                                <input type="tel" class="form-control" id="denomination" name="denomination" placeholder="Enter Denomination" required>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="fullName">Rate ($)</label>
                                                <input type="number" class="form-control" id="rate" name="rate" placeholder="Enter Rate" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fullName">Product Image</label>
                                                    <input type="file" class="form-control" id="avatar" name="avatar">
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
         <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    {{-- <h4 class="modal-title text-success">Edit Agent Record</h4> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.catalogue.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="edit_first_name"> Product Type:</label>
                                <select name="product_types" id="product_types" class="form-control" required>
                                    <option value="" selected>Select Product Type</option>
                                    <option value="bitcoin">Bitcoin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="description"> Product Name:</label>
                                <input type="text" class="form-control" id="product_names" name="product_names" placeholder="Product Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="description">Denomination:</label>
                                <input type="text" class="form-control" id="denominations" name="denominations" placeholder="Product Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="description">Rate:</label>
                                <input type="text" class="form-control" id="rates" name="rates" placeholder="Product Name" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <input type="hidden" id="edit_id" name="edit_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
    <!-- Edit code ends -->
@endsection

@section('scripts')
    <script>
        function fun_delete(id)
        {
            var conf = confirm("Are you sure want to delete post from record??");
            if(conf){
                var delete_url = $("#hidden_delete").val();
                $.ajax({
                    url: delete_url,
                    type:"POST",
                    data: {"id":id, _token: "{{ csrf_token() }}" },
                    success: function(response){
                        alert(response);
                        location.reload();
                    }
                });
            }
            else{
                return false;
            }
        }

        function fun_edit(id)
        {
            var view_url = $("#hidden_view").val();
            $.ajax({
                url: view_url,
                type:"GET",
                data: {"id":id},
                success: function(result){
            console.log(result);
            $("#edit_id").val(result.id);
            $("#product_types").val(result.product_type);
            $("#product_names").val(result.product_name);
            $("#denominations").val(result.denomination);
            $("#rates").val(result.rate);
            }
        });
    }
    </script>
@endsection

