

@extends('layouts.app')


@section('content')



<table class="table table-striped">
   		<tbody>

   		   		 
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
   	Contact No:{{$list->phone_no}}
             </p>
              <p><a class="btn btn-primary" href="{{route('customers.show',$list->id)}}" role="button">Get Complete Details</a></p>
              <hr>
         </div>
       </div>

    </div>
       		</td></tr>
       @endforeach

      
       </tbody>
  </table>
@endsection