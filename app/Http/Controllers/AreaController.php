<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    
    function show(){
        $list = Area::all();//select * from areas
        return view('area/list', ['areas' => $list]);
    }

    function form($id = null){
        $area = new Area();
        if($id!=null){
            $area = Area::findOrFail($id);
        }
        return view('area/form',['area' => $area]);
    }

    function save(Request $request){
        //$request->name;
        //$POST['name]

        $request->validate([
            "name"=>'required|max:50',           
        ]);
        
        $area = new Area();
        if($request->id > 0){
            $area = Area::findOrFail($request->id);
        }
        $area->name = $request->name;       

        $area->save();

        return redirect('/areas')->with('message', 'Área Guardada');
    }

    function delete($id){
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect('/areas')->with('message', 'Área Eliminada Correctamente!');
        
    }

}