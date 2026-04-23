<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UjianResource;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function downloadSoal(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        // Cari ujian yang aktif berdasarkan token
        $ujian = Ujian::where('token', $request->token)
            ->where('is_active', true)
            ->with(['mapel', 'bankSoal.soals']) // Eager Loading agar cepat
            ->first();

        if (!$ujian) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Token tidak valid atau ujian tidak aktif.'
            ], 404);
        }

        // Kirim data ke Flutter lewat Resource
        return new UjianResource($ujian);
    }
}
