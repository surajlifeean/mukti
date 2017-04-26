{{dump($matchinglist)}}
@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Deposit Group Premium</h1>
   <table class="table table-striped">
      <thead>
        <th>
            Member's Name
        </th>
        <th>
            Payment
        </th>
        <th>
            Fine
        </th>
      </thead>
  @foreach($matchinglist as $list)

      <tbody>
       @if ($loop->first)
   
  {{Form::label('principal','Alloted Amount:')}}   
   <input type="text" name="principal" class="form-control" value={{$list->principal}}>

   {{Form::label('ewi','EWI:')}}   
   <input type="text" name="ewi" class="form-control" value={{$list->ewi}}>

   Date of Premium:{{date('jS M, Y', strtotime($list->nextpremiumdate))}}<br>

          @endif
       
      <tr>
        <td>
        {{$list->name}}
        </td>
        <td>
            @if($currentdate>=$list->nextpremiumdate)
                  
                   <input type="checkbox" class="checkbox-primary" name="vehicle" value="{{$list->id}}"><br>
            @else
                  
                   <input type="checkbox" class="checkbox-primary" name="vehicle" value="{{$list->id}}" checked><br>
            
             @endif
        </td>
      </tr>
      <tr><td>
      </td></tr>
  @endforeach
<tr><td>
{{ Form::submit('Pay EWI',array('class'=>'btn btn-success btn-lg','style'=>'margin-top:20px'))}}
</td></tr>
</tbody>
   {{Form::close()}}
</div>
</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.js')!!}
     {!!Html::script('js/select2.js')!!}

@endsection