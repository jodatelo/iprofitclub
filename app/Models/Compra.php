<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public function usuario()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $usuario= User::where(["id"=>$this->user_id])->first();
        //(var_dump($this->id));
        return $usuario;
    }

    public function banco()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $banco= Banco::where(["id"=>$this->banco_id])->first();
        //(var_dump($this->id));
        return $banco;
    }
}
