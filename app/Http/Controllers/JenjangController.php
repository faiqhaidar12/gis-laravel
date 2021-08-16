<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenjangModel;

class JenjangController extends Controller
{
    public function __construct()
    {
        $this->JenjangModel = new JenjangModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Jenjang',
            'jenjang' => $this->JenjangModel->AllData(),
        ];
        return view('admin.jenjang.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Data Jenjang',

        ];
        return view('admin.jenjang.v_add', $data);
    }
    //untuk menambah data atau add data
    public function insert()
    {
        Request()->validate([
            'jenjang' => 'required',

        ], [
            'jenjang.required' => 'Wajib Diisi !!',
            'icon.required' => 'Wajib Diisi !!',
        ]);

        $file = request()->icon;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('icon'), $filename);

        $data = [
            'jenjang' => Request()->jenjang,
            'icon' => $filename,
        ];
        $this->JenjangModel->InsertData($data);
        return redirect()->route('jenjang')->with('success', 'Data Berhasil di Tambah!');
    }
    //untuk detail edit data
    public function edit($id_jenjang)
    {
        $data = [
            'title' => 'Edit Data Jenjang',
            'jenjang' => $this->JenjangModel->DetailData($id_jenjang),

        ];
        return view('admin.jenjang.v_edit', $data);
    }
    ///untuk merubah atau edit data
    public function update($id_jenjang)
    {
        request()->validate(
            [
                'jenjang' => 'required',
                'icon' => 'max:1024',
            ],
            [
                'jenjang.required' => 'Wajib diisi !!',
            ]
        );

        if (Request()->icon <> "") {
            //hapus icon lama
            $jenjang = $this->JenjangModel->DetailData($id_jenjang);
            if ($jenjang->icon <> "") {
                unlink(public_path('icon') . '/' . $jenjang->icon);
            }
            //jika ingin ganti icon
            $file = request()->icon;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('icon'), $filename);
            $data = [
                'jenjang' => Request()->jenjang,
                'icon' => $filename,
            ];
            $this->JenjangModel->UpdateData($id_jenjang, $data);
        } //jika tidak ganti icon
        else {
            $data = [
                'jenjang' => Request()->jenjang,
            ];
            $this->JenjangModel->UpdateData($id_jenjang, $data);
        }
        return redirect()->route('jenjang')->with('info', 'Data Berhasil Di Update');
    }

    //untuk hapus atau delete
    public function delete($id_jenjang)
    {
        $this->JenjangModel->DeleteData($id_jenjang);
        return redirect()->route('jenjang')->with('warning', 'Data Berhasil Di Delete');
    }
}
