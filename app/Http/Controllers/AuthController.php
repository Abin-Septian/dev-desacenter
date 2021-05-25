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

        $this->CheckMember = DB::table("mst_member")
                                   ->select("uid","email")
                                   ->where("telp", $this->input['telp'])
                                   ->get();

        if($this->CheckMember->count() > 0)
        {
            
            $this->response = array(
                "status" => true,
                "message" => "Login berhasil. Mohon tunggu untuk masuk ke halaman member"
            );

            $request->session()->put("uid", $this->input['uid']);
            $request->session()->put("telp", $this->input['telp']);

            echo json_encode($this->response);
        }
        else
        {

            $this->getuniqpin = $this->getpin();

            DB::table("mst_member")
              ->insert([
                  "telp"       => $this->input['telp'],
                  "uid"        => $this->input['uid'],
                  "pin"        => $this->getuniqpin,
                  "date_entry" => date("Y-m-d H:i:s")
              ]);

            $this->response = array(
                "status" => true,
                "message" => "Login berhasil. Mohon tunggu untuk masuk ke halaman member"
            );

            $request->session()->put("uid", $this->input['uid']);
            $request->session()->put("telp", $this->input['telp']);

            echo json_encode($this->response);
        }
    }


    public function getpin()
    {
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = substr(str_shuffle($chars), 0, 6);

        $this->getPin = DB::table("mst_member as a")
                            ->where("a.pin", $pin)
                            ->get();

        if($this->getPin->count() > 0)
        {
            $this->getpin();
        }
        else
        {
            return $pin;
        }
    }

    public function authLogin__(Request $request)
    {
        $this->input = $request->input();

        $this->MigrationMember = DB::table("mst_member")
                                   ->select("uid","email")
                                   ->where("telp", $this->input['telp'])
                                   ->get();

        //MEMBER LAMA MELAKUKAN LOGIN DIAPLIKASI
        if($this->MigrationMember->count() > 0)
        {
            
            $this->member = $this->MigrationMember->first();

            $this->uid = $this->member->uid;

            //CHECK UID SUDAH DISET ATAU BELUM, 
            //JIKA SUDAH DISET BERATI SUDAH PERNAH LOGIN
            
            if($this->uid == 0)
            {

                DB::table("mst_member as a")
                  ->where("a.telp", $this->input['telp'])
                  ->update([
                      "uid" => $this->input['uid']
                ]);

                $this->getUid = DB::table("mst_member as a")
                                  ->where("a.telp", $this->input['telp'])
                                  ->get()->first();

                $request->session()->put("uid", $this->getUid->uid);
                $request->session()->put("id", $this->getUid->id);
                $request->session()->put("telp", $this->getUid->telp);

                $this->response = array(
                    "status"  => true,
                    "message" => "Login berhasil. Mohon tunggu untuk masuk ke halaman dashboard member."
                );
            }
            else
            {
                //UID SUDAH ADA DAN LANGSUNG MASUK KE HALAMAN DASHBOARD
                $this->getUid = DB::table("mst_member as a")
                                  ->where("a.telp", $this->input['telp'])
                                  ->where("a.uid", $this->input['uid'])
                                  ->get()->first();

                $request->session()->put("uid", $this->getUid->uid);
                $request->session()->put("id", $this->getUid->id);
                $request->session()->put("telp", $this->getUid->telp);

                $this->response = array(
                    "status"  => true,
                    "message" => "Login berhasil. Mohon tunggu untuk masuk ke halaman dashboard member."
                );
            }
        }
        else
        {
            //MEMBER BARU YANG TIDAK MEMPUNYAI AKUN MELAKUKAN LOGIN

            $this->uid = $this->input['uid'];

            $request->session()->put("uid", $this->uid);
            $request->session()->put("telp", $this->input['telp']);

            $this->response = array(
                "status" => "belum",
                "message" => "Mohon tunggu sebentar untuk pengecekan email anda."
            );

            //return redirect("/authRegisterWithEmail")->with($data);
            //exit();
        }
        

        echo json_encode($this->response);
    }

    public function authRegisterWithEmail(Request $request)
    {
        $data = array(
            "uid"  => $request->session()->get('uid'),
            "telp" => $request->session()->get('telp')
        );

        return view("pages.authemail")->with($data);
    }

    public function daftarUserByEmail(Request $request)
    {
        $this->input = $request->input();

        $this->uid   = $this->input['uid'];
        $this->email = $this->input['email'];
        $this->telp  = $this->input['telp'];

        DB::table("mst_member")
          ->insert([
            "uid"   => $this->uid,
            "email" => $this->email,
            "telp"  => $this->telp,
            "date_entry" => date("Y-m-d H:i:s"),
            "status" => "aktif"
          ]);

        $request->session()->put("uid", $this->uid);
        
        return redirect("/dashboard");


    }

    public function authLogin_(Request $request)
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
