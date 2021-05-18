<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

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
        if (!$request->session()->has('uid')) { 
            return redirect('/login');
        }

        $datas = $this->getDetail($request->session()->get('uid'));
        return view('pages.profil')->with($datas);
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
            return redirect('/');
        }

        $data = array(
            "title" => "Masuk - DesaCenter.ID"
        );
        return view('pages.login')->with($data);
    }




    public function register(Request $request){

        if ($request->session()->has('uid')) { 
            return redirect('/');
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
