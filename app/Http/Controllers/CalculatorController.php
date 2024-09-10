<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function showCalculatorPage()
    {
        return view('mypages.calculator',[
            'result' => null
        ]);
    }
        public function calculate(Request $request)
        {
            $request->validate([
                'number1' => 'required|numeric',
                'number2' => 'required|numeric',

            ]);

            $num1 = $request ->input('number1');
            $num2 = $request ->input('number1');

            $result  = $num1 + $num2;
            return view('mypages.calculator',['result' => $result]);

        }

}
