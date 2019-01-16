<?php

namespace App\Http\Controllers;

use App\User;

class PersonController extends Controller
{
    function index(){
        $user = User::all();

        return response()->json($user, 200);
    }
}