
@extends('layouts.app')


@section('content')


<div class="row">
 <div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Customer Details</h1>

   <table class="table table-striped">
   		<tbody>
   		<tr><td>
   Customer Name: {{$custdetails->name}}

   		</td></tr>
   		<tr><td>
   	{{$custdetails->relation}}'s Name:{{$custdetails->gardian}}
   	</td></tr>
   	
   	<tr><td>
   	Gender:{{$custdetails->gender}}
   	</td></tr>

    <tr><td>
     Marital Status:{{$custdetails->marital_status}}
   </td></tr>
   
   
     

    
    <tr><td>
   Pan No:{{$custdetails->pan_no}}
   	</td></tr>
   <tr><td>
   Aadhar No:{{$custdetails->aadhar_no}}
   	</td></tr>

   <tr><td>
   	Identity Proof Submitted:{{$custdetails->idproof}}
   	</td></tr>
   	<tr><td>
   	Born On:{{$custdetails->dob}}
   	</td></tr>

   	<tr><td>
   	Address:{{$custdetails->address}},
   	{{$custdetails->city}},
   	{{$custdetails->pin}},
   	{{$custdetails->state}}.
      </td></tr>
      <tr><td>
   	Group_id:{{$custdetails->group_id}}.
   	</td></tr>
    <tr><td>
   	Contact No:{{$custdetails->phone_no}}
   	</td></tr>
   	<tr><td>
   	Proof of Address:{{$custdetails->addressproof}}
   	</td></tr>
   	<tr><td>
   	Annual Salary:{{$custdetails->salary}}
   	</td></tr>

   	<tr><td>
   	Occupation:{{$custdetails->occupation}}
   	</td></tr>
   	<tr><td>
   	Joined At:{{date('jS M, Y', strtotime($custdetails->created_at))}}
   	</td></tr>
   <tr><td>
   	Registered By:{{$custdetails->registered_by}}
   	</td></tr>
   		</tbody>
   	</table>
<tr><td >
   	<a href="{{url('home')}}" class="btn btn-primary">Home Page</a>

      @if($custdetails->loan_alloted)
   	<a href="{{route('premiums.show',$custdetails->id)}}" class="btn btn-primary">Premium Status</a>
      @endif

         @if($count)
       <a href="{{route('customers.index')}}" class="btn btn-primary">Add Next</a>
      @endif
 
</td></tr>
  </div>
</div>
@endsection