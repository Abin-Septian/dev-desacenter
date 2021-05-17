<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;
use Kreait\Firebase\Exception\SignInResult\SignInResult;
use Auth;
use Session;
use Socialite;
use App\Models\User;


class AuthController extends Controller
{

    public function _register(Request $request){

        
            $uid = $request->input('uid');
            $phone = $request->input('phone');

            $uRef = app('firebase.firestore')->database()->collection('Users')->Document($uid);
            $uRef->set([
                'name' => "",
                'email' => "",
                'phone' => $phone
            ]);

            if($uRef){
                Session::put('uid', $uid);
                return response()->json(['success' => true, 'message' => "Register Berhasil."],200);
            }else{
                return response()->json(['success' => false, 'message' => 'Register Gagal.'],400);
            }

            

            
    }



    /**
     * Google OAuth.
     *
     */
    public function redirect()
    {

        return Socialite::driver('google')->redirect();

    }

    public function callback(Request $request){
  
        $OAuth = Socialite::driver('google')->stateless()->user();
        
        return redirect ('/member');

    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');

    }



}
