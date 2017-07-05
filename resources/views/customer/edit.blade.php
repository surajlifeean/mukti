@extends('layouts.app')


@section('content')

	
 <div class="row">

   	<div class="col-md-6 col-md-offset-3">

    {!! Form::model($identitydetail,['route'=>['editdetails.update',$identitydetail->id],'method'=>'PUT'])!!}


  	{{Form::label('name', 'Name:')}}
    
  	{{Form::text('name', null, ["class"=>'form-control input-lg'])}}



    {{Form::label('maritalstatus','Marital Status:')}}

    <select class="form-control" name="maritalstatus">
    
    	<option selected={{$identitydetail->marital_status}}>{{ucwords($identitydetail->marital_status)}}</option>
     
     
          <option value="single">Single</option>
          
          <option value="married">Married</option>

          <option value="widow">Widow</option>

          <option value="divorced">Divorced</option>
		    
    </select>


 {{Form::label('pan_no','Pan Card Number:')}}

    {{Form::text('pan_no',null,array('class'=>'form-control','required'=>''))}}


    {{Form::label('aadhar_no','Aadhar Card Number:')}}

    {{Form::text('aadhar_no',null,array('class'=>'form-control','required'=>''))}}


     {{Form::label('address','Address:')}}

	<input type="text" class='form-control' name='address' value={{$addressdetail->address}}>

    {{Form::label('city','City:')}}

	<input type="text" class='form-control' name='city' value={{$addressdetail->city}}>

    {{Form::label('pin','Pin:')}}

    <input type="text" class='form-control' name='pin' value={{$addressdetail->pin}}>

    {{Form::label('phone_no','Phone No.:')}}
	
    <input type="text" class='form-control' name='phone_no' value={{$addressdetail->phone_no}}>


    {{Form::label('income','Gross Annual Income:')}}  

    <select class="form-control" name="income">
    	<option selected={{$otherdetail->salary}}>{{$otherdetail->salary}}</option>
     
          <option value="less than 1 lakhs">Below 1 lakhs</option>
          
          <option value="1-5 lakhs">1 to 5 lakhs</option>

          <option value="5-10 lakhs">5 to 10 lakhs</option>

          <option  value="10-25 lakhs">10 to 25 lakhs</option>

          <option value="over 25 lakhs">more than 25 lakhs</option>  

		    
    </select>

	{{Form::label('occupation','Occupation:')}} 


    <select class="form-control occupation" name="occupation" selected={{$otherdetail->occupation}}>
    		
    	<option selected={{$otherdetail->occupation}}>{{ucwords($otherdetail->occupation)}}</option>
     
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

    {{Form::label('featured_image','Upload Image')}}

    {{Form::file('featured_image')}}

    {{Form::label('featured_image2','Upload Aadhar Image')}}

    {{Form::file('featured_image2')}}

    {{Form::label('featured_image3','Upload PAN Image/Voters ID Image')}}

    {{Form::file('featured_image3')}}



	
    
   
            {{Form::submit('Save Changes',array('class'=>"btn btn-success btn-block form-spacing-top",'style'=>'margin-top:20px'))}}
                  

	  </div>
	
  {!!Form::close()!!}
</div>


@endsection