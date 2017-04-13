


@extends('layouts.app')


@section('content')


<div class="row">
 <div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Premium Status</h1>

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
   	Fine for {{$finedays}} days is {{$fine}}
   	</td></tr>

   	<tr><td>
   	Installment:{{$premium->ewi}}
   	</td></tr>

   	<tr><td>
   	Joined At:{{date('jS M, Y', strtotime($custdetails->created_at))}}
   	</td></tr>
   <tr><td>
   	Date of Premium:{{date('jS M, Y', strtotime($custdetails->nextpremiumdate))}}<br>
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
   	<a href="{{route('premiums.edit',$custdetails->id)}}" class="btn btn-primary">Pay Premium</a>
      @endif

 
  </div>
</div>
@endsection