<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->UserModel->AllData(),
        ];
        return view('admin.user.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add User',
        ];
        return view('admin.user.v_add', $data);
    }

    //untuk menambah data atau add data
    public function insert()
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'foto' => 'required|max:1024',
            'password' => 'required|min:8',

        ], [
            'name.required' => 'Wajib Diisi !!',
            'email.required' => 'Wajib Diisi !!',
            'email.unique' => 'Email Ini Sudah Terdaftar !!',
            'foto.required' => 'Wajib Diisi !!',
            'password.required' => 'Wajib Diisi !!',
            'password.min' => 'Password Minimal 8 Karakter !!',
        ]);

        $file = request()->foto;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('foto'), $filename);

        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'password' => Hash::make(request()->password),
            'foto' => $filename,
        ];
        $this->UserModel->InsertData($data);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Di Simpan!!');
    }

    //untuk detail edit data
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'user' => $this->UserModel->DetailData($id),

        ];
        return view('admin.user.v_edit', $data);
    }

    ///untuk merubah atau edit data
    public function update($id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',

        ], [
            'name.required' => 'Wajib Diisi !!',
            'email.required' => 'Wajib Diisi !!',
            'email.unique' => 'Email Ini Sudah Terdaftar !!',
            'password.required' => 'Wajib Diisi !!',
            'password.min' => 'Password Minimal 8 Karakter !!',
        ]);

        if (Request()->foto <> "") {
            //hapus foto lama
            $user = $this->UserModel->DetailData($id);
            if ($user->foto <> "") {
                unlink(public_path('foto') . '/' . $user->foto);
            }
            //jika ingin ganti foto
            $file = request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $data = [
                'name' => Request()->name,
                'foto' => $filename,
            ];
            $this->UserModel->UpdateData($id, $data);
        } //jika tidak ganti icon
        else {
            $data = [
                'name' => Request()->name,
            ];
            $this->UserModel->UpdateData($id, $data);
        }
        return redirect()->route('user')->with('pesan', 'Data Berhasil Di Update');
    }

    //untuk hapus atau delete
    public function delete($id)
    {
        $this->UserModel->DeleteData($id);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Di Delete');
    }
}
