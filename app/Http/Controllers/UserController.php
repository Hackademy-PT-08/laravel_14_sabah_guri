<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function profile(){
        $users=Auth::user();
       
        return view('user.profilo',[
            'users'=>$users,
            'articles'=>$users->articles
        ]);
    }
}
