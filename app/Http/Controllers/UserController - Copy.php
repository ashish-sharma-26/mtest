<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    //
    public function Showusers()
    {
        $users = User::orderBy("id",'DESC')->get();
        return view("users",compact('users'));

    }

    public function ShowajaxData()
    {
        $usersinfo = User::where("id",3)->get();
        return view("subusers",compact('usersinfo'));
    }
}
