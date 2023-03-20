<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UangMasuk;
use Illuminate\Http\Request;

class UangMasukController extends Controller
{
    public function getUangMasuk(Request $request)
    {
        $uangMasuk = UangMasuk::where('users_id', $request->user()->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $uangMasuk,
        ]);
    }

    public function createUangMasuk(Request $request)
    {
        $uangMasuk = UangMasuk::create([
            'users_id' => $request->user()->id,
            'nama' => $request->nama,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $uangMasuk,
        ]);
    }

    public function updateUangMasuk(Request $request, $id)
    {
        $uangMasuk = UangMasuk::findOrFail($id);

        $uangMasuk->update([
            'nama' => $request->nama,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $uangMasuk,
        ]);
    }

    public function deleteUangMasuk($id)
    {
        $uangMasuk = UangMasuk::findOrFail($id);

        $uangMasuk->delete();

        return response()->json([
            'status' => 'success',
            'data' => $uangMasuk,
        ]);
    }
}
