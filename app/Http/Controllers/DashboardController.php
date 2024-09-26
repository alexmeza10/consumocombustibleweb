<?php

namespace App\Http\Controllers;

use App\Models\Usuarios_Model;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.menu');
    }

    public function adminuser()
    {
        $usuarios = Usuarios_Model::all();

        return view('users.adminuser', ['usuarios' => $usuarios]);
    }

    public function newuser()
    {
        return view('users.newuser');
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function newrecord()
    {
        return view('records.newrecord');
    }

    public function recordlist()
    {
        return view('records.recordlist');
    }
}
