<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\identitydetail;

use App\addressdetail;

use App\otherdetail;

use App\loan_allotment;

use App\premium;

use App\Rate;

use Carbon\Carbon;

class PremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
            $currentdate=Carbon::now();

            $customerdetails=identitydetail::select('identitydetails.id', 'name', 'loan_allotments.created_at', 'address', 'city','pin','state', 'phone_no','occupation','nextpremiumdate')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('nextpremiumdate','<',$currentdate)
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
        //
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

        
        $premium=new premium;

        $premium->customer_id=$request->customer_id;

        $premium->fine=$request->fine;
       
        $premium->premiumdate=$request->premium;
        
        $premium->installment_no=$request->preno;

        $premium->save();

        $loan_allotment=loan_allotment::where('customer_id','=',$premium->customer_id)
            ->first();

        $loan_allotment->nextpremiumdate=$loan_allotment->nextpremiumdate->addDays(1);

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
        //

            $currentdate=Carbon::now();

            $fine=0;

            $customerdetails=identitydetail::select('identitydetails.id', 'name', 'loan_allotments.created_at', 'address', 'city','pin','state', 'phone_no','occupation','nextpremiumdate','principal')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('identitydetails.id','=',$id)
        ->first();

            $premium=Rate::select('ewi')
                        ->where('principal','=',$customerdetails->principal)
                        ->first();
            
        
        
          if($currentdate>date('Y-m-d', strtotime($customerdetails->nextpremiumdate. ' + 1 days'))){

                        //$fine=date('d',(strtotime($currentdate))-strtotime($customerdetails->nextpremiumdate));
                      $fdays=date('d',(strtotime($currentdate)))-date('d',(strtotime($customerdetails->nextpremiumdate)));
                    if(($customerdetails->principal)<=5000)
                      $fine=$fdays*10;
                     else
                       $fine=$fdays*20; 
                        }
          return view('premiums.show')->withCustdetails($customerdetails)->withFine($fine)->withPremium($premium)->withFinedays($fdays);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

          $currentdate=Carbon::now();
        $fine=0;
        $installmentno=premium::max('installment_no');

        if(count($installmentno))
        {

        $installment_no=premium::select('installment_no')
                        ->where('customer_id','=',$id)
                        ->orderby('installment_no','desc')
                        ->first();
        $installmentno=$installment_no->installment_no;   
        }

        $customerdetails=identitydetail::select('identitydetails.id', 'name', 'loan_allotments.created_at','nextpremiumdate','loan_allotments.principal','ewi')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->join('rates','loan_allotments.principal','=','rates.principal')
        ->where('identitydetails.id','=',$id)
        ->first();
        if($currentdate>date('Y-m-d', strtotime($customerdetails->nextpremiumdate. ' + 1 days'))){

                        //$fine=date('d',(strtotime($currentdate))-strtotime($customerdetails->nextpremiumdate));
                      $fdays=date('d',(strtotime($currentdate)))-date('d',(strtotime($customerdetails->nextpremiumdate)));
                    if(($customerdetails->principal)<=5000)
                      $fine=$fdays*10;
                     else
                       $fine=$fdays*20; 
                        }
          

        

                  $installmentno=$installmentno+1;

                  return view('premiums.pay')->withPreno($installmentno)->withMatchinglist($customerdetails)->withFine($fine);

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
