<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;

    public function comerciante()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $usuario= User::where(["id"=>$this->user_id])->first();
        //(var_dump($this->id));
        return $usuario;
    }
    public function tipopago()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $usuario= User::where(["id"=>$this->user_id])->first();
        //(var_dump($this->id));
        return $usuario;
    }
}
