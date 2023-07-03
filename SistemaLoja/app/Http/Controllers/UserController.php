<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $listarTodosUsuarios=User::all();
        return view("usuario/index",compact('listarTodosUsuarios'));
    }

}
