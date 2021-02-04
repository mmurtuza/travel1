@extends('layouts.app')
{{-- @extends('welcome')
@extends('menu') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <div>
                        <form action="" method="get">
                            <div class="form-row">
                                <div class="col">
                                    <a class="btn btn-primary" href="../insert">
                                       New Purchase
                                    </a>
                                    <a class="btn btn-primary" href="../sell">
                                        New Sell
                                     </a>
                                    <a class="btn btn-primary" href="../search">
                                        Search Record
                                     </a>
                                     {{-- <a class="btn btn-primary" href="../insert">
                                        Update Record
                                     </a> --}}
                                     <a class="btn btn-primary" href="../insert">
                                        Refund Record
                                     </a>
                                     <a class="btn btn-primary" href="../menu">
                                        All Record
                                     </a>
                                </div>
                                
                            </div>
                        </form>
                        <div class="row">
                            <div class="col">
                                <table class="table-sm table-borderless table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>CLINENTS</th>
                                    <th>RECIVABLE</th>
                                  </tr>
                                </thead>
                                <tbody>
                                          
                                  @foreach ($datas as $data )
                                  <tr>
                                      <td><a href="../client/{{ $data->CLINENTS }}">{{ $data->CLINENTS }}</a></td>
                                      <td>{{ $data->RECIVABLE }}</td>
                                    </tr>
                                                                                                                          
                                  @endforeach
                                </tbody>
                                </table>
                            </div>
                        
                            <div class="col">
                                <table class="table-sm table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>VENDORS OR PAYABLES</th>
                                        <th>PAID</th>
                                        <th>PAYABLES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendors as $vendor )
                                    <tr>
                                        <td><a href="../vendor/{{ $vendor->vendor }}">{{ $vendor->vendor }}</a></td>
                                        <td>{{ $vendor->paid }}</td>
                                        <td>{{ $vendor->payables }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
