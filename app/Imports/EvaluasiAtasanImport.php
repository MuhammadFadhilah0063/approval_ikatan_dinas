<?php

namespace App\Imports;

use App\Models\EvaluasiAtasan;
use Maatwebsite\Excel\Concerns\ToModel;

class EvaluasiAtasanImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return new EvaluasiAtasan([
            'kode_evaluasi_atasan'     => strtoupper($row[1]),
            'nrp_karyawan'             => $row[2],
            'nama_karyawan'            => ucwords($row[3]),
            'departemen'               => ucwords($row[4]),
            'posisi'                   => ucwords($row[5]),
            'nama_pelatihan'           => ucwords($row[6]),
            'bulan_tahun_pelatihan'    => ucwords($row[7]),
            'jenis_pelatihan'          => ucwords($row[8]),
            'vendor_pelatihan'         => ucwords($row[9]),
            'nrp_atasan'               => $row[10],
            'nama_atasan'              => ucwords($row[11]),
            'posisi_atasan'            => ucwords($row[12]),
            'nama_atasan_hcga'         => ucwords($row[13]),
            'posisi_atasan_hcga'       => ucwords($row[14]),
        ]);
    }
}
