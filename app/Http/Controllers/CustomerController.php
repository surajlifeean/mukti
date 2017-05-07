<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\identitydetail;

use App\addressdetail;

use App\otherdetail;

use Session;

use Image;

use App\document;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count = session('count');



        session(['count' => $count-1]);
        
      
        return view('customer.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.documents');
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


   /*       $this->validate($request, array(
            'name' => 'required|max:255',
            'gardian'  => 'required|alpha_dash|min:5|max:255',
            //'category_id'=>'required|numeric',
            'idproof'  => 'required'
            )); 

        //validation
        */
        
        $identitydetail =new identitydetail;
        
        $identitydetail->name =$request->name;

        $identitydetail->gardian = $request->spouseorfather;

        $identitydetail->relation=$request->relation;

        $identitydetail->gender = $request->gender;

        $identitydetail->marital_status =$request->maritalstatus;

        $identitydetail->pan_no = $request->pan;

        $identitydetail->aadhar_no = $request->aadhar;


        if($request->idproof=='others')

            $identitydetail->idproof = $request->otheridproof;

        else
            $identitydetail->idproof = $request->idproof;


        $identitydetail->dob = $request->bday;

        $identitydetail->save();

          $gid = session('groupid');
                

        $addressdetail =new addressdetail;

          $addressdetail->address =$request->address;

          $addressdetail->city =$request->city;

          $addressdetail->pin =$request->pin;

          $addressdetail->state =$request->state;   

          $addressdetail->country =$request->country;

          $addressdetail->phone_no =$request->contact;

          $addressdetail->addressproof =$request->addproof;   

          $addressdetail->customer_id =$identitydetail->id;

          $addressdetail->save();




        $otherdetail =new otherdetail;

         $otherdetail->salary=$request->income;

         if(strcmp($request->occupation,'others')==0)
            $otherdetail->occupation=$request->otheroccupation;

         else
              $otherdetail->occupation=$request->occupation;
          
            

          $otherdetail->registered_by=Auth::user()->name;

          $otherdetail->customer_id=$identitydetail->id;

          $otherdetail->group_id=$gid;



          $otherdetail->save();


          $img=new document;
        if($request->hasFile('featured_image')){
            $image=$request->file('featured_image');
            $filename=time().'.'.$image->getClientOriginalExtension();//part of image intervention library
            $location=public_path('/images/'.$filename);

            Image::make($image)->resize(200,200)->save($location);
            $img->image=$filename;

            $img->customer_id=$identitydetail->id;

            $img->save();
        }





          Session::flash('success','The blog post was sucessflly saved!');

          return redirect()->route('customers.show',$identitydetail->id);




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
       /* select i.id, name, gardian, relation, gender, marital_status,
          pan_no, aadhar_no, idproof, dob, i.created_at, i.updated_at, address, city,
        pin, state, country, phone_no,
        addressproof, salary, occupation, registered_by
        from identitydetails i 
         join addressdetails a on i.id=a.customer_id
            join otherdetails o on i.id=o.customer_id*/
    $customerdetails=identitydetail::select('identitydetails.id', 'name', 'gardian', 'relation', 'gender', 'marital_status',
          'pan_no', 'aadhar_no', 'idproof', 'dob', 'identitydetails.created_at', 'identitydetails.updated_at', 'address', 'city','pin',
         'state', 'group_id', 'phone_no','loan_alloted','status',
         'addressproof', 'salary', 'occupation','registered_by')
        ->join('addressdetails','identitydetails.id','=','addressdetails.customer_id')
        ->join('otherdetails','identitydetails.id','=','otherdetails.customer_id')
        ->join('loan_allotments','identitydetails.id','=','loan_allotments.customer_id')
        ->where('identitydetails.id','=',$id)
        ->first();
        
    
        $imag=document::where('documents.customer_id','=',$customerdetails->id)->first();

         if(count($imag))
            $img=$imag->image;
         else
            $img="default-user.png";


        $count = session('count');


        $grouptype = session('grouptype');


        
        return view('customer.show')->withCustdetails($customerdetails)->withCount($count)->withImg($img)->withGrouptype($grouptype);

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
        //USED to set the value of group size and group number
        $grouptype=$request->indorshg;

        $gid=0;

        if($grouptype=='shg')
        {
        $otherdetails=otherdetail::select('group_id')
                        ->orderby('group_id','desc')
                        ->first();
        $gid=$otherdetails->group_id;

        $request->session()->put('groupid',$gid+1);

        $request->session()->put('grouptype',$grouptype);//holding te group type in a session variable


        }

        else{
            $request->session()->put('groupid',$gid);
            $request->session()->put('grouptype',$grouptype);

        }

        $request->session()->put('count',$request->group_size);

        

                  return redirect()->route('customers.index');


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
