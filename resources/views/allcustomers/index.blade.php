


@extends('layouts.app')





@section('content')



<table class="table table-striped">
   		   		   		 
  @foreach($matchinglist as $list)
     <tr><td>
    <div class="row">
       <div class="col-md-8 col-md-offset-2" >
         <div class="list">
           <h3>{{ucwords($list->name)}}  </h3>
             <p>
    Resident of:{{$list->address}},
   	{{$list->city}},
   	{{$list->pin}},
   	{{$list->state}},
   	{{$list->country}}.<br>
   	Contact No:{{$list->phone_no}}<br>
	Joined At:{{date('jS M, Y', strtotime($list->created_at))}}
   
              <a class="btn" href="{{route('customers.show',$list->id)}}" role="button"><span class="glyphicon glyphicon-list-alt"></span></a>
              
              
              <a class="btn" href="{{route('editdetails.edit',$list->id)}}" role="button"><span class=" glyphicon glyphicon-pencil"></span></a>


              @if($list->loan_alloted==1)
              <a class="btn" href="{{route('paymentreport.show',$list->id)}}" role="button"><span class="glyphicon glyphicon-stats"></span></a>
              @endif
              </p>
              <hr>
         </div>
       </div>

    </div>
       		</td></tr>
       @endforeach

       
  </table>

		<p>Date: <input type="button" id="datepicker"></p>
 
@endsection


