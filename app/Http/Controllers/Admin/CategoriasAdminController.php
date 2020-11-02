<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categorias = Categoria::all();
        return view('admin.categorias.index', ['categorias'=>$categorias]);
    }

    public function store(Request $request){
        //dd( \App\Models\Categoria::all() );
        //Categoria::create([
            //'nombre'=> $request->categoria
        //]);
        
        $newCategoria = new Categoria();
        $newCategoria->nombre = $request->nombre;
        $newCategoria->save();

        return redirect()->back();
    }

    public function update(Request $request, $categoriaId){
        
        $categoria = Categoria::find($categoriaId);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->back();
    }

}
