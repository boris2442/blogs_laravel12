<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
   public function cgu()
    {
        return view('footer.cgu');
    }

    public function privacy()
    {
        return view('footer.privacy');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('footer.contact');
    }
}
