<?php
use App\PostModel;
?>

<style>
    .f{
        display: flex;
    }
    
</style>

    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Check Info update here</button>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Important Announcement</h4>
        </div>
        <div class="modal-body">
          <p>
            @foreach(PostModel::all() as $post)
             <b>{{ $post['subject']}}</b><br><hr>
             <p>{{$post['message']}}</p>
            @endforeach
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="page has-sidebar-left height-full">
          <header style="background-color: white">
            <div class="container-fluid text-white">
              <div class="row p-t-b-10 ">
                <div class="col">
                    @yield('title')
                </div>
              </div>
            </div>
          </header>
          @if(Auth::user()->role=='user')
          <div class="alert alert-warning" style="background-color: orange; color: white">
            <p class="ssf" style="color: white"> <b>Disclaimer!</b> We do not trade on instagram, twitter or any social media platform. The only whatsapp we trade on is <b>+2348180682860</b> for very bulky transactions. <b>BEWARE OF SCAMMERS!</b></p>
          </div>
          
          <div class="f">
          <div class="alert alert-danger" style="font-size: 15px">
           <b>Note!</b> Please note that we are not responsible for <b>cryptocurrency charges</b> on our website
          </div>
          <div class="alert alert-danger" style="font-size: 15px">
             <b>Attention!</b> Kindly check the <b>Wallet address</b> before sending
          </div>
        </div>
        @endif
        
<script>
        $(document).ready(function() {
  $('#myModal').modal('show');
});
</script>