
{{dump($groupmembers)}}


@extends('layouts.app')


@section('content')


<div class="row">
 <div class="col-md-8 col-md-offset-2">
    <h1 class="alert alert-success" role="alert">Nominate Mukti Maa</h1>

{!! Form::open(['route' => 'muktimaa.store','data-parsley-validate'=>'']) !!}

	@foreach($groupmembers as $member)
	
	  <input class=".radio-primary" type="radio" name="maa" value={{$member->id}}> {{$member->name}}  <br>
	
	@endforeach


    {{ Form::submit('Done',array('class'=>'btn btn-success btn-md','style'=>'margin-top:20px'))}}

    
{!! Form::close() !!}

	 </div>
</div>
@endsection