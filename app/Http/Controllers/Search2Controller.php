<?php

namespace App\Http\Controllers;

use App\Models\ticket_info;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Search2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = DB::select('select * from purchase_data');
        $service_names = DB::select('select * from services_list');
        return view('pages/search',['dates'=>$dates, 'service_names'=>$service_names]);
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
        $PAX= $request->input('PAX');
        $SERVICE= $request->input('SERVICE');
        $PNR= $request->input('PNR');
        $P_P_NO= $request->input('P_P_NO');
        $SECTOR= $request->input('SECTOR');
        $AIR= $request->input('AIR');
        $TKT_NO= $request->input('TKT_NO');
        $VENDORE= $request->input('VENDORE');
        $PAYABLE= $request->input('PAYABLE');
        $PAID= $request->input('PAID');
        $DUE = $PAYABLE - $PAID;

        $datas = DB::insert('insert into purchase_data (PAX, SERVICE,PNR, P_P_NO,SECTOR,AIR,TKT_NO,VENDORE,PAYABLE,PAID,DUE) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$PAX, $SERVICE, $PNR, $P_P_NO, $SECTOR, $AIR, $TKT_NO, $VENDORE, $PAYABLE, $PAID, $DUE]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ticket_info  $ticket_info
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $tkt = $request->input('tkt_no');
        // $dates = DB::select('select * from purchase_data where TKT_NO LIKE tkt');
         $dates = DB::table('purchase_data')->where('TKT_NO',$tkt)->get();
        // $service_names = DB::select('select * from services_list');
        return view('menu',['dates'=>$dates]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ticket_info  $ticket_info
     * @return \Illuminate\Http\Response
     */
    public function edit(ticket_info $ticket_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ticket_info  $ticket_info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket_info $ticket_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ticket_info  $ticket_info
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket_info $ticket_info)
    {
        //
    }
}
