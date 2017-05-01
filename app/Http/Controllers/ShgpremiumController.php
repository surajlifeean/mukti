<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\identitydetail;

use App\addressdetail;

use App\otherdetail;

use App\loan_allotment;

use App\premium;

use App\Rate;


class ShgpremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $currentdate=Carbon::now();

         $customerdetails=identitydetail::select('group_id')
            
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('nextpremiumdate','<',$currentdate)
        ->where('group_id','!=',0)
        ->distinct()
        ->get();

        $countdues=count($customerdetails);

         $customernames=identitydetail::select('group_id','name')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('group_id','!=',0)
        ->get();


        return view('shgpremium.groupwithdue')->withMatchinglist($customerdetails)->withCount($countdues)->withNames($customernames);

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
       // dd($request);
        //used to store installment details into the database
    
    
     $pays=$request->pay;

     //$amts=$request->amt;

     $fines=$request->fine;

     


           foreach($pays as $key=>$pay) {

            $installmentno=0;
            
              $premiums=new premium;


              $premiums->customer_id=$pay;

              $premiums->fine=$fines[$key];
              
              $premiums->premiumdate=date('Y-m-d
              h:m:s',$request->dateofpre);


                  $installment_no=premium::select('installment_no')
                              ->where('customer_id','=',$pay)
                              ->orderby('installment_no','desc')
                              ->first();
                  
                  if(count($installment_no))
                    $installmentno=$installment_no->installment_no+1; 

                $premiums->installment_no=$installmentno;
        

              $premiums->save();

         $loan_allotment=loan_allotment::where('customer_id','=',$pay)
          ->first();

        $loan_allotment->nextpremiumdate=$loan_allotment->nextpremiumdate->addDays(1);

        $loan_allotment->save();

        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $currentdate=Carbon::now();
        $fine=0;
       // $installment_no=premium::select('installment_no')->get();
        $installmentno=0;

       

        

        $customerdetails=identitydetail::select('identitydetails.id', 'name', 'loan_allotments.created_at','nextpremiumdate','loan_allotments.principal','ewi','noofinstallments')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->join('rates','loan_allotments.principal','=','rates.principal')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->where('group_id','=',$id)
        ->get();








        /*if($currentdate>date('Y-m-d', strtotime($customerdetails->nextpremiumdate. ' + 1 days'))){

                        //$fine=date('d',(strtotime($currentdate))-strtotime($customerdetails->nextpremiumdate));
                      $fdays=date('d',(strtotime($currentdate)))-date('d',(strtotime($customerdetails->nextpremiumdate)));
                    if(($customerdetails->principal)<=5000)
                      $fine=$fdays*10;
                     else
                       $fine=$fdays*20; 
                        }
        
                  $installmentno=$installmentno+1;
*/
                  return view('shgpremium.pay')->withMatchinglist($customerdetails)->withCurrentdate($currentdate)->withGroupid($id);
/*
                 // return redirect()->route('customers.create');
                 */

  
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
