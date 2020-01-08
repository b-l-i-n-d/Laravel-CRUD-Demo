@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create User') }}</div>

                    <div class="card-body">
                        <form id="createContact" method="POST" action="{{ route('save-contact') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control" name="firstName" placeholder="ex: John" autocomplete="firstName" autofocus>
                                    <small class="text-danger">{{ $errors->first('firstName') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" name="lastName" placeholder="ex: Wick" autocomplete="lastName" autofocus>
                                    <small class="text-danger">{{ $errors->first('lastName') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="example@example.domain" autocomplete="email">
                                    <small id="create-email-error" class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label id="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select" name="country_id" id="countryId">
                                        <option selected>Choose Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->countryName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="create-contact-button">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("script")
        @include("script/createContact")
    @endpush
@endsection

