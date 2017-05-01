<!--{{dump($matchinglist)}}-->
@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Deposit Group Premium</h1>
         {!! Form::open(['route' => 'shgprem.store','data-parsley-validate'=>'']) !!}

   <table class="table table-striped">
      <thead>
        <th>
            Premium Date
        </th>
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
   
  {{Form::label('principal','Alloted Amount To Each Member:')}}   
   <input type="text" name="principal" class="form-control" value={{$list->principal}} readonly>

   {{Form::label('ewi','EWI:')}}   
   <input type="text" name="ewi" class="form-control" value={{$list->ewi}} readonly>


      <input type="hidden" name="dateofpre" class="form-control" value={{strtotime($list->nextpremiumdate)}}>

          @endif
       
      <tr>
        <td>

    <input type="hidden" name='gid' value={{$groupid}}></input>

        {{date('jS M, Y', strtotime($list->nextpremiumdate))}}
        </td>

        <td>
        {{$list->name}}
        </td>
        <td>
            @if($currentdate>=$list->nextpremiumdate)
                  
                   <input type="checkbox" class="checkbox-primary" name="pay[]" value="{{$list->id}}"><br>
            @else
                  
                   <input type="checkbox" class="checkbox-primary" name="pay[]" value="{{$list->id}}" checked><br>
            
             @endif
        </td>
      
      <td>
       
      @if($currentdate>date('Y-m-d', strtotime($list->nextpremiumdate. ' + 1 days')))
      
      @if($list->principal<=5000)
                  @php
                     $fdays=date('d',(strtotime($currentdate)-strtotime($list->nextpremiumdate.' + 1 days')))*10;
                     if($fdays==310)
                       $fdays=0;
                  @endphp
                  <input type="text" name="fine[]" class="form-control" value={{$fdays}} size="2" readonly>

                  @else
                  @php 
                    $fdays=date('d',strtotime($currentdate)-strtotime($list->nextpremiumdate.' + 1 days'))*20;
                    if($fdays==310)
                       $fdays=0;
                  @endphp

                  <input type="text" name="fine[]" class="form-control" value={{$fdays}} size="2" readonly>

        @endif
      </td>
      </tr>
     @endif
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