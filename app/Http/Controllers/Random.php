<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Random extends Controller
{
    public function random($n1, $n2){


        if(!is_numeric($n1) || !is_numeric($n2)){
            $response = ['msg' => "Alguna de las variables no es numerica"];
            return response($response, 400);
        }

        $number_random = rand($n1, $n2);
        $response = ['number_random' => $number_random];
        return response($response, 200);
    }
}
