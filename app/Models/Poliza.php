<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    use HasFactory;
    public function usuario()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $usuario= User::where(["id"=>$this->user_id])->first();
        //(var_dump($this->id));
        return $usuario;
    }
}
