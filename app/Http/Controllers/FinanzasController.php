<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balance;
use App\Models\Transaccion;
use App\Models\Finanzas;
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
        $transacciones=Transaccion::where(["status"=>1,"user_id"=>auth()->user()->id])->get();
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

    

   
    public function enviar()
    {
        $balance=Balance::where([ "status"=>1,"user_id"=>auth()->user()->id])->get();
        return view('finanzas.enviar',['balance'=>$balance]);

    }

    public function compras()
    {
        $transacciones=Transaccion::where(["status"=>1,"user_id"=>auth()->user()->id])->get();
        $formas=Tipopago::where(["status"=>1])->get();
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

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar =  $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "User Details Updated successfully!"
            // ], 200); // Status code here
            return redirect()->back();
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "Something went wrong!"
            // ], 200); // Status code here
            return redirect()->back();

        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
