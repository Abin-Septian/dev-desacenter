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

        $this->result = DB::table('mst_desa as a')
                           ->select('a.kode_desa as kode',
                                    'a.nama_desa as nama', 
                                    'a.id_desa as id',
                                    'b.nama_kecamatan as kecamatan',
                                    'c.nama_kabupaten as kabupaten',
                                    'd.nama_propinsi as provinsi')
                           ->join('mst_kecamatan as b', 'b.kode_kecamatan', '=', 'a.kode_kecamatan')
                           ->join('mst_kabupaten as c', 'c.kode_kabupaten', '=', 'b.kode_kabupaten')
                           ->join('mst_provinsi as d', 'd.kode_propinsi', '=', 'c.kode_propinsi')
                           ->where('kode_desa', $this->input['kodedesa'])
                           ->get();

        $this->jmlMember = DB::table('mst_instansi as a')
                              ->join('mst_member as b', 'b.id_instansi', '=', 'a.id_instansi')
                              ->where('a.kode_instansi', $this->input['kodedesa'])
                              ->get();

        if($this->result->count() == 0)
        {
            
            $this->response = array(
                "status"    => false,
                "data"      => array()
            );
        }
        else
        {
            $this->response = array(
                "status" => true,
                "data"   => $this->result,
                "jmlMember" => $this->jmlMember->count()
            );
        }
        echo json_encode($this->response);
    }
}
