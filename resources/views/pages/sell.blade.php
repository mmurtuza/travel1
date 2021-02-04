@extends('layouts.app')

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
              <form action="/insert2" method="post">
                  {{csrf_field()}} 
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <div class="form-row">
                    <div class="form-group col">
                        <label >Client Name</label>
                        <select name="clientName" class="form-control" >
                            
                            <option ></option>
                            
                        </select> 
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-8">
                        <label >PAX</label>
                        <input name="PAX" class="form-control" >   
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputPassword1">Service</label>
                        <select class="form-control" name="SERVICE" >
                          <option selected>Air Ticket</option>
                          @foreach ($service_names as $service_name)
                          <option >{{ $service_name->SERVICE }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="exampleInputPassword1">PNR</label>
                <input type="text" class="form-control" name="PNR" >
              </div>
              
              <div class="form-group col">
                <label for="exampleInputPassword1">P.P NO</label>
                <input type="text" class="form-control" name="P_P_NO" >
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="exampleInputPassword1">SECTOR</label>
                <input type="text" class="form-control" name="SECTOR" >
              </div>
              
              <div class="form-group col">
                <label for="exampleInputPassword1">AIR</label>
                <input type="text" class="form-control" name="AIR" >
              </div>
            </div>
              
            <div class = "form-row">
              <div class="form-group col">
                <label for="exampleInputPassword1">TKT NO</label>
                <input type="text" class="form-control" name="TKT_NO" >
              </div>
              
              <div class="form-group col">
                <label for="exampleInputPassword1">VENDOR</label>
                <input type="text" class="form-control" name="VENDOR" >
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="exampleInputPassword1">RECEIVABLE </label>
                <input type="text" class="form-control" name="PAYABLE" >
              </div>
              <div class="form-group col">
                <label for="exampleInputPassword1">RECEIVED</label>
                <input type="text" class="form-control"  name="PAID" >
              </div>
              {{-- <div class="form-group col">
                <label for="exampleInputPassword1">DUE</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
              </div> --}}
            </div>
              {{-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

