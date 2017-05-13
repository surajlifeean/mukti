




@extends('layouts.app')


@section('content')

	
 <div class="row">

   	<div class="col-md-6 col-md-offset-3">

    {!! Form::model($identitydetail,['route'=>['editdetails.update',$identitydetail->id],'method'=>'PUT'])!!}


  	{{Form::label('name', 'Name:')}}
    
  	{{Form::text('name', null, ["class"=>'form-control input-lg'])}}



    {{Form::label('maritalstatus','Marital Status:')}}

    <select class="form-control" name="maritalstatus">
    
     
          <option value="single">Single</option>
          
          <option value="married">Married</option>

          <option value="widow">Widow</option>

          <option value="divorced">Divorced</option>
		    
    </select>


 {{Form::label('pan_no','Pan Card Number:')}}

    {{Form::text('pan_no',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('aadhar_no','Aadhar Card Number:')}}

    {{Form::text('aadhar_no',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('city','City:')}}

    {{Form::text('city',null,array('class'=>'form-control','required'=>''))}}


    
                  <div class="col-sm-6">
                  {{Form::submit('Save Changes',array('class'=>"btn btn-success btn-block"))}}
                  </div>

	  </div>
	
  {!!Form::close()!!}
</div>


@endsection