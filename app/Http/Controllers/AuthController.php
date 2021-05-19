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
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

    //RYZVIE 
    public function daftarUser(Request $request)
    {
        $post = $request->input();
        

        $_token = $post['_token'];
        $uid    = $post['uid'];
        $telp   = $post['telp'];

        $this->checkmember = DB::table("mst_member")
                                ->where("telp", $telp)
                                ->get();

        if($this->checkmember->count() > 0)
        {
            $response = array(
                "status"  => false,
                "message" => "Nomor telepon sudah pernah terdaftar. Silahkan gunakan nomor telepon lain"
            );

            echo json_encode($response);
            exit();

        }

        $request->session()->put("uid", $uid);

        DB::table('mst_member')->insert([
            "uid" => $uid,
            "telp" => $telp
        ]);

        //USE ELOQUENT
        // User::create([
        //     "uid" => $uid,
        //     "telp" => $telp
        // ]);

        $response = array(
            "status"  => true,
            "message" => "Data berhasil disimpan. Mohon tunggu untuk masuk ke halaman dashboard"
        );

        echo json_encode($response);
    }   

    public function authLogin(Request $request)
    {

        $this->input = $request->input();

        $this->checkmember = DB::table('mst_member')
                                ->where('telp', $this->input['telp'])
                                ->where('uid', $this->input['uid'])
                                ->get();

        if($this->checkmember->count() == 0)
        {
            $response = array(
                "status"  => false,
                "message" => "Nomor telp tidak terdaftar dalam database kami. Silahkan cek kembali inputan anda."
            );

            echo json_encode($response);
            exit();
        }

        $this->member = $this->checkmember->first();

        $this->uid = $this->member->uid;
        $this->id  = $this->member->id;

        $request->session()->put("uid", $this->uid);
        $request->session()->put("id", $this->id);

        $response = array(
            "status"  => true,
            "message" => "Login sukses. Mohon tunggu untuk masuk ke halaman dashboard."
        );

        echo json_encode($response);
    }


    //NANDA 
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
