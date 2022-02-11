<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Checkout;

class HomeController extends Controller
{
    public function dashboard()
    {
        $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->get();
        return view('user.dashboard',[
            'checkouts' => $checkouts
        ]);
    }
}
