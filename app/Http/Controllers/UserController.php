<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use App\Model\Country;
use Egulias\EmailValidator\Exception\ConsecutiveAt;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createContact() {
        $countries = Country::all();

//        dd($countries[0]->countryName);
        return view("\user\createContact", [
            'countries' => $countries
        ]);
    }

    public function saveContact(Request $request) {

        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $country_id = $request->country_id;

        $contact = Contact::create([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'country_id' => $country_id
        ]);
//        dd('contact saved');
        return redirect('home');
    }

    public function editContact($id) {
        $contact = Contact::find($id);
        return view('user\editContact', [
            'contact' => $contact
        ]);
    }

    public function updateContact(Request $request, $id) {
        $updatedContact = Contact::find($id);
        $updatedContact->firstName = $request->firstName;
        $updatedContact->lastName = $request->lastName;
        $updatedContact->email = $request->email;

        $updatedContact->save();

        return redirect("home");
    }

    public function deleteContact($id){
        $contact = Contact::find($id);
//        dd($contact);
        $contact->delete();

        return redirect("home");
    }
}
