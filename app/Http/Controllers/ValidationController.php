<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class ValidationController extends Controller{

    public function encrypt($text, $shift){
        $result = "";
        for ($i = 0; $i < strlen($text); $i++){  
            if (ctype_upper($text[$i])){
                $result = $result.chr((ord($text[$i]) + $shift - 65) % 26 + 65); // for UPPERCASE po ito mamser
            }else{
                $result = $result.chr((ord($text[$i]) + $shift - 97) % 26 + 97); //for lowecase din po ito mamseeerr
            }
        } 
        return $result; 
        //cipher.end
    } 

    public function register(Request $request){
        if($request->password1===$request->password2){
            try{
                $user = new User;
                $user->firstname = $request->firstname;
                $user->middlename = $request->middlename;
                $user->lastname = $request->lastname;
                $user->username = $request->username;
                $user->password = $this->encrypt($request->password1 , 4);
                $user->save();
                return redirect('/login')->with('msg','Registered!');
            }catch (Throwable $e){
                return redirect()->back()->with('msgerr', 'Username already used, try another one');
            }
        }else{
            return redirect()->back()->with('msgerr', 'Password mismatched');
        }
        //register.end
    }

    public function login(Request $request){
        $pw = $this->encrypt($request->password,4);
        $users = User::where('username',$request->username)->where('password',$pw)->limit(1)->get();
        if(count($users)){
            session(['isactive' => "YES"]);
            return redirect('/main');
        }else{
            session(['isactive' => "NO"]);
            return redirect()->back()->with('msgerr','Incorrect username or password');
        }



        //login.end
    }

    //end
}
