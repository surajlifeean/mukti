
@extends('layouts.app')


@section('content')
@php
            $totalewi=0;
            $totalpaid=0;
         @endphp

  @foreach($paydetails as $pay)
      
         @php
            $totalewi=$totalewi+$pay->ewi;
            $totalpaid=$totalpaid+$pay->amount_paid;
         @endphp
      

  @endforeach

<div class="row">
 <div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Premium Status</h1><h3><b>Due Amount:Rs{{$totalewi-$totalpaid}}
</b></h3>
   <table class="table table-striped">
   		<tbody>
   		<tr><td>
   Customer Name: {{$custdetails->name}}

   		</td></tr> 
   	<tr><td>
   	Address:{{$custdetails->address}},
   	{{$custdetails->city}},
   	{{$custdetails->pin}},
   	{{$custdetails->state}},
   	</td></tr>
    <tr><td>
   	Contact No:{{$custdetails->phone_no}}
   	</td></tr>

	

   	<tr><td>
   	Loan Amount:{{$custdetails->principal}}
   	</td></tr>

   	<tr><td>
    <b>	Fine for {{$finedays}} days = Rs{{$fine}}</b>
   	</td></tr>

   	<tr><td>
   	Installment:{{$premium->ewi}}
   	</td></tr>

   	<tr><td>
   	Loan Allotment Date:{{date('jS M, Y', strtotime($custdetails->created_at))}}
   	</td></tr>
   <tr><td>
   	Latest Due Premium Date:{{date('jS M, Y', strtotime($custdetails->nextpremiumdate))}}<br>
      </td></tr>
   <tr><td>
      Today is:{{date("jS M, Y")}}
   	</td></tr>
   		</tbody>
   	</table>
   	<a href="{{route('premiums.index')}}" class="btn btn-primary">Back</a>
      @if($hide)
        <p></p>
      @else
      @if($custdetails->status=="active")
         @if($custdetails->group_id)            
            	<a href="{{route('shgprem.show',$custdetails->group_id)}}" class="btn btn-primary">Pay Premium</a>
         @else
                <a href="{{route('premiums.edit',$custdetails->id)}}" class="btn btn-primary">Pay Premium</a>   
         @endif
      @endif 
      @endif

 
  </div>
</div>
@endsection