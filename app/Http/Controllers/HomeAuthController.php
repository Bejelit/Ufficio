<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeAuthController extends Controller
{
    public function checkHome() {
        if (Auth::check()) {
           return redirect()->route('dipendenti');
        }
        else {
            return redirect()->back()->with('error','Per visualizzare i dipendenti devi essere loggato!');
        }
    }

}
