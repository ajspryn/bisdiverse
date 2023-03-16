<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Auth::user()->role;
        if (Auth::user()) {
            $role = Auth::user()->role;
        } else {
            $role = false;
        }

        $url = '/';

        if ($role) {
            if ($role->jabatan_id == 0) {
                $url = '/admin';
            } elseif ($role->jabatan_id == 1) {
                $url = '/kaprodi';
            } elseif ($role->jabatan_id == 2) {
                $url = '/dosen';
            } elseif ($role->jabatan_id == 3) {
                $url = '/mahasiswa';
            } elseif ($role->jabatan_id == 4) {
                $url = '/bisdiboard';
            } else {
                return view('errors.kamusiapa');
            }
        } else {
            return view('index');
        }
        return Redirect($url);
    }
}
