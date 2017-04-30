
@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
<h1>INSTALLMENT PAID</h1>

@if($clear)
<div class="alert alert-success" role="alert"><h2>Your Loan Has Been Cleared</h2></div>
	</div>
@else
<div class="alert alert-success" role="alert"><h2>Next Premium Date:{{date('d/m/y',strtotime($date))}}</h2></div>
	
@endif
	</div>
</div>

@endsection