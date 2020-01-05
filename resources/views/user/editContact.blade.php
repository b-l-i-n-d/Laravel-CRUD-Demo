@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Contact') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-contact', $contact->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text" class="form-control" name="firstName" value="{{$contact->firstName}}" autocomplete="firstName" autofocus>
                                    <small class="text-danger">{{ $errors->first('firstName') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text" class="form-control" name="lastName" value="{{$contact->lastName}}" autocomplete="lastName" autofocus>
                                    <small class="text-danger">{{ $errors->first('lastName') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$contact->email}}" autocomplete="email">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label id="countryId" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select" name="country_id" id="countryId">
                                        @foreach($countries as $country)
                                            @if($country->id == $contact->country_id)
                                                <option selected value="{{$country->id}}">{{$country->countryName}}</option>
                                            @else
                                                <option value="{{$country->id}}">{{$country->countryName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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

