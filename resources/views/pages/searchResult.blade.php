@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Search') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @elseif(session('failed'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('failed') }}
                            </div>
                        @endif

                        <div class="container">
                            @if ($dates->isEmpty())
                                <div class="alert alert-danger" role="alert">Ticket number is not in record!</div>
                            @endif
                            @foreach ($dates as $date)
                                <div class="container">
                                    <div class="row ">
                                        <div class="col">Date: {{ $date->DATE }}</div>
                                        <div class="col">Ticket No.: {{ $date->TKT_NO }}</div>
                                    </div>
                                    <div class="h-25 d-inline-block"></div>
                                    <div class="row">
                                        <div class="col">Client Name: {{ $date->CLIENT }}</div>
                                        <div class="col">Vendor Name: {{ $date->VENDOR }}</div>
                                    </div>
                                    <div class="h-25 d-inline-block"></div>
                                    <div class="row">
                                        <div class="col">PNR: {{ $date->PNR }}</div>
                                        <div class="col">Srvice: {{ $date->SERVICE }}</div>
                                        <div class="col">PAX: {{ $date->PAX }}</div>
                                    </div>
                                    <div class="h-25 d-inline-block"></div>
                                    <div class="row">
                                        <div class="col">Passport No.:{{ $date->P_P_NO }}</div>
                                        <div class="col">Sector: {{ $date->SECTOR }}</div>
                                        <div class="col">Air: {{ $date->AIR }}</div>
                                    </div>
                                    <div class="h-25 d-inline-block"></div>
                                    <div class="row">
                                        <div class="col">Total Payble: {{ $date->PAYABLE }}</div>
                                        <div class="col">Paid: {{ $date->PAID }}</div>
                                        <div class="col">Due Pay: {{ $date->DUE }}</div>
                                    </div>
                                    <div class="h-25 d-inline-block"></div>
                                    <div class="row">
                                        <div class="col">Total Receivable: {{ $date->RECEIVEABLE }}</div>
                                        <div class="col">Received: {{ $date->RECEIVED }}</div>
                                        <div class="col">Due: {{ $date->TO_PAY }}</div>
                                    </div>
                                    <div class="h-25 d-inline-block"></div>
                                </div>
                            @endforeach
                        </div>


                        <div style="height: 30px;"></div>
                        <button onclick="window.print()" class="btn btn-primary">Print</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
