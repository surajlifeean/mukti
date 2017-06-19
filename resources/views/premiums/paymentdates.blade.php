<!--{{dump($match)}}-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>datepicker demo</title>

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style type="text/css">


  	.markholiday .ui-state-default{
  		color:red;
  	}


  </style>
</head>
<body>
 
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
 
</body>
</html>