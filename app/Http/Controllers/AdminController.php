<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {  
        return view('admin.dashboard');
    }  
    
    public function login()
    {  
        return view('admin.login');
    } 
    public function SignIn(Request $request)
    {  
        $email=$request->post('email');
        $password=$request->post('password');
        //   dd($request);

        $result=User::where(['is_enable'=>1,'email'=>$email])->first();
        
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                $request->session()->put('ADMIN_Name',$result->name);
                $request->session()->put('user_type',$result->user_type_id);
                
                    return redirect('dashboard');
               
            }
            else{

                $request->session()->flash('error','Please enter correct password');
                return redirect()->back();
            }
        }
        else
        {
            $request->session()->flash('error','Please enter valid Email');
            return redirect()->back();
        }
        return view('admin.dashboard');
        
 
    }
    public function create()
    {  
        return view('admin.user.create');
    } 
    public function store(Request $request)
    {
        $request->request->add(['is_enable' => 1]);
        $request['password']=Hash::make($request['password']);
        $obj = User::create($request->all());
        
        $data = ['id' => $obj->id];
        return redirect()->route('dashboard')->with('success', 'User Created successfully');
    }

    public function usertable()
    {  
        $data['users'] = User::where('is_enable', 1)->get();
        return view('admin.user.index',$data);
    }  

}
