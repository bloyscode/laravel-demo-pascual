<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class CalController extends Controller
{
    public function add(Request $request){
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 + $num2;
        return view('prelim-pascual.add',compact('result'));
    }
    public function sub(Request $request){
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 - $num2;
        return view('prelim-pascual.sub',compact('result'));
    }
    public function multiply(Request $request){
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 * $num2;
        return view('prelim-pascual.multiply',compact('result'));
    }
    public function division(Request $request){
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        // $result = $num1 / $num2;

        return view('prelim-pascual.division',compact('result'));
        // if ($num1 == 0){
        //     return view('prelim-pascual.division',$result,['result'=>'Cannot divide by zero']);
        // }
        if($num2 == 0){
            return view('prelim-pascual.division',$result,['result'=>'Cannot divide by zero']);
    }
    $result = $num1 / $num2;

}
            
}