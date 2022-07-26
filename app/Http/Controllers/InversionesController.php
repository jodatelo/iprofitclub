<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Poliza;
use App\Models\Balance;
use App\Models\Transaccion;
use App\Models\Finanzas;
use App\Models\Referido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class InversionesController extends Controller
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
        $polizas=Poliza::where(["status"=>1,"user_id"=>auth()->user()->id])->get();
        $balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->get();
        $polizaslista=array();
        $polizaslista=array();
        //id: 1, title: "World Braille Day",start: "2022-07-08",  className: "bg-soft-info", allDay: true
        foreach ($polizas as $key => $pl) {
             
            $date=date_create($pl->fechainversion);
            $dateinv=date_create($pl->fechacapital);
            $dategan=date_create($pl->fechainteres);
            
            $accion=false;
            $cobrada=false;
            array_push($polizaslista,["id"=>$pl->id,"title"=>"Inversión #".$pl->id." ($".number_format($pl->valor,2).")","start"=>date_format($date,"Y-m-d"),"className"=>"bg-soft-info","allDay"=>true,"status"=>$pl->status,"tipo"=>"1","accion"=>$accion,"cobrada"=>$cobrada,"idpoliza"=>$pl->id]);

            if (date("Y-m-d",strtotime($pl->fechainversion."+ 15 days")) <= date('Y-m-d')){ $accion=true; }
            //echo $pl->statusi;
            if($pl->statusi==1){ $cobrada=true; }
            array_push($polizaslista,["id"=>$pl->id+1,"title"=>"Inversión #".$pl->id." | Inversion ($".number_format($pl->valor,2).")","start"=>date_format($dateinv,"Y-m-d"),"className"=>"bg-soft-warning ","allDay"=>true,"status"=>$pl->status,"tipo"=>"2","accion"=>$accion,"cobrada"=>$cobrada,"idpoliza"=>$pl->id]);
            
            $accion=false;
            $cobrada=false;

            if (date("Y-m-d",strtotime($pl->fechainversion."+ 30 days")) <= date('Y-m-d')){ $accion=true; }
            if($pl->statusg==1){ $cobrada=true; }
            array_push($polizaslista,["id"=>$pl->id+2,"title"=>"Inversión #".$pl->id." | Ganancia ($".number_format(($pl->valor*(($pl->valorinteres/100)+1)-$pl->valor),2).")","start"=>date_format($dategan,"Y-m-d"),"className"=>"bg-soft-success","allDay"=>true,"status"=>$pl->status,"tipo"=>"3","accion"=>$accion,"cobrada"=>$cobrada,"idpoliza"=>$pl->id]);
        
        }
        //die(var_dump($polizaslista));
         
        return view('inversiones.index',['polizas'=>$polizas,'balance'=>$balance,'polizaslista'=>json_encode($polizaslista)]);

    }
    public function create(Request $request)
    {
        $model = new Poliza();
        //var_dump($request);
        /*$model->nombre = $request->nombre;
        $model->codigo = $request->codigo;
        $model->cuenta = $request->cuenta;
        $model->user_id = 1;
       
        $model->saveOrFail();*/
        /*return redirect()->route('formapago.index')
            ->with('msg','Forma de Pago creado!');*/

    }

    public function cobrar($id,$inv)
    {
        $fecha=date('Y-m-d H:i:s');
        $model = Poliza::where(["id"=>$id])->first();
        if ($model){
            $tipoinv=0;
            if ($inv==2){ $model->statusi=1; $tipoinv=9;}
            if ($inv==3){ $model->statusg=1; $tipoinv=10;}
            if ($model->saveOrFail()){
                $transaccion= new Transaccion;
                $transaccion->valor=$model->valor;
                $transaccion->tipotrans=$tipoinv;
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
                $balance->saldo=$balance->saldo+$model->valor;
                $balance->saveOrFail();
            }
        }
        //var_dump($request);
        /*$model->nombre = $request->nombre;
        $model->codigo = $request->codigo;
        $model->cuenta = $request->cuenta;
        $model->user_id = 1;
       
        $model->saveOrFail();*/
        /*return redirect()->route('formapago.index')
            ->with('msg','Forma de Pago creado!');*/
        return redirect()->route('inversiones.index')->with(['msg' => "Inversión acreditada con éxito!",'clase' => "bg-soft-success text-success"]);
    }


    public function update(Request $request)
    {
        $model = new Poliza();
        $fecha=date('Y-m-d H:i:s');
        $model->valor = $request->valor;
        $model->valorinteres = 100;
        $model->created_at = $fecha;
        $model->fechainversion = $fecha;
        $model->fechacapital = date("Y-m-d H:i:s",strtotime($fecha."+ 15 days"));
        $model->fechainteres = date("Y-m-d H:i:s",strtotime($fecha."+ 30 days"));
        $model->user_id =auth()->user()->id;
       
        if ($model->saveOrFail()){
            $balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->first();
            $balance->saldo=$balance->saldo-$request->valor;
            $balance->saveOrFail();

            $transaccion= new Transaccion;
            $transaccion->valor=$request->valor;
            $transaccion->tipotrans=3;
            $transaccion->tipomov=-1;
            $transaccion->fechaact=$fecha;
            $transaccion->userupd_id=0;
            $transaccion->isDeleted=0;
            $transaccion->statustrans=1;
            $transaccion->status=1;
            $transaccion->created_at = $fecha;
            $transaccion->user_id =auth()->user()->id;
            $transaccion->saveOrFail();
            
            
            ///referido 
            $user=User::where([ "email"=>auth()->user()->ref])->get();
            if ($user->toArray()){
                $transaccion= new Transaccion;
                $transaccion->valor=$request->valor*0.25;
                $transaccion->tipotrans=4;
                $transaccion->tipomov=1;
                $transaccion->fechaact=$fecha;
                $transaccion->userupd_id=0;
                $transaccion->isDeleted=0;
                $transaccion->statustrans=1;
                $transaccion->status=1;
                $transaccion->created_at = $fecha;
                $transaccion->user_id =$user[0]->id;
                $transaccion->saveOrFail();

                $referido= new Referido;
                $referido->user_id=$user[0]->id;
                $referido->userref_id=auth()->user()->id;
                $referido->valor=($request->valor*0.25);
                $referido->isDeleted=0;
                $referido->statustrans=1;
                $referido->status=1;
                $referido->created_at = $fecha;
                $referido->saveOrFail();
                /*$balance=Balance::where([ "status"=>1,"user_id"=>$user[0]->id])->first();
                $balance->saldo=$balance->saldo+($request->valor*0.25);
                $balance->saveOrFail();*/
            }
            

        
        
            
        }
        $result=array(["success"=>true, "response"=> true, "id"=>$model->id]);
        /*return redirect()->route('formapago.index')
            ->with('msg','Forma de Pago creado!');*/
        return json_encode($result);
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
