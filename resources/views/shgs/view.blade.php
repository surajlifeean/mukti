{{dump($details)}}


@extends('layouts.app')


@section('content')

<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">View Groups</h1>
</div>

<table class="table table-striped">
   		<tbody>

   		   		 
  @foreach($details as $detail)
     <tr><td>
    <div class="row">
       <div class="col-md-8 col-md-offset-2" >

       		
       			<h3>{{ucwords($detail->customer_id)}}  </h3>
             
                  Group ID:{{$detail->group_id}}<br>



                  
   
             </p>
              <p><a class="btn btn-primary" href="{{route('loan_allotments.index')}}" role="button">Allote Loans</a></p>
              <hr>
            
       </div>
	</div>
  @endforeach

      
       </tbody>
  </table>
@endsection