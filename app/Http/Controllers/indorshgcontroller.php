<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\identitydetail;

class indorshgcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('customer.home');
    }


    public function view()
    {

        
        $details=identitydetail::select('identitydetails.id', 'name','address', 'city','pin',
         'state', 'group_id', 'phone_no','group_id')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
                    ->where('group_id','>',0)
                    ->orderby('group_id','desc')
                    ->get();
        
        return view('shgs.view')->withDetails($details);
    }

    

}
