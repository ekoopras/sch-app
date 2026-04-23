<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UjianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'ujian_id'     => $this->id,
            'nama_mapel'   => $this->mapel->mapel,
            'token'        => $this->token,
            'durasi_menit' => $this->durasi_menit,
            'daftar_soal'  => $this->bankSoal->soals->map(function ($soal) {
                return [
                    'id'         => $soal->id,
                    'pertanyaan' => $soal->soal,
                    'tipe'       => $soal->tipe_soal,
                    // Pastikan URL gambar lengkap (absolut) untuk di-download Flutter
                    'url_gambar' => $soal->gambar ? asset('storage/' . $soal->gambar) : null,
                    // Menggabungkan pilihan jawaban sesuai tipe soal
                    'pilihan'    => match ($soal->tipe_soal) {
                        'choice'          => $soal->choice,
                        'multiple_choice' => $soal->multiple_choice,
                        'matching'        => $soal->matching,
                        default           => [],
                    },
                ];
            }),
        ];
    }
}
