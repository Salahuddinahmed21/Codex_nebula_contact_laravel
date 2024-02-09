<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {  
               return view('user.index');
    }
    public function store(Request $request)
    {
        $request->request->add(['is_enable' => 1]);
        $obj = Client::create($request->all());
        $data = ['id' => $obj->id];
        return redirect()->route('ClientDetailViews');
    }
    public function ClientDetails()
    {  
               return view('user.mainform');
    }
    public function CDStore(Request $request)
    {  
      
       dd($request);
    }

}
