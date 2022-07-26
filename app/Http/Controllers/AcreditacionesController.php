<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\User;
use App\Models\Balance;
use App\Models\Transaccion;


class AcreditacionesController extends Controller
{
    public function index()
    {
        $compras = Compra::select('*')->orderBy('created_at', 'DESC')->paginate(20);
        return view('acreditaciones.index', compact('compras'));
    }


    public function acreditar()
    {
        $usuarios = User::select('*')->get();
        return view('acreditaciones.acreditar', compact('usuarios'));
    }

    public function store(Request $request)
    {
        //die("GOFJO");
        $fecha=date('Y-m-d H:i:s');
        $user=User::where([ "id"=>$request->usuario])->get();
        
        if (!$user->toArray()){
            return redirect()->back()->with(['msg' => "El correo ingresado no existe!",'clase' => "bg-soft-danger text-danger"]);
        } 

        $compra= New Compra;
        

        $compra->statuscomp=2;
        $compra->status=1;
        $compra->ntransaccion=rand(11111,99999);
        $compra->comprobante="";
        $compra->banco_id=0;
        $compra->user_id =$request->usuario;
        $compra->userapr_id =1;
        $compra->monto=$request->monto;
        $compra->created_at = $fecha;

        if ($compra->saveOrFail()){
            $transaccion = new Transaccion();
            $transaccion->valor=$request->monto;
            $transaccion->tipotrans=1;
            $transaccion->tipomov=1;
            $transaccion->fechaact=$fecha;
            $transaccion->userupd_id=0;
            $transaccion->isDeleted=0;
            $transaccion->statustrans=1;
            $transaccion->status=1;
            $transaccion->created_at = $fecha;
            $transaccion->user_id =$request->usuario;
            $transaccion->saveOrFail();

            

          

            $balance=Balance::where([ "status"=>1,"user_id"=>$request->usuario])->first();
            $balance->saldo=$balance->saldo+$request->monto;
            $balance->saveOrFail();
            return redirect()->route('acreditaciones.acreditar')->with(['msg' => "Acreditación realizado con éxito!",'clase' => "bg-soft-success text-success"]);

        }else{
            return redirect()->route('acreditaciones.acreditar')->with(['msg' => "Error al acreditar el valor!",'clase' => "bg-soft-danger text-danger"]);

        }
        //$model->saveOrFail();
        return redirect()->route('acreditaciones.acreditar')->with(['msg' => "Error al acreditar el valor!",'clase' => "bg-soft-danger text-danger"]);
        

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('acreditaciones.index')
        ->with('success','User has been deleted successfully');
    }

 

    public function eliminar($id)
    {
        $fecha=date('Y-m-d H:i:s');
 
        $compra= Compra::where(["id"=>$id])->first();
        $statusinit=$compra->statuscomp;
        
        $compra->statuscomp=3;
        if ($compra->saveOrFail()){
            if ($statusinit==2){
                $transaccion = new Transaccion();
                $transaccion->valor=$compra->monto;
                $transaccion->tipotrans=13;
                $transaccion->tipomov=-1;
                $transaccion->fechaact=$fecha;
                $transaccion->userupd_id=0;
                $transaccion->isDeleted=0;
                $transaccion->statustrans=1;
                $transaccion->status=1;
                $transaccion->created_at = $fecha;
                $transaccion->user_id =$compra->user_id;
                $transaccion->saveOrFail();

                $balance=Balance::where([ "status"=>1,"user_id"=>$compra->user_id])->first();
                $balance->saldo=$balance->saldo-$compra->monto;
                $balance->saveOrFail();
            }
        }

        return redirect()->route('acreditaciones.index')
        ->with('success','Compra reversada!');
    }
}
