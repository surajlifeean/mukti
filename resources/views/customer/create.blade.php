@extends('layouts.app')

@section('stylesheet')
	
		{!!Html::style('css/parsley.css')!!}

    {!!Html::style('css/select2.css')!!}

@endsection

@section('content')


<div class="row">
 <div class="col-md-8 col-md-offset-2">
   <h1>Register Customer</h1>

   <hr>
   <h3>Identity Details</h3>
{!! Form::open(['route' => 'customers.store','data-parsley-validate'=>'','files'=>true]) !!}


    			{{ Form::label('name','Name:')}}

    			{!!Form::text('name',null,['class'=>'form-control','required'=>''])!!}


    			{{ Form::label('spouseorfather',"Father's/Husband's Name:")}}

    {{ Form::text('spouseorfather',null,array('class'=>'form-control','required'=>''))}}

    <select class="form-control" name="relation">
    
     
          <option value="father">Father</option>
          
          <option value="husband">Husband</option>
		    
    </select>


    {{Form::label('pan','Pan Card Number:')}}

    {{Form::text('pan',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('aadhar','Aadhar Card Number:')}}

    {{Form::text('aadhar',null,array('class'=>'form-control','required'=>''))}}

    {{Form::label('gender','Gender:')}}

    <select class="form-control" name="gender">
    
     
          <option value="male">Male</option>
          
          <option value="female">Female</option>
		    
    </select>


    {{Form::label('maritalstatus','Marital Status:')}}

    <select class="form-control" name="maritalstatus">
    
     
          <option value="single">Single</option>
          
          <option value="married">Married</option>

          <option value="widow">Widow</option>

          <option value="divorced">Divorced</option>
		    
    </select>

    {{Form::label('dob','Date of Birth:')}}

    

    <input class="form-control" type="date" name="bday">


    {{Form::label('idproof','Proof of Identity:')}}

    

    <select class="form-control idproof" name="idproof">
    
     
          <option value="pancard">Pan Card</option>
          
          <option value="aadharcard">Aadhar Card </option>

          <option value="passport">Passport</option>

          <option  value="others">Others</option>       
		    
    </select>

    <p class="others"></p>


<h3>Address Details</h3>

	{{Form::label('address','Address:')}}

    {{Form::textarea('address',null,array('class'=>'form-control','style'=>'height:50px','required'=>''))}}


    {{Form::label('city','City/Town/Village:')}}

    {{Form::text('city',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('state','State:')}}

    {{Form::text('state',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('country','Country:')}}

    {{Form::text('country',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('pin','Pin Code:')}}

    {{Form::text('pin',null,array('class'=>'form-control','required'=>''))}}
    
    {{Form::label('contact','Mobile No:')}}

    {{Form::text('contact',null,array('class'=>'form-control','required'=>''))}}

    {{Form::text('addproof',null,array('class'=>'form-control','required'=>'','placeholder'=>'Specify the Proof of address'))}}

    <h3>Other Details</h3>
    {{Form::label('income','Gross Annual Income:')}}  

    <select class="form-control" name="income">
    
     
          <option value="less than 1 lakhs">Below 1 lakhs</option>
          
          <option value="1-5 lakhs">1 to 5 lakhs</option>

          <option value="5-10 lakhs">5 to 10 lakhs</option>

          <option  value="10-25 lakhs">10 to 25 lakhs</option>

          <option value="over 25 lakhs">more than 25 lakhs</option>  

		    
    </select>

	{{Form::label('occupation','Occupation:')}} 


    <select class="form-control occupation" name="occupation">
    
     
          <option value="private sector">Private Sector</option>
          
          <option value="Public Sector">Public Sector</option>

          <option value="Agriculture">Agriculture</option>


          <option value="Government Service">Government Service</option>
          
          <option value="Retired">Retired</option>

          <option value="Housewife">Housewife</option>


          <option value="Business">Business</option>

          
          <option value="Professional">Professional</option>
          
          <option value="Student">Student</option>

          <option value="Housewife">Housewife</option>


            <option  value="others">Others</option>       
		    
    </select>

    <p class="otheroccupation"></p>
 
	

    {{Form::label('featured_image','Upload Image')}}

    {{Form::file('featured_image')}}

    {{Form::label('featured_image2','Upload Aadhar Image')}}

    {{Form::file('featured_image2')}}

    {{Form::label('featured_image3','Upload PAN Image/Voters ID Image')}}

    {{Form::file('featured_image3')}}

    {{ Form::submit('Save and Next',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}

    
{!! Form::close() !!}
</div>
</div>


@endsection



@section('scripts')
	{!! Html::script('js/parsley.js')!!}
     {!!Html::script('js/select2.js')!!}

<script type="text/javascript">

$('.select2-multi').select2();

$('.idproof').change(function(){


    if($('.idproof').val()=="others")
    	$('.others').html("<input type='text' name='otheridproof' placeholder='Please Specify' class='form-control'>");


});

$('.occupation').change(function(){


    if($('.occupation').val()=="others")
    	$('.otheroccupation').html("<input type='text' placeholder='please specify' name='otheroccupation' class='form-control' >");


});

</script>
    
@endsection