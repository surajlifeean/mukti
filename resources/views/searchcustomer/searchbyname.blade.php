@extends('layouts.app')


@section('content')
  
<div class="row">
	<div class="col-md-6 col-md-offset-3">
  	{{Form::open(['route'=>['searchcustomers.store'],'method'=>'POST'])}}
  		{{Form::label('name','Enter the name or a few letter of name')}}
  		{{Form::text('name',null,['class'=>'form-control'])}}
  		{{Form::submit('search',['class'=>'btn btn-primary'])}}

  	{{Form::close()}}
  	</div>
 </div>

@endsection