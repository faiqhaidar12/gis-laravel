<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JenjangModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_jenjang')
            ->get();
    }

    //untuk menambah data jenjang
    public function InsertData($data)
    {
        DB::table('tbl_jenjang')
            ->insert($data);
    }
    //untuk menampilkan detaildata di form edit
    public function DetailData($id_jenjang)
    {
        return DB::table('tbl_jenjang')
            ->where('id_jenjang', $id_jenjang)->first();
    }
    //untuk edit data
    public function UpdateData($id_jenjang, $data)
    {
        DB::table('tbl_jenjang')
            ->where('id_jenjang', $id_jenjang)
            ->update($data);
    }
    //untuk hapus atau delete data
    public function DeleteData($id_jenjang)
    {
        DB::table('tbl_jenjang')
            ->where('id_jenjang', $id_jenjang)
            ->delete();
    }
}
