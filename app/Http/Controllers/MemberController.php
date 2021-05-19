<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    
    public function index(Request $request){

       
        return view('layoutmain.main');
    }


    public function login1(Request $request){

        if (!$request->session()->has('uid')) { 
            return redirect('/login');
        }
        
        $datas = $this->getDetail($request->session()->get('uid'));
        return view('pages.home')->with($datas);
    }



    public function profil(Request $request){
        
        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        //$datas = $this->getDetail($request->session()->get('uid'));
        return view('pages.profil');
    }

    public function joindesa(Request $request)
    {
        
        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->provinsi = DB::table('mst_provinsi')
                             ->select(
                                "kode_propinsi as kode",
                                "mst_provinsi.nama_propinsi as nama"
                             )
                             ->get();

        $data = array(
            "provinsi" => $this->provinsi
        );

        return view('pages.joindesa')->with($data);
    }



    public function unit_usaha(Request $request){
        if (!$request->session()->has('uid')) { 
            return redirect('/login');
        }

        $datas = $this->getDetail($request->session()->get('uid'));

        return view('pages.unit-usaha')->with($datas);
    }



    public function edukasi(Request $request){
        if (!$request->session()->has('uid')) { 
            return redirect('/login');
        }
        $datas = $this->getDetail($request->session()->get('uid'));
        return view('pages.edukasi')->with($datas);
    }



    public function manage_member(Request $request){
        if (!$request->session()->has('uid')) { 
            return redirect('/login');
        }
        $datas = $this->getDetail($request->session()->get('uid'));
        return view('pages.member')->with($datas);
    }



    public function assesment(Request $request){
        if (!$request->session()->has('uid')) { 
            return redirect('/login');
        }

        $datas = $this->getDetail($request->session()->get('uid'));

        return view('pages.assesment')->with($datas);
    }




    public function login(Request $request){
        if ($request->session()->has('uid')) { 
            return redirect('/profil');
        }

        $data = array(
            "title" => "Masuk - DesaCenter.ID"
        );
        return view('pages.login')->with($data);
    }




    public function register(Request $request){

        if ($request->session()->has('uid')) { 
            return redirect('/profil');
        }


        $data = array(
            "title" => "Daftar - DesaCenter.ID"
        );

        return view('pages.register')->with($data);
    }

    

    public function getDetail(String $uid){
        $cUser = app('firebase.firestore')->database()->collection("Users")->document($uid)->snapshot();

        $name = $cUser->data()['name'];
        $phone = $cUser->data()['phone'];
        $email = $cUser->data()['email'];

        $datas = array(
            "name" => $name,
            "email" => $email,
            "phone" => $phone
        );

        return $datas;

    }


}
