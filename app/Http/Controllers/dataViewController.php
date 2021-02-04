<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class dataViewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $dates = DB::select('select * from purchase_data order by DATE DESC');
        $service_names = DB::select('select * from services_list');
        return view('menu',['dates'=>$dates, 'service_names'=>$service_names]);
     }
}
