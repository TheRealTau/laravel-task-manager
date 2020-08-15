<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
    
        return view('user.index', ['users' => $users]);
    }
}
