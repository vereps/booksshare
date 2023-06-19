<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(string $operation, int $a, int $b) {
        switch ($operation) {
            case 'sum':
                $sum =  $a + $b;
                echo ucfirst("$operation: $sum");
                break;
            case 'subtract':
                $subtract =  $a - $b;
                echo ucfirst("$operation: $subtract");
                break;
            case 'multiply':
                $multiply =  $a * $b;
                echo ucfirst("$operation: $multiply");
                break;
            case 'divide':
                $divide =  $a / $b;
                echo ucfirst("$operation: $divide");
                break;
            default:
        }
        // return "Found task $id";
    }
}
