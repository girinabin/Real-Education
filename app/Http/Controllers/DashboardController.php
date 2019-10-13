<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function logout(){

        Auth::logout();
        return redirect()->back()->withToastSuccess('Logout Successfull');
    }
}
