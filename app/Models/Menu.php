<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function superior()
    {
        return $this->belongsTo(Menu::class,'parent');
    }
    public function submenu()
    {
        $submenus= Menu::where(["parent"=>$this->id])->get();
        //(var_dump($this->id));
        return $submenus;
    }
}
