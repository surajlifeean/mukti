<?php

namespace App\Http\Controllers;

use App\identitydetail;

use App\addressdetail;

use App\otherdetail;


use Illuminate\Http\Request;

class AllcostomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

           $customerdetails=identitydetail::select('identitydetails.id', 'name', 'gardian', 'relation', 'gender', 'marital_status',
          'pan_no', 'aadhar_no', 'idproof', 'dob', 'identitydetails.created_at', 'identitydetails.updated_at', 'address', 'city','pin',
         'state', 'country', 'phone_no',
         'addressproof', 'salary', 'occupation','registered_by')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->orderBy('id', 'desc')
        ->get();

        return view('allcustomers.index')->withMatchinglist($customerdetails);

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
