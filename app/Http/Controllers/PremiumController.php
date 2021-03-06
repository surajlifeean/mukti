<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\identitydetail;

use App\addressdetail;

use App\otherdetail;

use DateTime;

use App\loan_allotment;

use App\premium;

use App\rate;

use Carbon\Carbon;

class PremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        // shows list of people whose premium is due
    
            $currentdate=Carbon::now();

            $customerdetails=identitydetail::select('identitydetails.id', 'name', 'loan_allotments.created_at', 'address', 'city','pin','state', 'phone_no','occupation','nextpremiumdate','group_id')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('nextpremiumdate','<',$currentdate)
        ->where('status','=','active')
        ->get();

        $countdues=count($customerdetails);


        return view('premiums.index')->withMatchinglist($customerdetails)->withCount($countdues);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $value = session('key');
        $cleared =session('loanclear');
       return view('premiums.success')->withDate($value)->withClear($cleared);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

       //dd($request);

        $request->session()->put('loanclear',0);

        $premium=new premium;

        $premium->customer_id=$request->customer_id;

        $premium->fine=$request->fine;
      
        $premium->amount_paid=$request->ewi;

        $premium->premiumdate=$request->premium;
        
        $premium->installment_no=$request->preno;

        $premium->save();

        $loan_allotment=loan_allotment::where('customer_id','=',$premium->customer_id)
            ->first();
        $checklastinstallment=rate::select('noofinstallments')
            ->join('loan_allotments','loan_allotments.principal','=','rates.principal')
            ->where('customer_id','=',$premium->customer_id)
            ->first();


         if($premium->installment_no < $checklastinstallment->noofinstallments){

                $loan_allotment->nextpremiumdate=$loan_allotment->nextpremiumdate->addDays(7);
            }

          if($premium->installment_no == $checklastinstallment->noofinstallments){
             $loan_allotment->status="cleared";

          $request->session()->put('loanclear',1);

          }
           
         else
         $request->session()->put('key',$loan_allotment->nextpremiumdate);



        $loan_allotment->save();





        return redirect()->route('premiums.create');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //calls premium status page

            $currentdate=Carbon::now();

            $fine=0;
            $fdays=0;

            $customerdetails=identitydetail::select('identitydetails.id', 'name', 'loan_allotments.created_at', 'address', 'city','pin','state', 'phone_no','occupation','nextpremiumdate','principal','group_id','status','loan_alloted')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('identitydetails.id','=',$id)
        ->first();

            $premium=Rate::select('ewi')
                        ->where('principal','=',$customerdetails->principal)
                        ->first();
          //test data  
        //echo $currentdate;
        //echo "<br>";
        //echo $customerdetails->nextpremiumdate;
        //echo "<br>";
        //echo date('Y-m-d', strtotime($currentdate));


                               $then = new DateTime(date('Y-m-d', strtotime($customerdetails->nextpremiumdate)));
                               $now = new DateTime(date('Y-m-d', strtotime($currentdate)));
        

        
          if(date('Y-m-d', strtotime($currentdate))>date('Y-m-d', strtotime($customerdetails->nextpremiumdate))){

                        //$fine=date('d',(strtotime($currentdate))-strtotime($customerdetails->nextpremiumdate));
                   //now   $fdays=date('d',strtotime($currentdate)-strtotime($customerdetails->nextpremiumdate.' + 2 days'));
                   $fdays=date_diff($then,$now)->format("%d days") -1;
                   

                    if(($customerdetails->principal)<=5000)
                      $fine=$fdays*10;
                     else
                       $fine=$fdays*20; 
                        }

                        if(date('Y-m-d', strtotime($currentdate))<date('Y-m-d', strtotime($customerdetails->nextpremiumdate)))
                            $hidepaypremium=1;
                        else
                            $hidepaypremium=0;


            //to calculate the total outstanding amount
         $customerpayment=loan_allotment::select('loan_allotments.customer_id', 'ewi', 'amount_paid')
        ->join('premia','loan_allotments.customer_id','=','premia.customer_id')
        ->join('rates','loan_allotments.principal','=','rates.principal')
        ->where('loan_allotments.customer_id','=',$id)
        ->get();



          return view('premiums.show')->withCustdetails($customerdetails)->withFine($fine)->withPremium($premium)->withFinedays($fdays)->withHide($hidepaypremium)->withPaydetails($customerpayment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //calls pay premium page

        $currentdate=Carbon::now();
        $fine=0;
       // $installment_no=premium::select('installment_no')->get();
        $installmentno=0;

       

                  $installment_no=premium::select('installment_no')
                              ->where('customer_id','=',$id)
                              ->orderby('installment_no','desc')
                              ->first();
                  
                  if(count($installment_no))
                    $installmentno=$installment_no->installment_no; 

        

        $customerdetails=identitydetail::select('identitydetails.id', 'name', 'loan_allotments.created_at','nextpremiumdate','loan_allotments.principal','ewi','noofinstallments')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->join('rates','loan_allotments.principal','=','rates.principal')
        ->where('identitydetails.id','=',$id)
        ->first();
                               $then = new DateTime(date('Y-m-d', strtotime($customerdetails->nextpremiumdate)));
                               $now = new DateTime(date('Y-m-d', strtotime($currentdate)));
        

        
          if(date('Y-m-d', strtotime($currentdate))>date('Y-m-d', strtotime($customerdetails->nextpremiumdate))){

                        //$fine=date('d',(strtotime($currentdate))-strtotime($customerdetails->nextpremiumdate));           $fdays=date_diff($then,$now)->format("%d days") -1;
                   $fdays=date_diff($then,$now)->format("%d days") -1;
        

                     
                    if(($customerdetails->principal)<=5000)
                      $fine=$fdays*10;
                     else
                       $fine=$fdays*20; 
                        }
        
                  $installmentno=$installmentno+1;

                  return view('premiums.pay')->withPreno($installmentno)->withMatchinglist($customerdetails)->withFine($fine)->withTotinst($customerdetails->noofinstallments);

                 // return redirect()->route('customers.create');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
