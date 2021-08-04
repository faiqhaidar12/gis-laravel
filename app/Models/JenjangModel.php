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
}
