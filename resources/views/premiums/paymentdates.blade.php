<html lang="en">
<head>
  <meta charset="utf-8">
  <title>datepicker demo</title>
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
 
<div id="datepicker"></div>
 
<script>
/*set date picker so that no weekend is selectable..
$( "#datepicker" ).datepicker({
  beforeShowDay: $.datepicker.noWeekends

});
*/
$(document).ready(function() {
    var holidays = ["2017-06-03","2017-06-13","2017-07-24"];
    $('#datepicker').datepicker({
      //  dateFormat: "yy-mm-dd",
        beforeShowDay: function(date) {
        	
        	var day=date.getDay();
        	if(day==0)
        	{
				return [true,"markholiday"];
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