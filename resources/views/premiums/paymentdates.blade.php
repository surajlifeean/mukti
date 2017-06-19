
@extends('layouts.app')

@section('stylesheets')
			
			 <style type="text/css">


  			.markholiday .ui-state-default{
  				color:red;
  			}


             </style>

@endsection


@section('content')



 
 <div class="row">
 <div class="col-md-8 col-md-offset-2">
   <h1 class="alert alert-success" role="alert">Payment Report</h1>

		<div align="center" id="datepicker"></div>



<table class="table table-striped">
   
   <thead>
   	<tr>
		<th>Premium Date</th>

		<th>Payment Date</th>

		<th>Fine</th>
				
	</tr>


   </thead>	
   	<tbody>  		  
  @foreach($match as $list)
     <tr>

     		<td>
     		{{date('jS M, Y', strtotime($list->premiumdate))}}	
     		</td>
     		<td>
    		
   			{{date('jS M, Y', strtotime($list->created_at))}}

   			@php
   				$date[]=date("Y-m-d", strtotime($list->created_at));
			@endphp
   	
        

       		</td>
       		
       		<td>
       				{{$list->fine}}
       		</td>
       	</tr>
       @endforeach

    </tbody>  
  </table>

</div>
</div>

 @endsection

@section('scripts')
<script>
/*set date picker so that no weekend is selectable..
$( "#datepicker" ).datepicker({
  beforeShowDay: $.datepicker.noWeekends

});
*/
$(document).ready(function() {

	 var holidays = <?php echo json_encode($date); ?>;
   // var holidays = ["2017-06-03","2017-06-13","2017-07-24"];
    $('#datepicker').datepicker({
      //  dateFormat: "yy-mm-dd",
        beforeShowDay: function(date) {
        	
        	var day=date.getDay();
        	if(day==0)
        	{
				return [true,""];
        	}
        	else{

        		var formatteddate=jQuery.datepicker.formatDate("yy-mm-dd",date);
        		return [true, (holidays.indexOf(formatteddate)==-1)?"":"markholiday"];

        	}

        		        }
    });
});

</script>
@endsection