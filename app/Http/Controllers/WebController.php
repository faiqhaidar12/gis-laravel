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

    public function jenjang($id_jenjang)
    {
        $jen = $this->WebModel->Detailjenjang($id_jenjang);
        $data = [
            'title' => 'jenjang ' . $jen->jenjang,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'sekolah' => $this->WebModel->DataSekolahJenjang($id_jenjang),
            'jenjang' => $this->WebModel->DataJenjang(),
        ];
        return view('v_jenjang', $data);
    }

    public function detailsekolah($id_sekolah)
    {
        $sekolah = $this->WebModel->DetailDataSekolah($id_sekolah);
        $data = [
            'title' => 'Detail ' . $sekolah->nama_sekolah,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'jenjang' => $this->WebModel->DataJenjang(),
            'sekolah' => $sekolah,
        ];
        return view('v_detailsekolah', $data);
    }
}
