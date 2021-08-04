<?php
session_start();
?>
@extends('user.main')
<?php
use App\User;

?>
@section('stylesheet')
    <style>
        img {
            pointer-events: none;
        }
    </style>
@endsection

@section('title')
    <h4>
        <i class="icon-orders"></i>
        User Details
    </h4>
@endsection

@section('contents')
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-6">
                    <div class="card white sticky">
                        <div class="card-header">Credit user Balance</div>

                <div class="card white sticky">
                        <div class="card-header">Credit User</div>
                        <div class="card-body">
                            <form method="post" action='/admin/user_balance/<?php echo $_SESSION["id"];?>'>
                                @csrf
                           <input type="number" class="form-control" name="balance" />
                           <button type="submit" class="btn btn-success">Credit user Balance</button>
                           </form>
                        </div>
                    </div>
                </div>
                <!---  end-->

 

    </div>
@endsection
