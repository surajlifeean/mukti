@extends('layouts.app')


@section('content')

{!! Form::open(['route' =>['customers.update','0'],'data-parsley-validate'=>'','method'=>'PUT']) !!}

<div class="row">
<div class="col-md-6 col-md-offset-3">
{{Form::label('individualorshg','Individual/SHG:')}}
    <select class="individualorshg form-control" name="indorshg">
    
     
          <option value="individual">Individual</option>
          
          <option value="shg"> SHG </option>

		    
    </select>
<div class="gs">
{{Form::label('groupsize','Group Size:')}}

        <select class="group_size form-control" name="group_size">
    
     
          <option value="1">Select</option>
          
          <option value="4"> 4 </option>

          <option value="5"> 5 </option>

          <option value="6"> 6 </option>

          <option value="7"> 7 </option>
		    
    </select>
    </div>


     {{ Form::submit('Next',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}



{!!Form::close()!!}
    </div>
 </div>


@endsection


@section('scripts')
	{!! Html::script('js/parsley.js')!!}
     {!!Html::script('js/select2.js')!!}

<script type="text/javascript">


  $(function(){
  		$('.gs').hide();

$('.individualorshg').change(function(){

  		if($('.individualorshg').val()=="shg")
  				$('.gs').show();
  		else
  				$('.gs').hide();
  		});

  });

</script>
    
@endsection