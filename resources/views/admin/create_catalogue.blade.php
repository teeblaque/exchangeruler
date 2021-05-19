@extends('user.main')

@section('stylesheet')
    <style>
        #prod_name{
            display: none;
        }
    </style>
@endsection

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
                  <form id="addOrder" method="POST" action="{{ route('admin.catalogue.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label class="font-weight-semibold" for="name">Product Type</label>
                        <select name="product_type" id="product_type" class="form-control" required>
                            <option value="" selected>Select Product Type</option>
                          <option value="bitcoin">Bitcoin</option>
                          <option value="usdt">USDT</option>
                            <option value="ethereum">ETHEREUM</option>
                          <option value="giftcard">GiftCard</option>
                        </select>
                      </div>
                    </div>

                     <div class="form-row" id="prod_name">
                      <div class="form-group col-md-12">
                        <label class="font-weight-semibold" for="sell_rate">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                      </div>
                    </div>

                     <div class="form-row">
                      <div class="form-group col-md-12">
                        <label class="font-weight-semibold" for="sell_rate">Denomination</label>
                        <input type="text" class="form-control" id="denomination" name="denomination" placeholder="Denomination" required>
                      </div>
                    </div>

                     <div class="form-row">
                      <div class="form-group col-md-12">
                        <label class="font-weight-semibold" for="sell_rate">Rate ($)</label>
                        <input type="text" class="form-control" id="rate" name="rate" placeholder="rate" required>
                        <div class="invalid-feedback" id="err_amount"></div>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label class="font-weight-semibold" for="sell_rate">Product Image</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6">
                       <button  type="submit" class="btn btn-success pull-right float-right"><i class="anticon anticon-edit"></i> Submit </button>
                     </div>
                   </div>
                   <br><br>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('scripts')
    <script>
       $('document').ready(function(){
            $('#product_type').on('change', function(){
                console.log($(this).val());
                if ($(this).val() == 'giftcard') {
                    $('#prod_name').show();
                } else {
                    $('#prod_name').hide();
                }
            })
       });
    </script>
@endsection
