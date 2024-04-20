<?php

namespace App\Http\Controllers\Website\Home;

use App\Models\Team;
use App\Models\About;
use App\Models\Client;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Testimoni;
use App\Models\Doctors\Poli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portofolio\Portofolio;

class HomeController extends Controller
{

    public function __construct()
    {
        View()->share('menu', 'Home');
    }

    public function index()
    {
        // $data['sliders']        = Slider::orderby('id', 'desc')->get();

        return view('website.home.index');
    }
}
