@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    <a href="{{ route('add-country') }}" class="btn btn-outline-dark mb-5" role="button" aria-pressed="true">Add new country</a>
                    <a href="{{ route('home') }}" class="btn btn-outline-dark mb-5" role="button" aria-pressed="true">Go to Contact</a>
                </div>
                {{--            {{$conacts->firstName}}--}}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Country</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <th scope="row">{{$country->id}}</th>
                            <td>{{$country->countryName}}</td>
                            <td>
                                <a href="{{route('edit-country', $country->id)}}" class="btn btn-outline-dark" role="button" aria-pressed="true">Update</a>
                            </td>
                            <td>
                                <form action="{{route('delete-country', $country->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit" aria-pressed="true">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
