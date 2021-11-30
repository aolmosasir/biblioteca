<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CatalogController;
use Auth;

class HomeController extends Controller
{

    public function getHome(){
        
        if (Auth::check()) {
            return redirect()->action([CatalogController::class, 'getIndex']);
        }else {
            return redirect()->route('login');
        }
    }

}
