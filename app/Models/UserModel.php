<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    public function AllData()
    {
        return DB::table('users')
            ->get();
    }

    //untuk menambah data jenjang
    public function InsertData($data)
    {
        DB::table('users')
            ->insert($data);
    }
    //untuk menampilkan detaildata di form edit
    public function DetailData($id)
    {
        return DB::table('users')
            ->where('id', $id)->first();
    }
    //untuk edit data
    public function UpdateData($id, $data)
    {
        DB::table('users')
            ->where('id', $id)
            ->update($data);
    }
    //untuk hapus atau delete data
    public function DeleteData($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();
    }
}
