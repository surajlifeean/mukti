@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                <table class="table">
                <b>
                    
                    <tr>
                        <td class="active" align="center"><a href="{{route('shgs.create')}}">Create SHG</a></td>
                    </tr>
                    <tr>
                        <td class="success" align="center"><a href="{{route('searchcustomers.index')}}">Edit SHG</a></td>
                    </tr>

                    <tr>    
                        <td class="danger" align="center"><a href="{{route('indorshg.view')}}">View SHG</a></td>
                        
                    </tr>

                    <tr>    
                        <td class="warning" align="center"><a href="{{route('loan_allotments.index')}}"> SHG Loan Allotment</a></td>
                    </tr>

                    <tr>    
                        <td class="success" align="center"><a href="{{route('premiums.index')}}"> Premium</a></td>
                        
                    </tr>
                    
                  

                </b>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
