<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Retiro;
use App\Models\Balance;
use App\Models\Transaccion;


class RetirosController extends Controller
{
    public function index()
    {
        $retitostrans = Retiro::select('*')->where(['formapago'=>1])->orderBy('created_at', 'DESC')->paginate(20);
        $retirosbit = Retiro::select('*')->where(['formapago'=>2])->orderBy('created_at', 'DESC')->paginate(20);
        return view('retiros.index', (['retirostrans'=>$retitostrans,'retirosbit'=>$retirosbit]));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('retiros.index')
        ->with('success','User has been deleted successfully');
    }

    public function aceptar($id)
    {
        $fecha=date('Y-m-d H:i:s');
        $retiro2= Retiro::where(["id"=>$id])->first();
        $retiro= Retiro::where(["id"=>$id])->get();
  
        $valtotal=0;
        $valtotal= $valtotal+$retiro[0]->monto;
        $balanceVal=Balance::where(["user_id"=>$retiro[0]->user_id])->first();
        if ($balanceVal->saldo < $valtotal)
        {
            return redirect()->route('retiros.index')->with('danger','Retiro no realizado, monto a retirar supera el balance del cliente!');
        }

        $retiro2->statusret=2;
        if ($retiro2->saveOrFail()){
            $transaccion = new Transaccion();
            $transaccion->valor=$retiro[0]->monto;
            $transaccion->tipotrans=11;
            $transaccion->tipomov=-1;
            $transaccion->fechaact=$fecha;
            $transaccion->userupd_id=0;
            $transaccion->isDeleted=0;
            $transaccion->statustrans=1;
            $transaccion->status=1;
            $transaccion->created_at = $fecha;
            $transaccion->user_id =$retiro[0]->user_id;

            if ($transaccion->saveOrFail()){
                $balance=Balance::where([ "status"=>1,"user_id"=>$retiro[0]->user_id])->first();
                $balance->saldo=$balance->saldo-$retiro[0]->monto;
                $balance->saveOrFail();

                return redirect()->route('retiros.index')
        ->with('success','Retiro aprobado!');
            } 
            
        }else{

        }
        //die(var_dump($retiro));
        
   
      
        return redirect()->route('retiros.index')
        ->with('danger','Retiro no realizado!');
    }

    public function eliminar($id)
    {

        $fecha=date('Y-m-d H:i:s');
        $retiro2= Retiro::where(["id"=>$id])->first();
        $retiro= Retiro::where(["id"=>$id])->get();
  
        $statusinit=$retiro2->statusret;
        $retiro2->statusret=3;
        if ($retiro2->saveOrFail()){
            if ($statusinit==2){
                $transaccion = new Transaccion();
                $transaccion->valor=$retiro[0]->monto;
                $transaccion->tipotrans=12;
                $transaccion->tipomov=1;
                $transaccion->fechaact=$fecha;
                $transaccion->userupd_id=0;
                $transaccion->isDeleted=0;
                $transaccion->statustrans=1;
                $transaccion->status=1;
                $transaccion->created_at = $fecha;
                $transaccion->user_id =$retiro[0]->user_id;

                if ($transaccion->saveOrFail()){
                    $balance=Balance::where([ "status"=>1,"user_id"=>$retiro[0]->user_id])->first();
                    $balance->saldo=$balance->saldo+$retiro[0]->monto;
                    $balance->saveOrFail();
                }
            }
           

           
                return redirect()->route('retiros.index')
        ->with('success','Retiro anulado!');
           
          /*  } */
            
        }else{

        }
        //die(var_dump($retiro));
        
   
      
        return redirect()->route('retiros.index')
        ->with('danger','Retiro no anulado!');
    }
}
