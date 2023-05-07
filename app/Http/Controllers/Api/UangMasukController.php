<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\UangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UangMasukController extends Controller
{
    public function storeUangMasuk(Request $request)
    {
        $request->validate([
            'nama_masuk' => 'required',
            'deskripsi' => 'required',
            'harga_masuk' => 'required',
            'tanggal_masuk' => 'required',
        ]);


        $uangMasuk = UangMasuk::create([
            'users_id' => Auth::user()->id,
            'nama_masuk' => $request->nama_masuk,
            'deskripsi' => $request->deskripsi,
            'harga_masuk' => $request->harga_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return ResponseFormatter::success([
            'message' => 'Data Successfully Added',
            'data' => $uangMasuk
        ], 'Data Successfully Added', 200);
    }
}
