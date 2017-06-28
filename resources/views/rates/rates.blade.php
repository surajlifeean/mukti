

@extends('layouts.app')


@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
  

   <h1 class="alert alert-success" role="alert">Rate Chart</h1>

<table class="table table-striped">

<thead>
	<tr>
		<th>Scheme</th>

		<th>Principal</th>
			
		<th>No Of Installments</th>
		
		<th>EWI</th>
		
		<th>Processing Fees</th>
		
		<th>Pads Quantity</th>		
	</tr>
</thead>	
<tbody>

   		   		 
  @foreach($rates as $rate)
     <tr>
     	<td>M
    {{$rate->scheme}}
    </td>
    <td>
   	{{$rate->principal}}
   	</td>
    <td>
   	{{$rate->noofinstallments}}
   	</td>
    <td>
   	{{$rate->ewi}}
   	</td><td>
   	{{$rate->processingfees}}
   	</td><td>
   	{{$rate->muktipadsqty}}

             
    </td>
  </tr>
  @endforeach

      
</tbody>
       </table>
       </div>
    </div>

@endsection