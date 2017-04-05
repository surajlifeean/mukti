@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Choose an option!</div>

                <div class="panel-body">
                <table class="table">
                <b>
                    <tr>
                        <td class="active"><a href="{{route('customers.index')}}">Register Customer</a></td>
                    </tr>
                    <tr>
                        <td class="success">Search Customer</td>
                    </tr>
                    <tr>    
                        <td class="warning">Allote Loan</td>
                    </tr>
                    <tr>    
                        <td class="danger">Premium</td>
                        
                    </tr>
                </b>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
