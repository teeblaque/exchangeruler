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
                             <form  method="POST" action="/admin/update" >
                                @csrf
                            <input type="text" class="form-control"  name="subject" value="{{$post['subject']}}" 
                            placeholder="Subject here"/><br>
                            <textarea class="form-control" name="message"  placeholder="message here">{{$post['message']}}</textarea><br>
                            <button class="btn btn-primary" type="submit">Update Message</button>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


   
@endsection











 