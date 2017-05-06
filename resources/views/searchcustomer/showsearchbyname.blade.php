

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
   	Contact No:{{$list->phone_no}}
             </p>
              <p>
              <a class="btn" href="{{route('customers.show',$list->id)}}" role="button"><span class="glyphicon glyphicon-list-alt"></span></a>
              
              <a class="btn" href="{{route('customers.show',$list->id)}}" role="button"><span class="glyphicon glyphicon-trash"></span></a>
              
              <a class="btn" href="{{route('customers.show',$list->id)}}" role="button"><span class=" glyphicon glyphicon-pencil"></span></a>
              </p>
              <hr>
         </div>
       </div>

    </div>
       		</td></tr>
       @endforeach

      
  </table>
@endsection