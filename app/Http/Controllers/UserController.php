<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use App\Model\Country;
use Egulias\EmailValidator\Exception\ConsecutiveAt;
use Illuminate\Support\Facades\Validator;
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

        $validator = Validator::make($request->all(), [
            'firstName' => 'required | max:255',
            'lastName' => 'required | max:255',
            'email' => 'required | email | unique:contacts, email',
            'country_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('create-contact'))
                ->withErrors($validator)
                ->withInput();
        }

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
        $countries = Country::all();
        return view('user\editContact', [
            'contact' => $contact,
            'countries' => $countries
        ]);
    }

    public function updateContact(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'firstName' => 'required | max:255',
            'lastName' => 'required | max:255',
            'email' => 'required | email',
            'country_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('edit-contact', $id))
                ->withErrors($validator)
                ->withInput();
        }

        $updatedContact = Contact::find($id);
        $updatedContact->firstName = $request->firstName;
        $updatedContact->lastName = $request->lastName;
        $updatedContact->email = $request->email;
        $updatedContact->country_id = $request->country_id;
//        dd($updatedContact->country_id);
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
