<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $userInfo = Session::get('userInfo');
        $id_token = Session::get('id_token');
        return view('profil', compact('user', 'userInfo', 'id_token'));
    }

}