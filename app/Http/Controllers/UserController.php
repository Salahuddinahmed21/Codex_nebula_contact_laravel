<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function store(Request $request)
    {  
        dd($request);
        $formDataList = json_decode($request->input('formDataListName'), true);
        return response()->json(['message' => $formDataList], 200);            
    }
}
