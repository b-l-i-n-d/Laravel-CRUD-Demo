<?php

namespace App\Http\Controllers;

use App\Model\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function viewCountry() {
        $countries = Country::all();
        return view("country/viewCountry", [
            'countries' => $countries
        ]);
    }

    public function addCountry() {
        return view("country/addCountry");
    }

    public function saveCountry(Request $request) {
        $validator = Validator::make($request->all(), [
            'countryName' => 'required | max:255'
        ]);

        if ($validator->fails()) {
            return redirect(route("add-country"))
                -> withErrors($validator)
                -> withInput();
        }
        $countryName = $request->countryName;

//        dd($countryName);
        $countries = Country::create([
            'countryName' => $countryName
        ]);

        return redirect(route('view-country'));
    }

    public function editCountry($id) {
        $country = Country::find($id);
//        dd($country);
        return view("country/editCountry", [
            'country' => $country
        ]);
    }

    public function updateCountry(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'countryName' => 'required | max:255'
        ]);

        if ($validator->fails()) {
            return redirect(route("edit-country", $id))
                -> withErrors($validator)
                -> withInput();
        }

        $updatedCountry = Country::find($id);
        $updatedCountry->countryName = $request->countryName;

        $updatedCountry->save();
        return redirect(route("view-country"));
    }

    public function deleteCountry($id) {
        $country = Country::find($id);

        $country->delete();

        return redirect(route("view-country"));
    }
}
