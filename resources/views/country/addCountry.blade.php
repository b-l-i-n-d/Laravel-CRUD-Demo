@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Country') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('save-country') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="countryName" class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }}</label>

                                <div class="col-md-6">
                                    <input id="countryName" type="text" class="form-control" name="countryName" placeholder="ex: Bangladesh" autocomplete="countryName" autofocus>
                                    <small class="text-danger">{{$errors->first('countryName')}}</small>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

