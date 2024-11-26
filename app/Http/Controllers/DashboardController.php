<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class DashboardController extends Controller
{
    public function  index(){
        return view('app.dashboard');
    }
    // public function  assignrole(Request $request, string $id){
    //     $user=User::find($id);
    //     $user->assignRole($request->rollname);
    //     $user->save();
    // }
}
