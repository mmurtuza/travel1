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
                            <form action="/search" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_token"
                                    value="<?php echo csrf_token(); ?>">
                                <div class="form-row">
                                    <div class="form-group col-8">
                                        <label for="exampleInputName1">Ticet No</label>
                                        <input name="tkt_no" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button> <br>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
