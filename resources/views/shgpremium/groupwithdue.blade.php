{{dump($matchinglist)}}



@extends('layouts.app')


@section('content')

<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Due Premium <span class="badge">{{$count}}</span>
            </h1>
</div>

<table class="table table-striped">
   		<tbody>

  {{Form::open(['route'=>['premiums.store'],'method'=>'POST'])}}
      		 
  @foreach($matchinglist as $list)
     <tr><td>
    <div class="row">
       <div class="col-md-8 col-md-offset-2" >
         <div class="list">
          <a href="{{route('shgprem.show',$list->group_id)}}"><b>SHG:{{$list->group_id}}</b></a>
   
       		
           </div>
         </div>
        </div>
    </td></tr>
       @endforeach

      
       </tbody>
  </table>
@endsection