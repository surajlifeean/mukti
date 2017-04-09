
@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">

<div class="alert alert-success" role="alert"><h2>Next Premium Date:{{date('d/m/y',strtotime($date))}}</h2></div>
	</div>
</div>

@endsection