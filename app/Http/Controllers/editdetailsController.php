<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\identitydetail;

use Session;


use App\addressdetail;

use App\otherdetail;

use App\loan_allotment;

class editdetailsController extends Controller
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
    $identitydetail=identitydetail::find($id);
    $addressdetail=addressdetail::find($id);
    $otherdetail=otherdetail::find($id);

          //dd($identitydetail->addressdetail);

    return view('customer.edit')->withIdentitydetail($identitydetail)->withAddressdetail($addressdetail)->    withOtherdetail($otherdetail);

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

       // dd($request);
        $identitydetail =identitydetail::find($id);
        
        $identitydetail->name =$request->name;

        $identitydetail->marital_status =$request->maritalstatus;

        $identitydetail->pan_no = $request->pan_no;

        $identitydetail->aadhar_no = $request->aadhar_no;

        $identitydetail->save();

        $addressdetail=addressdetail::where('customer_id','=',$id)->first();
        
        $addressdetail->city =$request->city;

        $addressdetail->address =$request->address;

        $addressdetail->pin = $request->pin;

        $addressdetail->phone_no = $request->phone_no;

        $addressdetail->save();

        $otherdetail=otherdetail::where('customer_id','=',$id)->first();
        
        $otherdetail->salary=$request->income;

        $otherdetail->occupation =$request->occupation;
        
        $otherdetail->save();

      Session::flash('success','The Details was sucessflly saved!');

          return redirect()->route('customers.show',$identitydetail->id);

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
