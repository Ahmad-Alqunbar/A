<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummy_api extends Controller
{
    public function getData(){


        return [
            'Name'=>'Ahmad Alqunbar',
            'Email'=>'Ahmad_alqunbar@gmail.com',

            ];
}
}
