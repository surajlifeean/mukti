<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\otherdetail;

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

        
        $details=otherdetail::where('group_id','>',0)
                    ->orderby('group_id','desc')
                    ->get();
        
        return view('shgs.view')->withDetails($details);
    }

    

}
