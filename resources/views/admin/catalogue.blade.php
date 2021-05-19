@extends('user.main')

@section('title')
    <h4>
        <i class="icon-bitcoin"></i>
        Catalogue
    </h4>
@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce">
          <div class="row my-3">
            <div class="col-md-12">
              <div class="card r-0 shadow">
                <div class="card-header white pb-0">
                  <p> Create Catalogue</p>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                      <div class="col-sm-12">
                       @if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                        <a href="{{ route('admin.catalogue.create') }}"><button class="btn btn-success pull-right float-right"><i class="anticon anticon-edit"></i> Create New Catalogue </button></a>
                       @endif
                     </div>
                   </div>
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0">
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#editModal"  onclick="fun_edit('{{ $catalogue->id }}')"><i class="ti-pencil icon-md"></i>Edit</button>
                            &nbsp;&nbsp;<button class="btn btn-danger pull-right" onclick="fun_delete('{{ $catalogue->id }}')"><i class="ti-trash icon-md"></i>Delete</button>
                            </td>
                       @endif

                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <input type="hidden" name="hidden_view" id="hidden_view" value="{{ route('admin.catalogue.edit') }}">
                <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{ route('admin.catalogue.delete') }}">
              </div>
            </div>
          </div>
        </div>
      </div>

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
                                <select name="product_type" id="product_type" class="form-control" required>
                                    <option value="" selected>Select Product Type</option>
                                    <option value="bitcoin">Bitcoin</option>
                                    <option value="usdt">USDT</option>
                                    <option value="ethereum">ETHEREUM</option>
                                    <option value="giftcard">GiftCard</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="description"> Product Name:</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="description">Denomination:</label>
                                <input type="text" class="form-control" id="denomination" name="denomination" placeholder="Product Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="description">Rate:</label>
                                <input type="text" class="form-control" id="rate" name="rate" placeholder="Product Name" required>
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
            $("#product_type").val(result.product_type);
            $("#product_name").val(result.product_name);
            $("#denomination").val(result.denomination);
            $("#rate").val(result.rate);
            }
        });
    }
    </script>
@endsection
