<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //NANDA
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


    //RYZVIE

    public function dashboard(Request $request)
    {
        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status","Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->uid = $request->session()->get("uid");

        $this->member = DB::table("mst_member as a")
                          ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto")
                          ->where("a.uid", $this->uid)
                          ->get();

        $data = array(
            "member" => $this->member->first()
        );

        return view("pages.dashboard")->with($data);
    }

    public function profil(Request $request){
        
        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->uid = $request->session()->get("uid");

        $this->member = DB::table("mst_member as a")
                          ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto")
                          ->where("a.uid", $this->uid)
                          ->get();

        $data = array(
            "member" => $this->member->first()
        );
        
        return view('pages.profil')->with($data);
    }

    public function joindesa(Request $request)
    {
        
        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->uid = $request->session()->get("uid");

        $this->provinsi = DB::table('mst_provinsi')
                             ->select(
                                "kode_propinsi as kode",
                                "mst_provinsi.nama_propinsi as nama"
                             )
                             ->get();

        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto")
                        ->where("a.uid", $this->uid)
                        ->get();

        $this->isSudahPilihDesa = DB::table("mst_member as a")
                                    ->select("a.id_instansi")
                                    ->where("uid", $this->uid)
                                    ->get();

        $data = array(
            "provinsi" => $this->provinsi,
            "isSudahPilih" => $this->isSudahPilihDesa->first(),
            "member" => $this->member->first()
        );

        return view('pages.joindesa')->with($data);
    }

    public function postJoinDesa(Request $request)
    {

        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->input = $request->input();

        $this->instansi = $this->input['iddesa'];
        $this->uid      = $request->session()->get("uid");

        $this->checkMember = DB::table("mst_member as a")
                             ->where("a.id_instansi", $this->instansi)
                             ->get();

        if($this->checkMember->count() > 0)
        {
            DB::table("mst_member as a")
            ->where("uid", $this->uid)
            ->update([
                'id_instansi' => $this->instansi,
                'is_admin' => 0,
                'approved' => 0
            ]);
        }
        else
        {

            DB::table("mst_member as a")
            ->where("uid", $this->uid)
            ->update([
                'id_instansi' => $this->instansi,
                'is_admin' => 1,
                'approved' => 1
            ]);

        }

        $this->response = array(
            "status" => true,
            "message" => "Data telah berhasil disimpan."
        );

        echo json_encode($this->response);
    }

    public function profilAkun(Request $request)
    {
        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }


        $this->uid = $request->session()->get('uid');

        $this->result = DB::table("mst_member")
                          ->where("uid", $this->uid)
                          ->get();

        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto")
                        ->where("a.uid", $this->uid)
                        ->get();

        $data = array(
            "response" => $this->result->first(),
            "member"   => $this->member->first()
        );

        return view("pages.profilakun")->with($data);
    }

    public function updateProfil(Request $request)
    {
        //echo "<pre>";print_r($request->file->getClientOriginalName());"</pre>";

        $this->input = $request->input();
        $name = "";

        $this->nama   = $this->input['nama'];
        $this->email  = $this->input['email'];
        $this->alamat = $this->input['alamat'];

        $this->uid    = $request->session()->get('uid');

        if($request->file())
        {
            $request->validate([
                'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
            ]);

            $name = $this->uid.'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('public/upload', $name);

            $data['foto'] = $name;
        }

        $data['nama'] = $this->nama;
        $data['alamat'] = $this->alamat;
        $data['email'] = $this->email;

        DB::table("mst_member")
               ->where("uid", $this->uid)
               ->update($data);

        return redirect("/profil/akun")->with("status", "Data Berhasil diupdate.");

    }


}
