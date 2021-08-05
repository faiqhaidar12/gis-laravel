<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SekolahModel;

class SekolahController extends Controller
{
    public function __construct()
    {
        $this->SekolahModel = new SekolahModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Sekolah',
            'sekolah' => $this->SekolahModel->AllData(),
        ];
        return view('admin.sekolah.v_index', $data);
    }
}
