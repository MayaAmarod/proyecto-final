<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BrandController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    
    function show(){
        $list = User::all();//select * from users
        return view('user/list', ['users' => $list]);
    }

    function form($id = null){
        $user = new User();
        if($id!=null){
            $user = User::findOrFail($id);
        }
        return view('user/form',['user' => $user]);
    }

    function save(Request $request){
        //$request->name;
        //$POST['name]

        $request->validate([
            "name"=>'required|max:50',           
        ]);
        
        $user = new User();
        if($request->id > 0){
            $user = User::findOrFail($request->id);
        }
        $user->name = $request->name;       

        $user->save();

        return redirect('/users')->with('message', 'Usuario Guardado');
    }

    function delete($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('message', 'Usuario Eliminado Correctamente!');
        
    }

}