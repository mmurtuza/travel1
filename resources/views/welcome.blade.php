@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Insert Data') }}</div>

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
                            <form action="/insert" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_token"
                                    value="<?php echo csrf_token(); ?>">
                                <div class="form-row">
                                    <div class="form-group col-8">
                                        <label>PAX</label>
                                        <input name="PAX" class="form-control" autofocus="autofocus">
                                    </div>
                                    <div class="form-group col">
                                        <label>Service</label>
                                        <select class="form-control" name="SERVICE">
                                            {{-- <option selected>Air Ticket</option> --}}
                                            @foreach ($service_names as $service_name)
                                                <option>{{ $service_name->SERVICE }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>PNR</label>
                                        <input type="text" class="form-control" name="PNR">
                                    </div>

                                    <div class="form-group col">
                                        <label>P.P NO</label>
                                        <input type="text" class="form-control" name="P_P_NO">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="exampleInputPassword1">SECTOR</label>
                                        <input type="text" class="form-control" name="SECTOR">
                                    </div>

                                    <div class="form-group col">
                                        <label for="AIR">AIR</label>
                                        <select class="form-control" name="AIR">
                                            @foreach ($air_lists as $air_list)
                                                <option>{{ $air_list->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="TKT_NO">TKT NO</label>
                                        <input type="text" class="form-control" name="TKT_NO">
                                    </div>

                                    <div class="form-group col">
                                        <label for="VENDOR">VENDOR</label>
                                        <select class="form-control" name="VENDOR">

                                            @foreach ($vendors as $vendor)
                                                <option>{{ $vendor->vendor }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="PAYABLE">PAYABLE </label>
                                        <input type="text" class="form-control" name="PAYABLE">
                                    </div>
                                    <div class="form-group col">
                                        <label for="PAID">PAID </label>
                                        <input type="text" class="form-control" name="PAID">
                                    </div>

                                    {{-- <div class="form-group col">
                <label for="exampleInputPassword1">DUE</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
              </div> --}}
                                </div>
                                <div class="form-row">


                                    <div class="form-group col">
                                        <label for="CLIENTS">CLIENT</label>
                                        <select class="form-control" name="CLIENTS">
                                            @foreach ($clients as $client)
                                                <option>{{ $client->CLINENTS }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="RECEIVEABLE">RECEIVEABLE </label>
                                        <input type="text" class="form-control" name="RECEIVEABLE">
                                    </div>
                                    <div class="form-group col">
                                        <label for="RECEIVED">RECEIVED</label>
                                        <input type="text" class="form-control" name="RECEIVED">
                                    </div>
                                    {{-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> --}}
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
