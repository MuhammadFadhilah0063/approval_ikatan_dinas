<?php

namespace App\Imports;

use App\Models\IkatanDinas;
use Maatwebsite\Excel\Concerns\ToModel;

class IkatanDinasImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return new IkatanDinas([
            'kode_ikatan_dinas'        => strtoupper($row[1]),
            'nrp_peserta'              => $row[2],
            'nama_peserta'             => ucwords($row[3]),
            'departemen'               => ucwords($row[4]),
            'posisi'                   => ucwords($row[5]),
            'nama_pelatihan'           => ucwords($row[6]),
            'waktu_pelatihan'          => $row[7],
            'biaya_pelatihan'          => $row[8],
            'lama_ikatan_dinas'        => $row[9],
            'tgl_selesai_ikatan_dinas' => $row[10],
            'no_surat'                 => $row[11],
        ]);
    }
}
