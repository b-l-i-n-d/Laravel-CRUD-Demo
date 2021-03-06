@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">


                <a href="{{ route('create-contact') }}" class="btn btn-outline-dark mb-5" role="button" aria-pressed="true">Create New Contact</a>
                <a href="{{ route('view-country') }}" class="btn btn-outline-dark mb-5" role="button" aria-pressed="true">Go to Country</a>
            </div>
{{--            {{$conacts->firstName}}--}}
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Country Name</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @if( isset($contacts) && $contacts != null )
                        @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{$contact->id}}</th>
                                <td>{{$contact->firstName}}</td>
                                <td>{{$contact->lastName}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->country->countryName}}</td>
                                <td>
                                    <a href="{{route('edit-contact', $contact->id)}}" class="btn btn-outline-dark" role="button" aria-pressed="true">Update</a>
                                </td>
                                <td>
                                    <form action="{{route('delete-contact', $contact->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit" aria-pressed="true">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
