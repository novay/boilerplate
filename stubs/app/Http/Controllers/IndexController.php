<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }

    public function lang(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
  
        return redirect()->back();
    }
}