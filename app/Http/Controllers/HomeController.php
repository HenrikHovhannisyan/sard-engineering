<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $contact = Contact::find(1);
        return view('home', compact('contact'));
    }
}
