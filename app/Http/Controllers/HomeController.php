<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Image;
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
        $our_works = Image::latest()->take(8)->get();
        return view('home', compact('contact', 'our_works'));
    }
}
