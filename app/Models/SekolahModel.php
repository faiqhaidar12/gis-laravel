<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SekolahModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_sekolah.id_jenjang')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->get();
    }

    //untuk menambah data sekolah
    public function InsertData($data)
    {
        DB::table('tbl_sekolah')
            ->insert($data);
    }
}
