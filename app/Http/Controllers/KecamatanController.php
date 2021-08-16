<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanModel;

class KecamatanController extends Controller
{

    public function __construct()
    {
        $this->KecamatanModel = new KecamatanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Kecamatan',

            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        return view('admin.kecamatan.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Data Kecamatan',

        ];
        return view('admin.kecamatan.v_add', $data);
    }
    //untuk menambah data atau add data
    public function insert()
    {
        request()->validate(
            [
                'kecamatan' => 'required',
                'warna' => 'required',
                'geojson' => 'required',
            ],
            [
                'kecamatan.required' => 'Wajib diisi !!',
                'warna.required' => 'Wajib diisi !!',
                'geojson.required' => 'Wajib diisi !!',
            ]
        );
        // <!-- jika validasi tidak ada maka lakukan simpan data ke database -->
        $data = [
            'kecamatan' => Request()->kecamatan,
            'warna' => Request()->warna,
            'geojson' => Request()->geojson,
        ];
        $this->KecamatanModel->InsertData($data);
        return redirect()->route('kecamatan')->with('success', 'Data Berhasil Di Tambahkan');
    }
    //untuk detail edit data
    public function edit($id_kecamatan)
    {
        $data = [
            'title' => 'Edit Data Kecamatan',
            'kecamatan' => $this->KecamatanModel->DetailData($id_kecamatan),

        ];
        return view('admin.kecamatan.v_edit', $data);
    }
    //untuk merubah atau edit data
    public function update($id_kecamatan)
    {
        request()->validate(
            [
                'kecamatan' => 'required',
                'warna' => 'required',
                'geojson' => 'required',
            ],
            [
                'kecamatan.required' => 'Wajib diisi !!',
                'warna.required' => 'Wajib diisi !!',
                'geojson.required' => 'Wajib diisi !!',
            ]
        );
        // <!-- jika validasi tidak ada maka lakukan simpan data ke database -->
        $data = [
            'kecamatan' => Request()->kecamatan,
            'warna' => Request()->warna,
            'geojson' => Request()->geojson,
        ];
        $this->KecamatanModel->UpdateData($id_kecamatan, $data);
        return redirect()->route('kecamatan')->with('success', 'Data Berhasil Di Update');
    }

    //untuk hapus atau delete
    public function delete($id_kecamatan)
    {
        $this->KecamatanModel->DeleteData($id_kecamatan);
        return redirect()->route('kecamatan')->with('success', 'Data Berhasil Di Delete');
    }
}
