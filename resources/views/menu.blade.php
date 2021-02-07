@extends('layouts.app')

@section('content')
    <div class="table-responsive-sm">
        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>PAX</th>
                    <th>PNR</th>
                    <th>P.P NO</th>
                    <th>SECTOR</th>
                    <th>AIR</th>
                    <th>TKT NO</th>
                    <th>BUYER</th>
                    <th>PAYABLE</th>
                    <th>PAID</th>
                    <th>DUE</th>
                    <th>CLIENT</th>
                    <th>RECEIVEABLE</th>
                    <th>RECEIVED</th>
                    <th>DUE</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dates as $date)
                    <tr>
                        <td>{{ $date->DATE }}</td>
                        <td>{{ $date->SERVICE }}</td>
                        <td>{{ $date->PAX }}</td>
                        <td>{{ $date->PNR }}</td>
                        <td>{{ $date->P_P_NO }}</td>
                        <td>{{ $date->SECTOR }}</td>
                        <td>{{ $date->AIR }}</td>
                        <td>{{ $date->TKT_NO }}</td>
                        <td>{{ $date->VENDOR }}</td>
                        <td>{{ $date->PAYABLE }}</td>
                        <td>{{ $date->PAID }}</td>
                        <td>{{ $date->DUE }}</td>
                        <td>{{ $date->CLIENT }}</td>
                        <td>{{ $date->RECEIVEABLE }}</td>
                        <td>{{ $date->RECEIVED }}</td>
                        <td>{{ $date->TO_PAY }}</td>
                    </tr>

                @endforeach
            </tbody>

        </table>
    </div>
@endsection
