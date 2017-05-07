
@extends('layouts.app')


@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">

			<h3>Are You Sure You Want to Un-Register  {{ucwords($matchinglist->name)}} ?</h3>

			{!! Form::open(['route' => ['unregcust.destroy',$matchinglist->id],'method'=>'delete']) !!}

             {{ Form::submit('Yes!',array('class'=>'btn btn-danger'))}}
    	<a class="btn btn-info " href="{{route('searchcustomers.index')}}" role="button">No.</a>


    
{!! Form::close() !!}

  	</div>
 </div>  

@endsection


