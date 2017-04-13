@extends('layouts.app')

@section('stylesheets')

		{!!Html::style('css/parsley.css')!!}

    {!!Html::style('css/select2.css')!!}


{!!Html::style('css/style.css')!!}

    
     

@endsection


@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">

	{!! Form::open(['route' => 'shgs.store','data-parsley-validate'=>'']) !!}

    {{Form::label('groupmembers','Select Members:')}}

    <select class="form-control select2-multi" name="groupmembers[]" multiple="multiple">
    
       @foreach($members as $member)

          <option value={{$member->id}}><b>{{$member->name}}</b>,{{$member->phone_no}}</option>
          
    @endforeach
    </select>
    {{Form::submit('Submit', ['class'=>'btn btn-primary form-spacing-top'])}}
    {{Form::close()}}

	</div>
</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js')!!}
  {!!Html::script('js/select2.js')!!}

<script type="text/javascript">

$('.select2-multi').select2();

</script>
    
@endsection

