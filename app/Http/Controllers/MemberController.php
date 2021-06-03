<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function __construct(){

        //SET VARIABLE GLOBAL MASTER DATA
        $this->program = DB::select("SELECT
            a.id as id,
            a.nama as nama,
            a.kode as kode,
            b.tanggal as tanggal,
            a.banner as banner,
            (SELECT COUNT(aa.id_member) FROM trx_pemesanan aa
            WHERE aa.id_training = a.id) as jml
            FROM mst_training a
            JOIN mst_jadwal as b ON b.id_training = a.id
            WHERE a.reff_id = '0'
            GROUP BY a.id
            ORDER BY a.id DESC
            LIMIT 5
        ");

    }

    //NANDA
    public function index(Request $request){

        
       
        return view('layoutmain.landing');
        // return view('layoutmain.main');
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
            return redirect('/dashboard');
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
                          ->select("a.uid as uid","a.email", "a.id", "a.nama", "a.telp", "a.foto")
                          ->where("a.uid", $this->uid)
                          ->get();

        $this->stepprofil = DB::table("mst_member as a")
                            ->select(
                                "a.email as email",
                                "a.id_instansi as id_instansi",
                                "b.user_entry as entry_desa",
                                "c.user_entry as entry_bumdes",
                                "b.nama_kepala as namakepala"
                            )
                            ->leftJoin("mst_instansi as b", "b.id_instansi", "=", "a.id_instansi")
                            ->leftJoin("mst_instansi_det as c", "c.id_instansi", "=", "b.id_instansi")
                            ->where("a.uid", $this->uid)
                            ->get()->first();

        $statusprofil = (@$this->stepprofil->email != "" ) ? true : false;
        $statusjoindesa = (@$this->stepprofil->id_instansi != 0 ) ? true : false;
        $statusprofildesa = (@$this->stepprofil->namakepala != "" ) ? true : false;
        $statusprofilbumdes = (@$this->stepprofil->entry_bumdes != 0 ) ? true : false;


        $this->pemesanan = DB::table("trx_pemesanan as a")
                           ->join("mst_training as b","b.id", "=", "a.id_training")
                           ->where("a.id_member", $this->member->first()->id)
                           ->get();

        $data = array(
            "member" => $this->member->first(),
            "program" => $this->program,
            "pemesanan" => $this->pemesanan,
            "step" => array(
                "profil" => array(
                    "status" => $statusprofil,
                    "link"   => "/profil/akun"
                ),
                "joindesa" => array(
                    "status" => $statusjoindesa,
                    "link"   => "/join-desa"
                ),
                "profildesa" => array(
                    "status" => $statusprofildesa,
                    "link"   => "/profil/desa"
                ),
                "profilbumdes" => array(
                    "status" => $statusprofilbumdes,
                    "link"   => "/profil/bumdes"
                )
            )
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

        $this->checkProfilBumdes = DB::table("mst_instansi_det as a")
                                   ->where("a.id_instansi", $this->member->first()->id_instansi)
                                   ->get();

        if(@$this->checkProfilBumdes->first()->nama_bumdes != "")
        {
            return redirect("profil/info-bumdes")->with("status", "Silahkan lengkapi info bumdes jika belum lengkap.");
            exit();
        }

        $data = array(
            "member" => $this->member->first(),
            "program" => $this->program,
            "isIsiBumdes" => $this->checkProfilBumdes->count(),
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
            return redirect("/profil/akun")->with("status", "Data profil akun Berhasil diupdate.");
        
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

    public function infobumdes(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->uid = $request->session()->get('uid');
        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto", "a.id_instansi")
                        ->where("a.uid", $this->uid)
                        ->get();

        $this->unitusaha = DB::table("mst_unit_usaha as a")
                           ->get();

        $this->bumdes   = DB::table("mst_instansi_det as a")
                          ->where("a.id_instansi", $this->member->first()->id_instansi)
                          ->get();

        $data = array(
            "member"    => $this->member->first(),
            "program"   => $this->program,
            "unitusaha" => $this->unitusaha,
            "bumdes"    => $this->bumdes->first()
        );


        return view("pages.infobumdes")->with($data);
    }

    public function updateProfilBumdes(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        

        $request->validate([
            "namabumdes" => "required",
            "emailbumdes"=> "required",
            "telpbumdes" => "required",
            "namadirektur" => "required",
            "emaildirektur" => "required",
            "wadirektur" => "required",
        ]);

        $this->input = $request->input();

        $this->uid = $request->session()->get("uid");

        $this->member = DB::table("mst_member as a")
                        ->where("a.uid", $this->uid)
                        ->get()->first();
        

        $this->noRegBumdes  = $this->input['kodebumdes'];
        $this->namaBumdes   = $this->input['namabumdes'];
        $this->alamatBumdes = $this->input['alamatbumdes'];
        $this->tahunBerdiri = $this->input['tahun'];
        $this->unitUsaha    = json_encode($this->input['unitusaha']);
        $this->unitLain     = (isset($this->input['unitlain'])) ? $this->input['unitlain'] : "";
        $this->emailBumdes  = $this->input['emailbumdes'];
        $this->telpBumdes   = "+62".$this->input['telpbumdes'];

        $this->namaDirektur = $this->input['namadirektur'];
        $this->emailDirektur = $this->input['emaildirektur'];
        $this->telpDirektur = "+62".$this->input['wadirektur'];

        $this->namaSekertaris = $this->input['namasekertaris'];
        $this->emailSekertaris = $this->input['emailsekertaris'];
        $this->telpSekertaris = "+62".$this->input['wasekertaris'];
        
        $this->namaBendahara = $this->input['namabendahara'];
        $this->emailBendahara = $this->input['emailbendahara'];
        $this->telpBendahara = "+62".$this->input['wabendahara'];

        $data = array(
            "kode_bumdes" => $this->noRegBumdes,
            "nama_bumdes" => $this->namaBumdes,
            "alamat_bumdes" => $this->alamatBumdes,
            "tahun_berdiri" => $this->tahunBerdiri,
            "unit_usaha" => $this->unitUsaha,
            "unit_lainnya" => $this->unitLain,
            "email_bumdes" => $this->emailBumdes,
            "telp_bumdes" => $this->telpBumdes,
            "nama_direktur" => $this->namaDirektur,
            "email_direktur" => $this->emailDirektur,
            "wa_direktur" => $this->telpDirektur,
            "nama_sekretaris" => $this->namaSekertaris,
            "email_sekretaris" => $this->emailSekertaris,
            "wa_sekretaris" => $this->telpSekertaris,
            "nama_bendahara" => $this->namaBendahara,
            "email_bendahara" => $this->emailBendahara,
            "wa_bendahara" => $this->telpBendahara,
            "user_entry" => $this->member->id,
            "created_at" => date("Y-m-d H:i:s")
        );

        DB::table("mst_instansi_det as a")
        ->where("a.id_instansi", $this->member->id_instansi)
        ->update($data);

        
        return redirect("/profil/info-bumdes")->with("status", "Data informasi bumdes telah berhasil diupdate,");
    }

    public function detailprogram(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->idprogram = $request->segment(3);

        $this->uid = $request->session()->get('uid');
        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto", "a.id_instansi")
                        ->where("a.uid", $this->uid)
                        ->get();

        $this->detail = DB::table("mst_training as a")
                        ->where("a.id", $this->idprogram)
                        ->get();

        $this->pemesanan = DB::table("trx_pemesanan as a")
                           ->where("a.id_training", $this->idprogram)
                           ->get();

        $data = array(
            "member"   => $this->member->first(),
            "program"  => $this->program,
            "detail"   => $this->detail->first(),
            "pemesanan"=> $this->pemesanan
        );

        return view("pages.detailprogram")->with($data);
    }

    public function syaratketentuan(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->idprogram = $request->segment(3);

        $this->uid = $request->session()->get('uid');
        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto", "a.id", "a.id_instansi")
                        ->where("a.uid", $this->uid)
                        ->get();

        $this->checkPemesanan = DB::table("trx_pemesanan as a")
                                ->where("a.id_member", $this->member->first()->id)
                                ->where("a.id_training", $this->idprogram)
                                ->get();

        if($this->checkPemesanan->count() == 0)
        {
            $data = array(
                "member"    => $this->member->first(),
                "program"   => $this->program,
                "idprogram" => $this->idprogram
            );

            return view("pages.syaratketentuan")->with($data);
        }
        else
        {
            return redirect("program/success/".$this->idprogram);
        }

    }

    public function invitepeserta(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->idprogram = $request->segment(3);

        $this->uid = $request->session()->get('uid');
        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto", "a.id_instansi")
                        ->where("a.uid", $this->uid)
                        ->get();

        $this->peserta = DB::table("mst_member as a")
                         ->where("a.id_instansi", $this->member->first()->id_instansi)
                         ->get();

        $data = array(
            "member"   => $this->member->first(),
            "program"  => $this->program,
            "idprogram"  => $this->idprogram,
            "peserta"  => $this->peserta
        );

        return view("pages.invite")->with($data);
    }

    public function tambahpeserta(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }
        $this->input = $request->input();

        $this->idmember = $this->input['idpeserta'];

        $this->peserta = DB::table("mst_member as a")
                         ->where("a.uid", $this->idmember)
                         ->get()->first();

        $this->response = array(
            "id" => $this->peserta->id,
            "nama" => $this->peserta->nama,
            "email" => $this->peserta->email,
            "telp" => $this->peserta->telp,
            "jabatan" => $this->peserta->jabatan
        );

        echo json_encode($this->response);
    }

    public function simpanpeserta(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->input = $request->input();

        $this->program = $this->input['idprogram'];


        //check peserta apakah sudah pernah mendaftar
        foreach($this->input['peserta'] as $peserta)
        {
            $this->checkPemesanan = DB::table("trx_pemesanan as a")
                                ->where("a.id_member", $peserta)
                                ->where("a.id_training", $this->program)
                                ->get();

            //JIKA BELUM PERNAH TERDAFTAR MAKA AKAN DISIMPAN DALAM DATABASE
            if($this->checkPemesanan->count() == 0)
            {
                $this->training = DB::table("mst_training as a")
                              ->where("a.id", $this->program)
                              ->get()->first();

                $kodeprogram = $this->training->kode;
                $scramble    = STR_PAD(rand(10,1000),4,"0",STR_PAD_LEFT);

                $kodepemesanan = $kodeprogram.$scramble;

                $kodeunik = rand(1, 999);

                DB::table("trx_pemesanan")
                ->insert([
                    "id_member"       => $peserta,
                    "id_training"     => $this->program,
                    "kode_pemesanan"  => $kodepemesanan,
                    "kode_unik"       => $kodeunik,
                    "status"          => "aktif",
                    "tanggal"         => date("Y-m-d H:i:s"),
                    "tanggal_expired" => date('Y-m-d H:i:s', strtotime("+1 day"))
                ]);
            }
        }

        $this->response = array(
            "status" => true
        );

        echo json_encode($this->response);
        
    }

    public function success(Request $request)
    {

        $this->idprogram = $request->segment(3);
        

        $this->uid = $request->session()->get('uid');
        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.id", "a.telp", "a.foto", "a.id_instansi")
                        ->where("a.uid", $this->uid)
                        ->get();

        //CHECK MEMBER JIKA MELAKUKAN BYPASS
        $this->pemesanan = DB::table("trx_pemesanan as a")
                           ->where("a.id_training", $this->idprogram)
                           ->where("a.id_member", $this->member->first()->id)
                           ->get();

        if($this->pemesanan->count() == 0)
        {
            return redirect("program/detail/".$this->idprogram)->with("status","Anda belum mendaftar program. Silahkan daftarkan diri anda sekarang.");
            exit();
        }
        

        $this->peserta = DB::table("trx_pemesanan as a")
                         ->join("mst_member as b", "a.id_member","=","b.id")
                         ->where("a.id_training", $this->idprogram)
                         ->where("b.id_instansi", $this->member->first()->id_instansi)
                         ->get();

        $data = array(
            "member"   => $this->member->first(),
            "program"  => $this->program,
            "peserta"  => $this->peserta,
            "idprogram"=> $this->idprogram
        );

        return view("pages.success")->with($data);
    }

    public function formkesediaan(Request $request)
    {
        $this->idprogram = $request->segment(3);

        $this->uid = $request->session()->get('uid');
        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto", "a.id_instansi")
                        ->where("a.uid", $this->uid)
                        ->get();

        $this->peserta = DB::table("trx_pemesanan as a")
                         ->join("mst_member as b", "a.id_member","=","b.id")
                         ->where("a.id_training", $this->idprogram)
                         ->where("b.id_instansi", $this->member->first()->id_instansi)
                         ->get();

        $data = array(
            "member"   => $this->member->first(),
            "program"  => $this->program,
            "peserta"  => $this->peserta
        );

        return view("pages.formkesediaan")->with($data);
    }

    public function ikutprogram(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->program = $request->segment(3);

        $this->member = DB::table("mst_member as a")
                        ->where("a.uid", $request->session()->get("uid"))
                        ->get();

        $this->pemesanan = DB::table("trx_pemesanan as a")
                           ->where("a.id_member", $this->member->first()->id)
                           ->where("a.id_training", $this->program)
                           ->get();

        if($this->pemesanan->count() == 0)
        {
            $this->training = DB::table("mst_training as a")
                              ->where("a.id", $this->program)
                              ->get()->first();

            $kodeprogram = $this->training->kode;
            $scramble    = STR_PAD(rand(10,1000),4,"0",STR_PAD_LEFT);

            $kodepemesanan = $kodeprogram.$scramble;

            $kodeunik = rand(1, 999);

            DB::table("trx_pemesanan")
              ->insert([
                  "id_member"       => $this->member->first()->id,
                  "id_training"     => $this->program,
                  "kode_pemesanan"  => $kodepemesanan,
                  "kode_unik"       => $kodeunik,
                  "status"          => "aktif",
                  "tanggal"         => date("Y-m-d H:i:s"),
                  "tanggal_expired" => date('Y-m-d', strtotime("+1 day"))
              ]);

            return redirect("/program/home/".$this->program)->with("status","Terima kasih anda telah mengikuti program kami. Silahkan pilih webinar atau mengisi assesment");
        }
        else
        {
            return redirect("/program/home/".$this->program)->with("status","anda sudah terdaftar di program ini. Silahkan untuk pilih webinar atau mengisi assestment.");
        }
    }

    public function homeprogram(Request $request)
    {
        if(!$request->session()->get("uid"))
        {
            return redirect("/login")->with("status", "Session akun anda habis. Silahkan lakukan login kembali.");
            exit();
        }

        $this->idprogram = $request->segment(3);

        $this->uid = $request->session()->get('uid');
        $this->member = DB::table("mst_member as a")
                        ->select("a.uid as uid","a.email", "a.nama", "a.telp", "a.foto", "a.id_instansi")
                        ->where("a.uid", $this->uid)
                        ->get();

        $this->training = DB::table("mst_training as a")
                          ->where("a.reff_id", $this->idprogram)
                          ->get();

        $data = array(
            "member"   => $this->member->first(),
            "program"  => $this->program,
            "training" => $this->training
        );

        return view("pages.homeprogram")->with($data);
    }
}
