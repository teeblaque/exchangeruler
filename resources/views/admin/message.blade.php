<?php
use App\PostModel;
?>
@extends('user.main')

@section('title')
    <h4>
        <i class="icon-folder-add"></i>
    </h4>
@endsection

@section('stylesheet')
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection

@section('contents')
    <div class="container-fluid animatedParent animateOnce">
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card r-0 shadow">
                        <div class="card-header white pb-0">
                        </div>
                        <div class="card-body">
                             @foreach(PostModel::all() as $post)
                            <input type="hidden" name="id" /><br>
                            <input type="text" class="form-control" placeholder="Enter subject here" value="{{$post['subject']}}"
                             name="subject" readonly/><br>
                            <textarea class="form-control" name="message" readonly>{{$post['message']}}</textarea><br>
                            <a href='/admin/update' class="btn btn-primary" type="submit" readonly>Update message</a>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


   
@endsection











 