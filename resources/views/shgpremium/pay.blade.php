<!--{{dump($matchinglist)}}-->
@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Deposit Group Premium</h1>
         {!! Form::open(['route' => 'shgprem.store','data-parsley-validate'=>'']) !!}

   <table class="table table-striped" style="font-size:10px;">
      <thead>
        <th>
            Pay Date
        </th>
        <th>
            Name
        </th>
        <th>
            Payment
        </th>
        <th>
            Fine
        </th>
        <th>
            Amount Paid
        </th>
      </thead>


  @foreach($matchinglist as $list)

      <tbody>
       @if ($loop->first)
   
              {{Form::label('principal','Alloted Amount To Each Member:')}}   
               <input type="text" name="principal" class="form-control" value={{$list->principal}} readonly>

               {{Form::label('ewi','EWI To Be Paid By Each:')}}   
               <input type="text" name="ewi" class="form-control" value={{$list->ewi}} readonly>



          @endif

@if($list->status=="active")
         @if($list->nextpremiumdate<$currentdate)
   
       
      <tr>
                  <td>

                              <input type="hidden" name='gid' value={{$groupid}}></input>


                                <input type="hidden" name="date[]" class="form-control" value={{strtotime($list->nextpremiumdate)}}>

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
                 
                
                @if(date('Y-m-d', strtotime($currentdate))>date('Y-m-d', strtotime($list->nextpremiumdate)))

                @if($list->principal<=5000)
                            @php

                               $then = new DateTime(date('Y-m-d', strtotime($list->nextpremiumdate)));
                               $now = new DateTime(date('Y-m-d', strtotime($currentdate)));
        
                              $fdays=(date_diff($then,$now)->format("%d days") -1)*10;
                   
                            @endphp
                            <input type="text" name="fine[]" class="form-control" value={{$fdays}} size="2" readonly>

                            @else
                            @php 
                               $then = new DateTime(date('Y-m-d', strtotime($list->nextpremiumdate)));
                               $now = new DateTime(date('Y-m-d', strtotime($currentdate)));
        
                              $fdays=(date_diff($then,$now)->format("%d days")-1)*20;
                            @endphp

                            <input type="text" name="fine[]" class="form-control" value={{$fdays}} size="2" readonly>

                  @endif

                  @else
                     <input type="text" name="fine[]" class="form-control" value=0 size="2" readonly>


                  @endif
                </td>

                <td>
                        <input type="text" name="amount_paid[]" class="form-control">

                </td>
      </tr>
  @endif   
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