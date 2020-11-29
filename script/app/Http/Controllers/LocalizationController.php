<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function store(Request $request)
    {
    	$locale = $request->locale;
    	\Session::put('locale',$locale);
		return "ok";
    }
}
