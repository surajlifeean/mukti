<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\identitydetail;

use App\addressdetail;

use App\otherdetail;

use App\loan_allotment;

use Carbon\Carbon;

use Session;

class Loan_allotmentController extends Controller
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
        //
            $customerdetails=identitydetail::select('identitydetails.id', 'name', 'identitydetails.created_at', 'address', 'city','pin','state', 'phone_no','occupation','group_id')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->where('loan_alloted','=',0)
        ->get();

          $countdues=count($customerdetails);

        return view('loan_allotments.index')->withMatchinglist($customerdetails)->withCount($countdues);
        

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

         $this->validate($request, [
        'principal' => 'required|max:255',
        'processfee' => 'required',
        'padscost' => 'required',
        
    ]);


        $loan=new loan_allotment;

        $loan->principal=$request->principal;

        $loan->processfee=$request->processfee;
       
        $loan->padscost=$request->padscost;
        
        $loan->customer_id=$request->customer_id;

        $loan->nextpremiumdate=Carbon::now()->addDays(6);

        $loan->status="active";

        $loan->save();

       // $loan->save();

        $otherdetails=otherdetail::where('customer_id','=',$request->customer_id)->first();

        $otherdetails->loan_alloted=1;

        $otherdetails->save();



        Session::flash('success','The loan is sucessfully Alloted!');

        return view('loan_allotments.success');




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
        $allotshg=otherdetail::where('customer_id','=',$id)
        ->first();

    
        if($allotshg->group_id >0)
        return redirect()->route('shg.allot',$allotshg->group_id);
        
        else
        return view('loan_allotments.allote')->withCustomerid($id);
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
