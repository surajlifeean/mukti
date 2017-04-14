
@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Deposit Premium</h1>
   {{Form::open(['route'=>['premiums.store'],'method'=>'POST'])}}
   <h3>{{Form::label('name',$matchinglist->name)}}</h3><br>

	{{Form::label('principal','Alloted Amount:')}}   
   <input type="text" name="principal" class="form-control" value={{$matchinglist->principal}}>

   {{Form::label('ewi','EWI:')}}   
   <input type="text" name="ewi" class="form-control" value={{$matchinglist->ewi}}>
   

   {{Form::label('fine','Fine:')}}   
   <input type="text" name="fine" class="form-control" value={{$fine}}>
   
   Installment No:{{Form::label('fine',$preno)}}/<b>{{$totinst}}</b>
   
   <input type="hidden" name="premium" class="form-control" value={{$matchinglist->nextpremiumdate}}>
   
    <input type="hidden" name='customer_id' value={{$matchinglist->id}}></input>


    <input type="hidden" name='preno' value={{$preno}}></input>

{{ Form::submit('Pay EWI',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}


   {{Form::close()}}
</div>
</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.js')!!}
     {!!Html::script('js/select2.js')!!}

@endsection