@extends('layouts.app')

@section('stylesheet')
	

@endsection

@section('content')

   		   		 
  @foreach($images as $image)
  		
  		@php
   				$img[]=$image->image;
		@endphp

  @endforeach
<div class="container">
  
     <h1 class="alert alert-success" role="alert">Documents</h1>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{asset('images/'.$img[0])}}" alt="Los Angeles" style="width:100%; height:100%;">
      </div>

      <div class="item">
        <img src="{{asset('images/'.$img[1])}}" alt="Chicago" align="middle" style="width:100%;height:100%;">
         
      </div>
    
    
      <div class="item">
        <img src="{{asset('images/'.$img[2])}}" alt="New york" style="width:100%;height:100%">
      </div>

    </div>
   

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

@endsection