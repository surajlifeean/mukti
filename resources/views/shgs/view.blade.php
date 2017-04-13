
@extends('layouts.app')


@section('content')

<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">View Groups</h1>
</div>

<table class="table table">
   		<tbody>

   		@php
   			$oldval=0;
   		@endphp

   		   		 
  @foreach($details as $detail)
    <tr><td>   
    <div class="row">
       <div class="col-md-8 col-md-offset-2" >

    		
       		 @if ($loop->first)
                	@php
                   		$oldval=$detail->group_id
                   	@endphp
                @else
                  @if($oldval != $detail->group_id)
                   <p><a class="btn btn-primary" href="{{route('loan_allotments.index')}}" role="button">Group  Status</a></p>
                   <hr>

              
                  	@php
                   		$oldval=$detail->group_id
                   	@endphp
                  @endif
                @endif


       			<h3>{{ucwords($detail->name)}}  </h3>
             
                Group ID:{{$detail->group_id}}<br>
                    Resident of:{{$detail->address}},
   	{{$detail->city}},
   	<br>
   	Contact No:{{$detail->phone_no}}
   	

                               @if ($loop->last)
                	<p><a class="btn btn-primary" href="{{route('loan_allotments.index')}}" role="button">Group Status</a></p>
              
                @endif

   
             
              
       </div>
	</div>

           	</td></tr> 
  @endforeach

      
       </tbody>
  </table>
@endsection