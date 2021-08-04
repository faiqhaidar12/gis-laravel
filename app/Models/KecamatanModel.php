<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KecamatanModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_kecamatan')
            ->get();
    }
    //untuk menambah data kecamatan
    public function InsertData($data)
    {
        DB::table('tbl_kecamatan')
            ->insert($data);
    }
    //untuk menampilkan detaildata di form edit
    public function DetailData($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')
            ->where('id_kecamatan', $id_kecamatan)->first();
    }
    //untuk edit data
    public function UpdateData($id_kecamatan, $data)
    {
        DB::table('tbl_kecamatan')
            ->where('id_kecamatan', $id_kecamatan)
            ->update($data);
    }
    //untuk hapus atau delete data
    public function DeleteData($id_kecamatan)
    {
        DB::table('tbl_kecamatan')
            ->where('id_kecamatan', $id_kecamatan)
            ->delete();
    }
}
