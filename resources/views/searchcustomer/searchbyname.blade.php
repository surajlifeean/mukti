
@extends('layouts.app')


@section('content')
  
<div class="row">
	<div class="col-md-6 col-md-offset-3">
  	{{Form::open(['route'=>['searchcustomers.store'],'method'=>'POST'])}}

 		 {{Form::label('searchby','Search By')}}

 		<select class="form-control searchby" name="searchby">
    
     
          <option value="name">Name</option>
          
          <option value="city">Place</option>
		    
    </select>
<br>
<b>
  		<p>Enter the name or a few letter of name</p>  </b>
  		{{Form::text('name',null,['class'=>'form-control'])}}
  		{{Form::submit('search',['class'=>'btn btn-primary'])}}

  	{{Form::close()}}
  	</div>
 </div>

@endsection


@section('scripts')

<script type="text/javascript">


$('.searchby').change(function(){


    if($('.searchby').val()=="place")
    	$('p').html("Enter the name of the place or few letters");


});


</script>
    
@endsection