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
        $dates = DB::select('select * from sheet1');
        $service_names = DB::select('select * from sheet1');
        return view('search',['dates'=>$dates, 'service_names'=>$service_names]);
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
     * @param  \App\Models\ticket_info  $ticket_info
     * @return \Illuminate\Http\Response
     */
    public function show(ticket_info $ticket_info)
    {
        //
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
