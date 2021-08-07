<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SekolahModel;
use App\Models\JenjangModel;
use App\Models\KecamatanModel;

class SekolahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->SekolahModel = new SekolahModel();
        $this->JenjangModel = new JenjangModel();
        $this->KecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Sekolah',
            'sekolah' => $this->SekolahModel->AllData(),
        ];
        return view('admin.sekolah.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Data Sekolah',
            'jenjang' => $this->JenjangModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        return view('admin.sekolah.v_add', $data);
    }

    //untuk menambah data atau add data
    public function insert()
    {
        request()->validate(
            [
                'nama_sekolah' => 'required',
                'id_jenjang' => 'required',
                'status' => 'required',
                'id_kecamatan' => 'required',
                'alamat' => 'required',
                'posisi' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|max:1024',
            ],
            [
                'nama_sekolah.required' => 'Wajib diisi !!',
                'id_jenjang.required' => 'Wajib diisi !!',
                'status.required' => 'Wajib diisi !!',
                'id_kecamatan.required' => 'Wajib diisi !!',
                'alamat.required' => 'Wajib diisi !!',
                'posisi.required' => 'Wajib diisi !!',
                'deskripsi.required' => 'Wajib diisi !!',
                'foto.required' => 'Wajib diisi !!',
                'foto.max' => 'Foto Max 1024 KB !!',
            ]
        );
        // <!-- jika validasi tidak ada maka lakukan simpan data ke database -->
        $file = request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);
        $data = [
            'nama_sekolah' => Request()->nama_sekolah,
            'id_jenjang' => Request()->id_jenjang,
            'status' => Request()->status,
            'id_kecamatan' => Request()->id_kecamatan,
            'alamat' => Request()->alamat,
            'posisi' => Request()->posisi,
            'deskripsi' => Request()->deskripsi,
            'foto' => $filename,

        ];
        $this->SekolahModel->InsertData($data);
        return redirect()->route('sekolah')->with('pesan', 'Data Berhasil Di Tambahkan');
    }
}
