<?php

namespace App\Http\Controllers;

use App\Tables\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Roles::class
        ]);
    }
}
