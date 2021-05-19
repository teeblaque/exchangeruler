@extends('user.main')

@section('title')
    <h4>
        <i class="icon-orders"></i>
        Address
    </h4>
@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce">
          <div class="row my-3">
            <div class="col-md-8">
              <div class="card r-0 shadow">
                <div class="card-header white pb-0">
                  <p>Wallet Address</p>
                </div>
                <br>
                <div class="table-responsive">
                  <table id="datatable" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Address</th>
                        <th>Date Created</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th>S/N</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Address</th>
                        <th>Date Created</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($blocks as $key => $block)
                          <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ Str::ucfirst($block->product_name) }}</td>
                          <td>{{ $block->product_type }}</td>
                          <td>{{ $block->address }}</td>
                          <td>{{ $block->created_at->format('d-M-Y') }}</td>
                        <td>
                          &nbsp;&nbsp;<button class="btn btn-danger pull-right" onclick="fun_delete('{{ $block->id }}')"><i class="ti-trash icon-md"></i>Delete</button>
                        </td>
                        </tr>
                      @endforeach
                         </tbody>
                       </table>
                       <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{ route('admin.blockchain.delete') }}">
                       <br> <br> <br> <br>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Create New Address</div>
                        <div class="card-body">
                            <form action="{{ route('admin.blockchain') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="address">Product Name </label>
                                    <select name="product_name" id="product_name" class="form-control">
                                        <option value="" selected>Select Product Name</option>
                                        <option value="bitcoin">Bitcoin</option>
                                        <option value="usdt">USDT</option>
                                        <option value="ethereum">Ethereum</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="address">Product Type </label>
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option value="" selected>Select Product Type</option>
                                        <option value="blockchain">Blockchain</option>
                                        <option value="paxful">Paxful</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
               </div>
             </div>
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
    </script>
@endsection
