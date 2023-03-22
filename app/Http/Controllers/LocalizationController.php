<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


class LocalizationController extends Controller
{
    public function setLocal($locale){
            App::setlocale($locale);
            Session::put('locale',$locale);
            return redirect()->back();

    }
}
