<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referido;
use App\Models\Balance;
use App\Models\Transaccion;
use App\Models\Finanzas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PatrociniosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
         
        //$balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->first();
        $patrocinio=Referido::where(["status"=>1,"user_id"=>auth()->user()->id])->get();
        //die(var_dump($patrocinio));
         
        return view('patrocinio.index',['patrocinios'=>$patrocinio]);

    }

    public function cobrar($id)
    {
        $fecha=date('Y-m-d H:i:s');
        $referido= Referido::where([ "status"=>1,"id"=>$id])->first(); 
        $referido->statustrans=4;
        
        if ($referido->saveOrFail()){
            $transaccion= new Transaccion;
            $transaccion->valor=$referido->valor;
            $transaccion->tipotrans=4;
            $transaccion->tipomov=1;
            $transaccion->fechaact=$fecha;
            $transaccion->userupd_id=0;
            $transaccion->isDeleted=0;
            $transaccion->statustrans=1;
            $transaccion->status=1;
            $transaccion->created_at = $fecha;
            $transaccion->user_id =auth()->user()->id;
            $transaccion->saveOrFail();
    
            $balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->first();
            $balance->saldo=$balance->saldo+$referido->valor;
            $balance->saveOrFail();
            return redirect()->route('patrocinios.index')->with(['msg' => "Patrocinio acreditado con éxito!",'clase' => "bg-soft-success text-success"]);

        }else{
            return redirect()->route('patrocinios.index')->with(['msg' => "Error al acreditar el patrocinio!",'clase' => "bg-soft-danger text-danger"]);
        }
        return redirect()->route('patrocinios.index')->with(['msg' => "Error al acreditar el patrocinio!",'clase' => "bg-soft-danger text-danger"]);


       

    }

 

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    
}
