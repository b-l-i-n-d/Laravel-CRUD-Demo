<?php

namespace App\Http\Controllers;

use App\Model\Country;
use Illuminate\Http\Request;

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
        $countryName = $request->countryName;

//        dd($countryName);
        $countries = Country::create([
            'countryName' => $countryName
        ]);

        return redirect('view-country');
    }

    public function editCountry($id) {
        $country = Country::find($id);
//        dd($country);
        return view("country/editCountry", [
            'country' => $country
        ]);
    }

    public function updateCountry(Request $request, $id) {
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
