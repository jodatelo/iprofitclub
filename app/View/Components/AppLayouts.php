<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class AppLayouts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $_header = DB::table('settings')->first();
        $menus = DB::table('menus')->where(['parent'=>0,'status'=>1])->get();
 
        return view('layout.app', compact('_header','menus'));
    }
}