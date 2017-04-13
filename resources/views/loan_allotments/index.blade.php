

@extends('layouts.app')


@section('content')

<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Loan Allotment<span class="badge">{{$count}}</span></h1>
</div>

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
   	{{$list->pin}}.<br>
   	Contact No:{{$list->phone_no}}
   	Occupation:{{$list->occupation}}<br>
    Registerd At:{{Date('d-m-y',strtotime($list->created_at))}}<br>

    @if($list->group_id)
     <b>SHG:{{$list->group_id}}</b>
    @endif
             </p>
              <p><a class="btn btn-primary" href="{{route('loan_allotments.show',$list->id)}}" role="button">Allote Loans</a></p>
              <hr>
         </div>
       </div>

    </div>
       		</td></tr>
       @endforeach

      
       </tbody>
  </table>
@endsection