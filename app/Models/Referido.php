<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referido extends Model
{
    use HasFactory;

    public function usuariorefer()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $usuario= User::where(["id"=>$this->userref_id])->first();
        //(var_dump($this->id));
        return $usuario;
    }
}
