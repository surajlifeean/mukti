@extends('layouts.app')


@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Allote Amount</h1>
   {{Form::open(['route'=>['loan_allotments.store'],'method'=>'POST'])}}
   {{Form::label('principal','Alloted Amount:')}}

    <input type="hidden" name='customer_id' value={{$customerid}}></input>

  <select class="form-control principal" name="principal">
    

          <option value="0000">Select Amount</option>
     
     
          <option value="1000">Rs 1000</option>
          
          <option value="2000">Rs 2000</option>

          <option value="3000">Rs 3000</option>


          <option value="4000">Rs 4000</option>
          
          <option value="5000">Rs 5000</option>

          <option value="6000">Rs 6000</option>


          <option value="7000">Rs 7000</option>

          
          <option value="8000">Rs 8000</option>
          
          <option value="9000">Rs 9000</option>

          <option value="10000">Rs 10000</option>


                 
		    
    </select>


   {{Form::label('processfee','Processing Fees:')}}
   <input type="text" name="processfee" class="form-control processfee">
   {{Form::label('padsqty','Quantity Of Pads:')}}
   <input type="text" name="padsqty" class="form-control padsqty">
   {{Form::label('padscost','Pads Purchase Cost:')}}
   <input type="text" name="padscost" class="form-control padscost">   
       {{ Form::submit('Confirm',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}

   {{Form::close()}}
</div>
</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.js')!!}
     {!!Html::script('js/select2.js')!!}

<script type="text/javascript">

$('.principal').change(function(){


    if($('.principal').val()<3000)
    	$('.processfee').attr('value',20);
    
    else if($('.principal').val()<6000)
    	$('.processfee').attr('value',50);
    else
    	$('.processfee').attr('value',100);
});

$('.padsqty').change(function(){
 	var cost=$('.padsqty').val()*4.5;
 	$('.padscost').attr('value',cost);

});


</script>


@endsection