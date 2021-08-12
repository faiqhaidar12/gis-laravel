<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;


class WebController extends Controller
{

    public function __construct()
    {
        $this->WebModel = new WebModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pemetaan',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'sekolah' => $this->WebModel->AllDataSekolah(),
            'jenjang' => $this->WebModel->DataJenjang(),

        ];
        return view('v_web', $data);
    }

    public function kecamatan($id_kecamatan)
    {
        $kec = $this->WebModel->Detailkecamatan($id_kecamatan);
        $data = [
            'title' => 'Kecamatan ' . $kec->kecamatan,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'sekolah' => $this->WebModel->DataSekolah($id_kecamatan),
            'jenjang' => $this->WebModel->DataJenjang(),
            'kec' => $kec,
        ];
        return view('v_kecamatan', $data);
    }
}
