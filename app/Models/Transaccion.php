<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    public function tipo()
    {
        //return $this->belongsTo(Tipo_transaccion::class,'tipotrans');
        $tipo= Tipo_transaccion::where(["id"=>$this->tipotrans])->first();
        //(var_dump($this->id));
        return $tipo;
    }
}
