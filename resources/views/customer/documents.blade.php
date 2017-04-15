@extends('layouts.app')

@section('stylesheet')
	
		{!!Html::style('css/parsley.css')!!}

        {!!Html::style('css/select2.css')!!}

@endsection

@section('content')


<div class="row">
	<div class="col-md-6 col-md-offset-3">

{{Form::open(array('route'=>'documents.store','data-parsley-validate'=>'','files'=>true))}}
{{Form::label('featured_image','Upload Image')}}

{{Form::file('featured_image')}}

    {{Form::label('id','ID:')}}

    {{Form::text('id',null,array('class'=>'form-control','required'=>''))}}

{{Form::submit('submit',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}

{{Form::close()}}
</div>
</div>

@endsection


@section('scripts')
	{!! Html::script('js/parsley.js')!!}
     {!!Html::script('js/select2.js')!!}

@endsection