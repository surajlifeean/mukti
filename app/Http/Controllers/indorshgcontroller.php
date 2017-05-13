<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\identitydetail;

use App\muktimaa;

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
        // to view the groups
        
        $details=identitydetail::select('identitydetails.id', 'name','address', 'city','pin',
         'state', 'group_id', 'phone_no','group_id','status')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
                    ->where('group_id','>',0)
                    ->orderby('group_id','desc')
                    ->get();
        
        return view('shgs.view')->withDetails($details);
    
    }

        public function shgallotment($id)
    {
             $details=identitydetail::select('identitydetails.id', 'name','address', 'city','pin',
         'state', 'group_id', 'phone_no','group_id')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
                    ->where('group_id','=',$id)
                    ->orderby('id','desc')
                    ->get();
       

        return view('shgs.shgloanallotment')->withDetails($details)->withGid($id);
    }

        public function selectmm()
    {

        $gid = session('groupid');
          
          $groupmembers=identitydetail::select('identitydetails.id', 'name','group_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->where('group_id','=',$gid)
        ->get();
        

        return view('customer.muktimaa')->withGroupmembers($groupmembers);
    }


    
        public function storemm(Request $request)
    {

        //dd($request);
        $gid = session('groupid');
          
        $muktimaa =new muktimaa;
        
        $muktimaa->customer_id =$request->gender;

        $muktimaa->group_id =$gid;

        $muktimaa->save();

        return view('customer.kudos')->withGid($gid);
    



    }


}
