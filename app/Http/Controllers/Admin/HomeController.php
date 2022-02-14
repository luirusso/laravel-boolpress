<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendWelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Admin Dashboard
     */

    
    public function index() {
        // TEST EMAIL

        // STATIC DATA
        // Mail::to('account@mail.it')->send(new SendWelcomeEmail() );

        // WITH AUTH
        // Mail::to(Auth::user()->email)->send(new SendWelcomeEmail() );

        // WITH DATA AND CLASSES
        Mail::to(Auth::user()->email)->send(new SendWelcomeEmail(Auth::user()->name) );




        return view('admin.home');
    }
}
