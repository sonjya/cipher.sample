<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class ValidationController extends Controller
{
    public function register(Request $request){
        //encypting here
        function encrypt($text, $shift){
            $result = "";
            // traverse text 
            for ($i = 0; $i < strlen($text); $i++){ 
                // apply transformation to each  
                // character Encrypt Uppercase letters 
                if (ctype_upper($text[$i])){
                    $result = $result.chr((ord($text[$i]) + $shift - 65) % 26 + 65); 
                }
            // Encrypt Lowercase letters 
                else{
                    $result = $result.chr((ord($text[$i]) + $shift - 97) % 26 + 97); 
                }
            } 
            // Return the resulting string 
            return $result; 
        } 

        if($request->password1===$request->password2){
            try{
                $user = new User;
                $user->firstname = $request->firstname;
                $user->middlename = $request->middlename;
                $user->lastname = $request->lastname;
                $user->username = $request->username;
                $user->password = encrypt($request->password1 , 4);
                $user->save();
                return redirect('/login');
            }catch (Throwable $e){
                return redirect()->back()->with('msgerr', 'Username already used, try another one');
            }
        }else{
            return redirect()->back()->with('msgerr', 'Password mismatched');
        }
    }
}
