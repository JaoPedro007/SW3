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

    public function create()
    {
        $users=User::all();
        return view('usuario/create',compact('users'));

    }
    public function store(Request $request)
    {

        $cad=User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        if($cad){
            return redirect('usuarios');

        }
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('usuario/edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::where(['id'=>$id])->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password

        ]);
        return redirect('usuarios');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('usuarios');

    }

}
