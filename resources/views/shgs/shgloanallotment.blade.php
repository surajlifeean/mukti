<!--{{dump($gid)}}-->

@extends('layouts.app')


@section('content')

{!! Form::open(['route' =>['shgs.update',$gid],'data-parsley-validate'=>'','method'=>'PUT']) !!}

<div class="row">
<div class="col-md-6 col-md-offset-3">
<!--
{{Form::label('weightage','Loan Weightage:')}}
   <select class="weightage form-control" name="weightage">
    
          <option value="selects">select</option>
          

          <option value="equal">Equal</option>

          
          <option value="variable">Variable </option>

		    
    </select>
<br>
-->


    <select class="principal form-control" name="amt">

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
         
<div class="form-spacing-top">
  <table class="table table-bordered"> 
    <thead>
          <tr>
              <th> Member</th>
              
              <th> Pads Qty</th>

          </tr>
    </thead>
    <tbody>

    @foreach($details as $detail)
    
     <tr>
        <td>
            <input type="hidden" name="id[]" value={{$detail->id}}>{{$detail->name}}
        </td>

        <td>
              <input type="text" class="form-control" name="pdsqty[]" id="i{{$detail->id}}">
          </td>


      </tr>
		  @endforeach



      </tbody>
    </table>
  
</div>

     {{ Form::submit('Allot',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}



{!!Form::close()!!}
    </div>
 </div>


@endsection


@section('scripts')
	{!! Html::script('js/parsley.js')!!}
     {!!Html::script('js/select2.js')!!}

<script type="text/javascript">


  $(function(){

$('.principal').change(function(){


    if($('.principal').val()<3000)
      $('.processfee').attr('value',20);
    
    else if($('.principal').val()<6000)
      $('.processfee').attr('value',50);
    else
      $('.processfee').attr('value',100);
});

  });

</script>
    
@endsection