<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;


class LanguageController extends Controller
{
    public function change($lg)
    {
        Session::set('locale',$lg);
        return back();
    }
}
