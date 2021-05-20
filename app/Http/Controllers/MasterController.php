<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    

    public function kabupaten(Request $request)
    {

        $this->input = $request->input();

        $this->kode = $this->input['kode'];

        $this->kabupaten = DB::table('mst_kabupaten')
                             ->where('kode_propinsi', $this->kode)
                             ->get();

        if($this->kabupaten->count() == 0)
        {
            $this->response = array(
                "status" => false,
                "data" => array()
            );
        }
        else
        {
            $this->response = array(
                "status" => true,
                "data" => $this->kabupaten
            );
        }

        echo json_encode($this->response);

    }


    public function kecamatan(Request $request)
    {

        $this->input = $request->input();

        $this->kode = $this->input['kode'];

        $this->kecamatan = DB::table('mst_kecamatan')
                             ->where('kode_kabupaten', $this->kode)
                             ->get();

        if($this->kecamatan->count() == 0)
        {
            $this->response = array(
                "status" => false,
                "data" => array()
            );
        }
        else
        {
            $this->response = array(
                "status" => true,
                "data" => $this->kecamatan
            );
        }

        echo json_encode($this->response);

    }

    public function desa(Request $request)
    {
        $this->input = $request->input();

        $this->provinsi = $this->input['provinsi'];
        $this->kabupaten = $this->input['kabupaten'];
        $this->kecamatan = $this->input['kecamatan'];

        $this->result = DB::table('mst_desa as a')
                           ->select('a.kode_desa as kode','a.nama_desa as nama', 'a.id_desa as id')
                           ->where('kode_kecamatan', $this->kecamatan)
                           ->get();

        if($this->result->count() == 0)
        {
            $this->response = array(
                "status" => false,
                "data"   => array()
            );
        }
        else
        {
            $this->response = array(
                "status" => true,
                "data"   => $this->result
            );
        }
        echo json_encode($this->response);
    }
}
