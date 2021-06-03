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

        $strWhere = [];

        $kodedesa = $this->input['kodedesa'];
        $namadesa = $this->input['namadesa'];

        if($kodedesa != "")
        {
            $where = " a.kode_desa LIKE '".$this->input['kodedesa']."%'";

            array_push($strWhere, $where);
        }

        if($namadesa != "")
        {
            $where = " a.nama_desa LIKE '%".$this->input['namadesa']."%'";

            array_push($strWhere, $where);
        }

        $SubWhere = implode(" AND ", $strWhere);

        $this->result = DB::select("SELECT 
        a.kode_desa as kode,
        a.nama_desa as nama,
        a.id_desa as id,
        b.nama_kecamatan as kecamatan,
        c.nama_kabupaten as kabupaten,
        d.nama_propinsi as provinsi,
        (SELECT COUNT(bb.id) FROM mst_instansi as aa 
        JOIN mst_member as bb ON bb.id_instansi = aa.id_instansi
        WHERE aa.kode_instansi = a.kode_desa) as jml
        FROM mst_desa as a
        JOIN mst_kecamatan as b ON b.kode_kecamatan = a.kode_kecamatan
        JOIN mst_kabupaten as c ON c.kode_kabupaten = b.kode_kabupaten
        JOIN mst_provinsi as d ON d.kode_propinsi = c.kode_propinsi
        WHERE $SubWhere");

        // $this->result = DB::table('mst_desa as a')
        //                    ->select('a.kode_desa as kode',
        //                             'a.nama_desa as nama', 
        //                             'a.id_desa as id',
        //                             'b.nama_kecamatan as kecamatan',
        //                             'c.nama_kabupaten as kabupaten',
        //                             'd.nama_propinsi as provinsi',
        //                             "(SELECT COUNT(aa.id_member) FROM mst_instansi as aa WHERE aa.kode_instansi LIKE '".$this->input['kodedesa']."%') as jml")
        //                    ->join('mst_kecamatan as b', 'b.kode_kecamatan', '=', 'a.kode_kecamatan')
        //                    ->join('mst_kabupaten as c', 'c.kode_kabupaten', '=', 'b.kode_kabupaten')
        //                    ->join('mst_provinsi as d', 'd.kode_propinsi', '=', 'c.kode_propinsi')
        //                    ->when($this->input['kodedesa'] != "", function($query, $kodedesa){
        //                         return $query->where('a.kode_desa', 'LIKE', $this->input['kodedesa'].'%');
        //                    })
        //                    ->when($this->input['namadesa'] != "", function($query, $namadesa){
        //                         return $query->where('a.nama_desa', 'LIKE', '%'.$this->input['namadesa'].'%');
        //                    })
        //                    ->get();

        if(count($this->result) == 0)
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
                "data"   => $this->result
            );
        }
        echo json_encode($this->response);
    }


    public function kodebumdes(Request $request)
    {
        $this->input = $request->input();

        $this->noRegBumdes = $this->input['kodebumdes'];

        $this->checkBumdes = DB::table("mst_bumdes as a")
                             ->where("a.kode_bumdes", $this->noRegBumdes)
                             ->get();
        
        if($this->checkBumdes->count() > 0)
        {
            $this->bumdes = $this->checkBumdes->first();

            $this->result = array(
                "idbumdes" => $this->bumdes->id_bumdes,
                "kodebumdes" => $this->bumdes->kode_bumdes,
                "namabumdes" => $this->bumdes->nama_bumdes
            );

            $this->response = array(
                "status" => true,
                "data"   => $this->result
            );

        }
        else
        {
            $this->response = array(
                "status" => false,
                "data"   => array()
            );
        }

        echo json_encode($this->response);
    }
}
