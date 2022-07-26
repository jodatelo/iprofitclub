<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balance;
use App\Models\Transaccion;
use App\Models\Finanzas;
use App\Models\Compra;
use App\Models\Retiro;
use App\Models\Banco;
use App\Models\Tipopago;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FinanzasController extends Controller
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
         
        $balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->first();
        $transacciones=Transaccion::where(["status"=>1,"user_id"=>auth()->user()->id])->orderBy('created_at', 'DESC')->get();
        //die(var_dump($transacciones));
         
        return view('finanzas.index',['balance'=>$balance,'transacciones'=>$transacciones]);

    }

    public function store(Request $request)
    {
        //die("GOFJO");
        $fecha=date('Y-m-d H:i:s');
        $user=User::where([ "email"=>$request->email])->get();
        
        if (!$user->toArray()){
            return redirect()->back()->with(['msg' => "El correo ingresado no existe!",'clase' => "bg-soft-danger text-danger"]);
          
        } 
            $transaccion = new Transaccion();
            $transaccion->valor=$request->monto;
            $transaccion->tipotrans=7;
            $transaccion->tipomov=-1;
            $transaccion->fechaact=$fecha;
            $transaccion->userupd_id=0;
            $transaccion->isDeleted=0;
            $transaccion->statustrans=1;
            $transaccion->status=1;
            $transaccion->created_at = $fecha;
            $transaccion->user_id =auth()->user()->id;
            $transaccion->saveOrFail();

            $transaccion = new Transaccion();
            $transaccion->valor=$request->monto;
            $transaccion->tipotrans=8;
            $transaccion->tipomov=1;
            $transaccion->fechaact=$fecha;
            $transaccion->userupd_id=0;
            $transaccion->isDeleted=0;
            $transaccion->statustrans=1;
            $transaccion->status=1;
            $transaccion->created_at = $fecha;
            $transaccion->user_id =$user[0]->id;
            $transaccion->saveOrFail();

            $balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->first();
            $balance->saldo=$balance->saldo-$request->monto;
            $balance->saveOrFail();


            $balance=Balance::where([ "status"=>1,"user_id"=>$user[0]->id])->first();
            $balance->saldo=$balance->saldo+$request->monto;
            $balance->saveOrFail();
        //$model->saveOrFail();
        return redirect()->route('finanzas.index')->with(['msg' => "Envio realizado con éxito!",'clase' => "bg-soft-success text-success"]);
        //return redirect()->route('finanzas.index')->with('msg','Transacción enviada!');

    }

    
    public function solicitar(Request $request)
    {
        $fecha=date('Y-m-d H:i:s');

        if (!$request->monto || $request->forma==0){
            return redirect()->back()->with(['msg' => "Faltan campos requeridos!",'clase' => "bg-soft-danger text-danger"]);
        }

        if ($request->forma==1){
            if (!$request->banco || !$request->tcuenta || !$request->transaccion || !$request->banco || !$request->ntitular || !$request->ctitular){
                return redirect()->back()->with(['msg' => "Faltan campos requeridos para la forma de pago!",'clase' => "bg-soft-danger text-danger"]);
            }
        }

        if ($request->forma==2){
            if (!$request->moneda || !$request->redn || !$request->wallet){
                return redirect()->back()->with(['msg' => "Faltan campos requeridos para la forma de pago!",'clase' => "bg-soft-danger text-danger"]);
            }
        }


        if (auth()->user()->cedulafro="" && $request->file('cedulafro'))
        {
            return redirect()->back()->with(['msg' => "Debe ingresar la foto de la cédula!",'clase' => "bg-soft-danger text-danger"]);

        }

        if (auth()->user()->cedularev="" && $request->file('cedularev'))
        {
            return redirect()->back()->with(['msg' => "Debe ingresar la foto de la cédula!",'clase' => "bg-soft-danger text-danger"]);

        }

        $retiros= Retiro::where(["user_id"=>auth()->user()->id,'statusret'=>1])->get();
        $valtotal=0;
        foreach ($retiros as $key => $value) {
            $valtotal= $valtotal+$value->monto;
        }
        $valtotal= $valtotal+$request->monto;
        $balanceVal=Balance::where(["user_id"=>auth()->user()->id])->first();
        if ($balanceVal->saldo < $valtotal)
        {
            return redirect()->back()->with(['msg' => "Hay valores de retiro pendiente que superan su saldo!",'clase' => "bg-soft-danger text-danger"]);    
        }
   

        $compra= new Retiro;
        $compra->monto=$request->monto;
        $compra->formapago=$request->forma;
        if ($request->forma==1){
            $compra->banco=$request->banco;
            $compra->ncuenta=$request->transaccion;
            $compra->tipocuenta=$request->tcuenta;
            $compra->cedulatit=$request->ctitular;
            $compra->nombretit=$request->ntitular;
        }
        if ($request->forma==2){
            $compra->moneda=$request->moneda;
            $compra->red=$request->redn;
            $compra->wallet=$request->wallet;
        }
        $compra->statusret=1;
  

        /*if($request->file('archivo')){
            $file= $request->file('archivo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('comprobantes'), $filename);
            //$compra->comprobante= $filename;
        }*/

        if($request->file('cedulafro')){
            $file= $request->file('cedulafro');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('cedulas'), $filename);
            $user =Auth::user();
            $user->cedulafro=$filename;
            $user->saveOrFail();
        }

        if($request->file('cedularev')){
            $file= $request->file('cedularev');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('cedulas'), $filename);
            /*$compra->comprobante= $filename;*/
            $user =Auth::user();
            $user->cedularev=$filename;
            $user->saveOrFail();
        }

        $compra->user_id=auth()->user()->id;
        $compra->userapr_id=0;
        $compra->isDeleted=0;
        $compra->status=1;
        $compra->created_at=$fecha;


        if ($compra->saveOrFail()){
            return redirect()->route('finanzas.retiros')->with(['msg' => "Solicitud de retiro generada con éxito!",'clase' => "bg-soft-success text-success"]);

        }
        return redirect()->back()->with(['msg' => "Error al generar la solicitud de retiro!",'clase' => "bg-soft-danger text-danger"]);
    }
   
    public function enviar()
    {
        $balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->get();
        return view('finanzas.enviar',['balance'=>$balance]);

    }

    public function retiros()
    {
        
        $formas=Tipopago::where(["status"=>1])->get();
        $transacciones=Retiro::where(["status"=>1,"user_id"=>auth()->user()->id])->get();
        $bancos=Banco::where(["status"=>1])->get();

        $balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->get();
        return view('finanzas.compra',['balance'=>$balance,'transacciones'=>$transacciones,'formas'=>$formas,'bancos'=>$bancos]);

    }

    public function show()
    {
        /*$balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->get();
        return view('finanzas.enviar',['balance'=>$balance]);*/
echo 'O1!!!';
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
