<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas = DB::select('select * from client_list');
        $vendors = DB::select('select * from vendor_list');
        $service_names = DB::select('select * from services_list');
        return view('home',['datas'=>$datas, 'vendors'=>$vendors]);
    }
    public function sell()
    {
        $datas = DB::select('select * from client_list');
        $vendors = DB::select('select * from vendor_list');
        $service_names = DB::select('select * from services_list');
        return view('pages/sell',['datas'=>$datas, 'vendors'=>$vendors,'service_names'=>$service_names]);
    }

    public function client($id)
    {
        // $datas = DB::select('select * from client_list');
        // $vendors = DB::select('select * from vendor_list');
        // $service_names = DB::select('select * from sells_data where vendor like $id');
        // return view('pages/menu',['datas'=>$datas, 'vendors'=>$vendors,'service_names'=>$service_names]);
        $dates = DB::table('sells_data')->where('vendor',$id)->get();
        // $service_names = DB::select('select * from services_list');
        return view('menu',['dates'=>$dates]);
    }
    public function vendor($id)
    {
        // $datas = DB::select('select * from client_list');
        // $vendors = DB::select('select * from vendor_list');
        // $service_names = DB::select('select * from sells_data where vendor like $id');
        // return view('pages/menu',['datas'=>$datas, 'vendors'=>$vendors,'service_names'=>$service_names]);
        $dates = DB::table('purchase_data')->where('CLIENT',$id)->get();
        // $service_names = DB::select('select * from services_list');
        return view('menu',['dates'=>$dates]);
    }

    
}
