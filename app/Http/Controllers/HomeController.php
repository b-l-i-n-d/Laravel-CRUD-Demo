<?php

namespace App\Http\Controllers;

use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentUser = Auth::user();
        $contacts = Contact::where('user_id', $currentUser->id)
            -> with('country')->get();
//        dd($contacts);
        return view('home', [
            'contacts' => $contacts
        ]);
    }
}
