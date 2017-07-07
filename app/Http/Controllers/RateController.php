<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\identitydetail;

use App\addressdetail;

use App\otherdetail;

use App\loan_allotment;

use App\Premium;


use App\rate;


use Carbon\Carbon;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getrates()
    	{
    		$rates=rate::all();
    		return view('rates.rates')->withRates($rates);

    	}
  }