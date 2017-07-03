<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\identitydetail;


use App\otherdetail;

use App\loan_allotment;

use Carbon\Carbon;

use Session;


class shgController extends Controller
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
        return view('shgs.options');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$members=identitydetail::all();

        $members=identitydetail::select('identitydetails.id','name','phone_no','loan_alloted')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->where('group_id','=',0)
        ->where('loan_alloted','=',0)
        ->get();


        return view('shgs.create')->withMembers($members);

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
            $groupmembers=$request->groupmembers;

            $otherdetails=otherdetail::select('group_id')
                        ->orderby('group_id','desc')
                        ->first();
            $gid=$otherdetails->group_id;




        foreach($groupmembers as $member) {
            
            $otherdetails=otherdetail::where('customer_id','=',$member)
              ->first();
            $otherdetails->group_id=$gid+1;

            $otherdetails->save();

        }


      return redirect()->route('indorshg.view');
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
        //used to store alloted loan to a group into the database
    //dd($request);
    
     $ids=$request->id;

     //$amts=$request->amt;

     $pdsqty=$request->pdsqty;

     


           foreach($ids as $key=>$id) {

    
            
            $otherdetails=otherdetail::where('otherdetails.customer_id','=',$id)

              ->first();

              $otherdetails->loan_alloted=1;

              $otherdetails->save();

        $loan=new loan_allotment;

        $loan->principal=$request->amt;

        if($request->amount <6000)
        $loan->processfee=50;

        else
        $loan->processfee=100;

       
        $loan->padscost=$pdsqty[$key]*4.5;
        
        $loan->customer_id=$id;

        $loan->nextpremiumdate=Carbon::now()->addDays(6);

        $loan->status="active";

        $loan->save();


            //  $otherdetails->principal=$request->amount;
            
             //  $otherdetails->save();

        }
    
    
Session::flash('success','The loan is sucessfully Alloted!');

        return view('loan_allotments.success');


            

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
