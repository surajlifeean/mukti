{{dump($gid)}}

@extends('layouts.app')


@section('content')

{!! Form::open(['route' =>['shgs.update',$gid],'data-parsley-validate'=>'','method'=>'PUT']) !!}

<div class="row">
<div class="col-md-6 col-md-offset-3">
{{Form::label('weightage','Loan Weightage:')}}
    <select class="weightage form-control" name="weightage">
    
          <option value="selects">select</option>
          

          <option value="equal">Equal</option>

          
          <option value="variable">Variable </option>

		    
    </select>
<br>

  <table class="table table-bordered"> 
    <thead>
          <tr>
              <th> Member</th>
              <th class="gs"> Loan Amount</th>
          </tr>
    </thead>
    <tbody>
    @foreach($details as $detail)
    
     <tr>
        <td><input type="hidden" name="id[]" value={{$detail->id}}>{{$detail->name}}
        </td><td> 
        <div class="gs"> <select class="group_size form-control" name="amt[]">

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
          </div>
          </td>
          </tr>
		  @endforeach

      <select class="gs2 form-control" name="amount">

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

      </tbody>
    </table>
  


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
  		$('.gs2').hide();

$('.weightage').change(function(){
         // $('.gs2').hide();
        
  		if($('.weightage').val()=="equal")
  			{	$('.gs').hide();
          $('.gs2').show();
        }
       else 
       {
        $('.gs').show();
            $('.gs2').hide();
          }

  		});

  });

</script>
    
@endsection