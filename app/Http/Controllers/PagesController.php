<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function root(){
        $payment_history = [];
        $businesses = [];
        if (Auth::check()){
            $payment_history = Auth::user()->payment_intents;
            $businesses = (new UserRole())->businessRoleList();

        }
        return view('pages.root', compact('payment_history'), compact('businesses'));
    }
}
