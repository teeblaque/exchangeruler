<?php
session_start();
?>
@extends('user.main')

@section('title')
    <h4>
        <i class="icon-orders"></i>
        Users
    </h4>
@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce">
          <div class="row my-3">
            <div class="col-md-12">
              <div class="card r-0 shadow">
               
                <div class="table-responsive">


                  <table id="datatable" class="table table-striped table-bordered" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        @if (Auth::user()->role != 'junior')
                            <th>Mobile</th>
                        @endif
                        <th>Role</th>
                        <th>Date Created</th>
                        @if(Auth::user()->role == 'superadmin')
                        <th>Ref Code</th>
                        <th>User Ref</th>
                        <th>User Balance</th>
                        <th>Last Login</th>
                            <th>Action</th>
                        @endif

                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        @if (Auth::user()->role != 'junior')
                            <th>Mobile</th>
                        @endif
                        <th>Role</th>
                        <th>Date Created</th>
                        @if(Auth::user()->role == 'superadmin')
                            <th>Ref code</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        @endif
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($users as $key => $user)
                          <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          @if (Auth::user()->role != 'junior')
                            <td>{{ $user->mobile }}</td>
                        @endif
                          <td>{{ $user->role }}</td>
                          <td>{{ $user->created_at->format('d-M-Y') }}</td>
                          @if (Auth::user()->role == 'superadmin')
                              <td>{{ $user->referal_code }}</td>
                               <td>{{ $user->referee }}</td>
                              <td>{{ $user->last_login }}</td>
                          @endif
                        <td>
                          @if (Auth::user()->role == 'superadmin')
                              <button class="btn btn-success" data-toggle="modal" data-target="#editModal"  onclick="fun_edit('{{ $user->id }}')"><i class="ti-pencil icon-md"></i>Upgrade User</button>
                              &nbsp;&nbsp;<button class="btn btn-danger pull-right" onclick="fun_delete('{{ $user->id }}')"><i class="ti-trash icon-md"></i>Delete</button>
                              &nbsp;&nbsp;<a href="{{ route('admin.user.details', ['id'=> $user->id]) }}"><button class="btn btn-secondary btn-sm pull-right"><i class="ti-money icon-md"></i>View Details</button></a>
                          @endif

                        </td>
                        </tr>
                      @endforeach
                         </tbody>
                       </table>
                       <input type="hidden" name="hidden_view" id="hidden_view" value="{{ route('admin.users.edit') }}">
                       <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{ route('admin.users.delete') }}">
                       <br> <br> <br> <br>
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
                    <form action="{{ route('admin.users.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="edit_first_name"> User Type:</label>
                                <select name="user_type" id="user_type" class="form-control" required>
                                    <option value="" selected>Select User Type</option>
                                    <option value="user">User</option>
                                    <option value="accountant">Accountant</option>
                                    <option value="junior">Junior Staff</option>
                                    <option value="admin">Senior Staff</option>
                                    <option value="superadmin">Superadmin</option>
                                </select>
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
            $("#user_type").val(result.role);
            }
        });
    }
    </script>
@endsection
