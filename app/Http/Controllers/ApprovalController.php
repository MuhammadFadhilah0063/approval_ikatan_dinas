<?php

namespace App\Http\Controllers;

use App\Models\IkatanDinas;
use App\Models\User;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class ApprovalController extends Controller
{
    public function index()
    {
        return view('approval.index');
    }

    public function store(Request $request)
    {
        $data = IkatanDinas::where("kode_ikatan_dinas", $request->kode_ikatan_dinas)->first();

        $data->update([
            "status"  => 1,
            "ttd"     => $request->ttd,
            "tgl_ttd" => date("Y-m-d"),
        ]);

        return response()->json([
            "status" => "success",
            "message" => "Form persetujuan berhasil disetujui.",
        ]);
    }

    public function getIkatanDinas(Request $request)
    {

        $data = IkatanDinas::where("kode_ikatan_dinas", $request->kode_ikatan_dinas)->first();

        if ($data) {
            if ($data->status == 0) {
                // Jika belum ttd
                return response()->json([
                    "status" => "success",
                    "message" => "Data ikatan dinas ditemukan.",
                    "kode_ikatan_dinas" => $data->kode_ikatan_dinas
                ]);
            } else {
                // Jika sudah ttd
                return response()->json([
                    "status"  => "failed",
                    "message" => "Maaf, form ikatan dinas sudah dilakukan penandatanganan!"
                ]);
            }
        } else {
            // Jika kode tidak cocok
            return response()->json([
                "status" => "failed",
                "message" => "Data ikatan dinas tidak ditemukan!"
            ]);
        }
    }

    public function reviewFile($kode)
    {

        $data = IkatanDinas::where("kode_ikatan_dinas", $kode)->first();
        $sectionHead = User::where('level', 'HC Section Head')->first();

        // Path ke file PDF
        $pathToFile = public_path('assets/pdf/form.pdf');

        // Inisialisasi FPDI
        $pdf = new Fpdi();

        // Tambahkan halaman dari PDF yang ada
        $pageCount = $pdf->setSourceFile($pathToFile);
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $templateId = $pdf->importPage($pageNo);
            $size = $pdf->getTemplateSize($templateId);

            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($templateId);

            // Tambahkan teks pada halaman pertama sebagai contoh
            if ($pageNo == 1) {

                // Bagian Data
                $pdf->SetFont('Arial', '', 9);
                $pdf->SetXY(63.25, 67.9);
                $pdf->Write(8, ucwords(strtolower($data->nama_peserta)));
                $pdf->SetXY(63.25, 70.9);
                $pdf->Write(15.8, $data->nrp_peserta);
                $pdf->SetXY(63.25, 73.9);
                $pdf->Write(23.4, ucwords(strtolower($data->departemen)));
                $pdf->SetXY(63.25, 76.9);
                $pdf->Write(31.4, ucwords(strtolower($data->posisi)));
                $pdf->SetXY(63.25, 79.9);
                $pdf->Write(38.8, ucwords(strtolower($data->nama_pelatihan)));
                $pdf->SetXY(63.25, 82.9);
                $pdf->Write(46.8, dateFormat($data->waktu_pelatihan));
                $pdf->SetXY(63.25, 85.9);
                $pdf->Write(54.6, thousandsNumberFormat($data->biaya_pelatihan));
                $pdf->SetXY(63.25, 88.9);
                $pdf->Write(63.2, ucwords(strtolower($data->lama_ikatan_dinas)) . " (" . dateFormat($data->tgl_selesai_ikatan_dinas) . ")");
                // Bagian Data

                // Bagian Nama Section Head
                $pdf->SetFont('Arial', 'BU', 9);
                $pdf->SetXY(25.8, 244.4);
                $pdf->Write(8, ucwords(strtolower($sectionHead->nama)));

                // Bagian Section Head
                $pdf->SetFont('Arial', 'B', 9);
                $pdf->SetXY(25.8, 248.8);
                $pdf->Write(8, "HC Section Head");

                // Bagian Nama Peserta
                $pdf->SetFont('Arial', 'BU', 9);
                $pdf->SetXY(136.8, 244.6);
                $pdf->Write(8, ucwords(strtolower($data->nama_peserta)));

                // Bagian Peserta
                $pdf->SetFont('Arial', 'B', 9);
                $pdf->SetXY(136.8, 249);
                $pdf->Write(8, $data->posisi);
            }
        }

        // Output PDF yang sudah dimodifikasi
        return response($pdf->Output('FORM PERNYATAAN IKATAN DINAS.pdf', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="FORM PERNYATAAN IKATAN DINAS.pdf"');
    }

    public function pageFinished()
    {
        return view("approval.page_finished");
    }
}
