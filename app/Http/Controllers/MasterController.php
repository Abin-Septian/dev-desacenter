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
}
