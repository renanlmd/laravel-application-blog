<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function homeAdmin()
    {
        if(auth()->user()->isAdmin()){
            return view('dashboard');
        }
    }

    public function createNewAdmin()
    {
        return view('admin.gerencia-admin.create-user-admin');
    }

    public function updatePassword()
    {
        return view('admin.gerencia-admin.update-default-password');
    }

    public function listAdmin()
    {
        $allAdmin = User::where('is_admin', true)->paginate(3);
        return view('admin.gerencia-admin.list-all-admin', compact('allAdmin'));
    }
    
}
