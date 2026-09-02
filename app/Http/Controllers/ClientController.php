<?php

namespace App\Http\Controllers;
use App\Models\InnerBanner; // << add this

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index()
    {
        // inner_banners: id=4
        $banner = InnerBanner::find(4);

        // fallback agar record/image missing ho
        $bannerImage = $banner?->image ?? 'assets/images/home/clients.jpg';

        return view('Home.clients', compact('bannerImage'));
    }
}
