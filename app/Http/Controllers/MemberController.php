<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function __construct(){


        //SET VARIABLE GLOBAL MASTER DATA
        $this->program = DB::table("mst_training as a")
                         ->where("a.reff_id", "0")
                         ->get();

    }

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
            "member" => $this->member->first(),
            "program" => $this->program
        );

        return view("pages.dashboard")->with($data);
    }

    public function profildesa(Request $request){
        
        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->uid = $request->session()->get("uid");

        $this->member = DB::table("mst_member as a")
                          ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto","a.id_instansi")
                          ->where("a.uid", $this->uid)
                          ->get();

        $this->desa = DB::table("mst_instansi as a")
                        ->select(
                            "a.kode_instansi as kodedesa",
                            "a.nama_instansi as namadesa",
                            "d.nama_propinsi as provinsi",
                            "c.nama_kabupaten as kabupaten",
                            "b.nama_kecamatan as kecamatan",
                            "a.nama_kepala as namakepala",
                            "a.no_wa_kepala as nowakepala",
                            "a.nama_sekertaris as namasekertaris",
                            "a.no_wa_sekertaris as nowasekertaris"
                        )
                        ->join("mst_kecamatan as b","b.kode_kecamatan", "=", "a.id_kecamatan")
                        ->join("mst_kabupaten as c", "c.kode_kabupaten", "=", "a.id_kabupaten")
                        ->join("mst_provinsi as d", "d.kode_propinsi", "=", "a.id_provinsi")
                        ->where("a.id_instansi", $this->member->first()->id_instansi)
                        ->get();

        $data = array(
            "member"  => $this->member->first(),
            "desa"    => $this->desa->first(),
            "program" => $this->program
        );
        
        return view('pages.profildesa')->with($data);
    }

    public function profilbumdes(Request $request)
    {
        if(!$request->session()->has('uid'))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->uid = $request->session()->get("uid");

        $this->member = DB::table("mst_member as a")
                          ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto","a.id_instansi")
                          ->where("a.uid", $this->uid)
                          ->get();

        $data = array(
            "member" => $this->member->first(),
            "program" => $this->program
        );

        return view('pages.profilbumdes')->with($data);
    }

    public function joindesa(Request $request)
    {
        
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

        $this->isSudahPilihDesa = DB::table("mst_member as a")
                                    ->select("a.id_instansi")
                                    ->where("uid", $this->uid)
                                    ->get();

        $data = array(
            "isSudahPilih" => $this->isSudahPilihDesa->first(),
            "member" => $this->member->first(),
            "program" => $this->program
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

        $this->kodedesa = $this->input['kodedesa'];
        $this->uid      = $request->session()->get("uid");

        //CHECK APAKAH DESA SUDAH ADA DI TABLE MST_INSTANSI
        //DATA INSTANSI TIDAK BOLEH DOUBLE
        $this->isDesaDaftar = DB::table("mst_instansi as a")
                            ->where("a.kode_instansi", $this->kodedesa)
                            ->get();

        if($this->isDesaDaftar->count() == 0)
        {
           

            $this->iduser = DB::table("mst_member as a")
                                ->select("a.id")
                                ->where("a.uid", $request->session()->get("uid"))
                                ->get()->first();

            $this->desa = DB::table("mst_desa as a")
                            ->select(
                                "d.kode_propinsi as kodeprovinsi",
                                "c.kode_kabupaten as kodekabupaten",
                                "b.kode_kecamatan as kodekecamatan",
                                "a.kode_desa as kodedesa",
                                "a.nama_desa as namadesa"
                            )
                            ->join("mst_kecamatan as b", "b.kode_kecamatan", "=", "a.kode_kecamatan")
                            ->join("mst_kabupaten as c", "c.kode_kabupaten", "=", "b.kode_kabupaten")
                            ->join("mst_provinsi as d", "d.kode_propinsi", "=", "c.kode_propinsi")
                            ->where("a.kode_desa", $this->kodedesa)
                            ->get()->first();

            $data = array(
                "id_provinsi"   => $this->desa->kodeprovinsi,
                "id_kabupaten"  => $this->desa->kodekabupaten,
                "id_kecamatan"  => $this->desa->kodekecamatan,
                "kode_instansi" => $this->desa->kodedesa,
                "nama_instansi" => $this->desa->namadesa,
                "created_at"    => date("Y-m-d H:i:s"),
                "user_entry"    => $this->iduser->id
            );

            DB::table("mst_instansi")
                ->insert($data);

            //MENDAPATKAN ID INSTANSI
            $id = DB::getPdo()->lastInsertId();

            //INSERT TABLE INSTANSI DET
            DB::table("mst_instansi_det")
                ->insert([
                    "id_instansi" => $id
                ]);

            //UPDATE TABLE MST MEMBER => ID INSTANSI
            DB::table("mst_member")
            ->where("uid", $request->session()->get("uid"))
            ->update([
            "id_instansi" => $id
            ]);
        }
        else
        {
        
            //UPDATE TABLE MST MEMBER => ID INSTANSI
            DB::table("mst_member")
                ->where("uid", $request->session()->get("uid"))
                ->update([
                "id_instansi" => $this->isDesaDaftar->first()->id_instansi
                ]);
        }

        $this->response = array(
            "status"  => true
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
            "member"   => $this->member->first(),
            "program"  => $this->program
        );

        return view("pages.profilakun")->with($data);
    }

    public function updateProfil(Request $request)
    {
        //echo "<pre>";print_r($request->file->getClientOriginalName());"</pre>";

        $this->input = $request->input();
        $name = "";

        $request->validate([
            "nama"  => "required",
            "email" => "required|email"
        ]);

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


        $this->member = DB::table("mst_member")
                          ->where("uid", $request->session()->get("uid"))
                          ->get();

        if($this->member->first()->id_instansi != NULL)
        {
            return redirect("/profil/akun")->with("status", "Data Berhasil diupdate.");
        
        }
        else
        {
            return redirect("/profil/akun")->with("status", "Data Berhasil diupdate. Silahkan gabung desa sekarang agar dapat mengikuti program desacenter.id yang telah disediakan. Klik tombol disamping untuk Gabung desa. ")
                                           ->with("button", "ada");
        }
    }

    public function updateprofildesa(Request $request)
    {
        $this->input = $request->input();
        $this->uid   = $request->session()->get("uid");

        $request->validate([
            "namakepala" => "required",
            "nowakepala" => "required",
        ]);

        $this->member = DB::table("mst_member as a")
                          ->where("a.uid", $this->uid)
                          ->get()->first();

        DB::table("mst_instansi as a")
          ->where("a.id_instansi", $this->member->id_instansi)
          ->update([
              "nama_kepala"     => $this->input['namakepala'],
              "no_wa_kepala"    => "+62".$this->input['nowakepala'],
              "nama_sekertaris" => $this->input['namasekertaris'],
              "no_wa_sekertaris"     => "+62".$this->input['nowasekertaris']
          ]);

        return redirect("/profil/desa")->with("status", "Data informasi desa berhasil diupdate.");
    }
}
