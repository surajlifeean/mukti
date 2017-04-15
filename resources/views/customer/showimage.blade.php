
@extends('layouts.app')


@section('content')


<div class="row">
 <div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Customer Pic</h1>

   <img src="{{asset('images/'.$img->image)}}">

   

   	<a href="{{url('home')}}" class="btn btn-primary">Home Page</a>

     
  </div>
</div>
@endsection