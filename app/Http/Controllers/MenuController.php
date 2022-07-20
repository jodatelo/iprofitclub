<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __invoke()
    {
        return view('menus.index', ["menu" => Menu::paginate(10)]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("menus.index", ["menu" => Menu::paginate(10)]);
    }

    public function create()
    {
        return view("menus.create", ["superior" => Menu::where(["parent"=>0])->get()]);
    }

    /**
     * Retiros a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Menu();
 
        $model->nombre = $request->nombre;
        $model->parent = $request->parent;
        $model->icono = $request->icono;
        $model->link = $request->link;
        $model->user_id = 1;
       
        $model->saveOrFail();
        return redirect()->route('menu.index')
            ->with('msg','Menú creado!');

    }

    public function edit(Menu $menu)
    {
        
        return view("menus.edit", ["menu" => $menu, "superior" => Menu::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        //var_dump($id);
        $model = Menu::find($id);
        $model->nombre = $request->nombre;
        $model->parent = $request->parent;
        $model->icono = $request->icono;
       
        $model->saveOrFail();
        return redirect()->back()->with(['msg' => "Menú actualizado!"]);
 
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
       
        $menu->delete();
        return redirect()->route("menu.index")->with(["msg" => "Menú eliminado!"]);
    }

    public function inactive(Request $request)
    {
        $model = Menu::find($request->id);
        $model->status = 0;
        $model->saveOrFail();
        return redirect()->route('menu.index')
        ->with('msg',"Menú Inactivado!");
        
    }

    public function active(Request $request)
    {
        $model = Menu::find($request->id);
        $model->status = 1;
        $model->saveOrFail();
        return redirect()->route('menu.index')
        ->with('msg',"Menú Activado!");
       
    }
}
