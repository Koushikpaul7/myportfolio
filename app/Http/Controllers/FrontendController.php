<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $banners = Banner::all();
        $services = Service::all();
        $about = About::latest()->first();
        $webDesigns = Portfolio::where('category', 'web_design')->get();
        $webDevelopments = Portfolio::where('category', 'web_development')->get();
        return view('welcome', [
            'banners' => $banners,
            'services' => $services,
            'about' => $about,
            'webDesigns' => $webDesigns,
            'webDevelopments' => $webDevelopments
        ]);
    }
}
