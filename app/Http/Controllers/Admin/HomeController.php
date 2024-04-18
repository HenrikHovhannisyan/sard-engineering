<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Image;
use App\Models\Partner;
use Illuminate\Contracts\Support\Renderable;
use App\Http\Controllers\Controller;

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
     * @return Renderable
     */
    public function index()
    {
        $imageCount = count(Image::all());
        $brandCount = count(Brand::all());
        $catalogCount = count(Catalog::all());
        $partnerCount = count(Partner::all());
        return view('admin.dashboard', compact('imageCount', 'brandCount', 'catalogCount', 'partnerCount'));
    }
}
