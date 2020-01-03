<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use Egulias\EmailValidator\Exception\ConsecutiveAt;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createContact() {
        return view("\user\createContact");
    }

    public function saveContact(Request $request) {

        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;

        $contact = Contact::create([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email
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
