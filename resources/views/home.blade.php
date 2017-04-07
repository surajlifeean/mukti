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
                        <td class="danger"><a href="{{route('rates.getrates')}}">Check Rates</a></td>
                        
                    </tr>
                    <tr>
                        <td class="active"><a href="{{route('customers.index')}}">Register Customer</a></td>
                    </tr>
                    <tr>
                        <td class="success"><a href="{{route('searchcustomers.index')}}">  Search Customer</a></td>
                    </tr>
                    <tr>    
                        <td class="warning"><a href="{{route('loan_allotments.index')}}">  Allote Loan</a></td>
                    </tr>
                    <tr>    
                        <td class="danger"><a href="{{route('premiums.index')}}"> Premium</a></td>
                        
                    </tr>


                </b>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
