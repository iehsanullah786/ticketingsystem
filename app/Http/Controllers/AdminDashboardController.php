<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
class AdminDashboardController extends Controller
{
    public function  index(){
        return view('dashboard');
    }
}
