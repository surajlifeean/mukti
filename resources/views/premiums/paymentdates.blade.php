{{dump($match)}}

@extends('layouts.app')

@section('stylesheets')
			
			 <style type="text/css">


  			.markholiday a{
  				
          color: #ff00ff !important;
  			}

    .event a {
    background-color: #42B373 !important;
    background-image :none !important;
    color: #ffffff !important;
}

   .stdate a {
    background-color: #ff0000 !important;
    background-image :none !important;
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
      <td>


        <b>
      Loan Alloted On:{{date('jS M, Y', strtotime($loanallotmnt->created_at))}}  

        @php
          $loanallot=date("j M, Y", strtotime($loanallotmnt->created_at));

          $stdate=date("Y-m-d", strtotime($loanallotmnt->created_at));




         
      @endphp
    
        </b>
      </td>
   	<tr>
		<th>Premium Date</th>

		<th>Payment Date</th>

    <th>Payment paid</th>

		<th>Fine</th>
				
	</tr>


   </thead>	
   	<tbody> 

   @if(count($match))
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
        {{$list->amount_paid}}  
        </td>
        
          
          <td>
              {{$list->fine}}
          </td>


        
        </tr>
       @endforeach

  @else
<tr>
  <td align="right">
  No   
  </td>
  <td>
  Payments
  </td>
  <td>
  made
  </td>
  <td>
  yet!
  </td>
</tr>
    @php
    $date=date('Y-m-d');
    @endphp
    
  @endif


  
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

	 var paymentdate =<?php  echo json_encode($date); ?>; 

   var loanallot= <?php  echo json_encode($loanallot); ?>;

   var stdate="2017-07-04";
   //<?php // echo json_encode($stdate); ?>;

   var d = new Date(loanallot);


   // var holidays = ["2017-06-03","2017-06-13","2017-07-24"];
    $('#datepicker').datepicker({
      //  dateFormat: "yy-mm-dd",
        beforeShowDay: function(date) {
        	
        	var day=date.getDay();
          var testday=d.getDay()==0?6:d.getDay()-1;


        	if(day==testday & d<=date)
        	{
				      return [true,"markholiday"];
        	}


          if(d<=date) {

            var formatteddate=jQuery.datepicker.formatDate("yy-mm-dd",date);
            // converting the calerder date to the format of the one received from db
            return [true, (paymentdate.indexOf(formatteddate)==-1)?"":"event",""];

          }




      }

    });
});

</script>
@endsection