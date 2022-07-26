<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    use HasFactory;

    public function usuario()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $usuario= User::where(["id"=>$this->user_id])->first();
        //(var_dump($this->id));
        return $usuario;
    }

    public function formap()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $banco= Tipopago::where(["id"=>$this->formapago])->first();
        //(var_dump($this->id));
        return $banco;
    }
}
