<?php

namespace App\Http\Controllers;

use App\Models\EvaluasiAtasan;
use App\Models\IkatanDinas;
use App\Models\User;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class PenilaianController extends Controller
{
    public function index()
    {
        return view('penilaian.index');
    }

    public function store(Request $request)
    {
        $data = EvaluasiAtasan::where("kode_evaluasi_atasan", $request->kode_evaluasi_atasan)->first();

        $penilaian_1 = intval($request->penilaian_1);
        $penilaian_2 = intval($request->penilaian_2);
        $penilaian_3 = intval($request->penilaian_3);
        $penilaian_4 = intval($request->penilaian_4);
        $total       = $penilaian_1 + $penilaian_2 + $penilaian_3 + $penilaian_4;
        $rata_rata   = round($total / 4, 0);

        $data->update([
            "status_penilaian"  => "Sudah",
            "ttd_atasan"        => $request->ttd,
            "tgl_ttd_atasan"    => date("Y-m-d"),
            "penilaian_1"       => $penilaian_1,
            "penilaian_2"       => $penilaian_2,
            "penilaian_3"       => $penilaian_3,
            "penilaian_4"       => $penilaian_4,
            "total"             => $total,
            "rata_rata"         => $rata_rata,
            "kesimpulan_1"      => $request->kesimpulan_1,
            "alasan_1"          => $request->alasan_1,
            "kesimpulan_2"      => $request->kesimpulan_2,
            "alasan_2"          => $request->alasan_2,
        ]);

        return response()->json([
            "status" => "success",
            "message" => "Form penilaian sudah selesai.",
        ]);
    }

    public function getData(Request $request)
    {

        $data = EvaluasiAtasan::where("kode_evaluasi_atasan", $request->kode_evaluasi_atasan)->first();

        if ($data) {
            if ($data->status_penilaian == "Belum") {
                // Jika belum dinilai
                return response()->json([
                    "status" => "success",
                    "message" => "Data Evaluasi Hasil Pelatihan Ditemukan.",
                    "kode_evaluasi_atasan" => $data->kode_evaluasi_atasan,
                    "data" => $data,
                ]);
            } else {
                // Jika sudah dinilai
                return response()->json([
                    "status"  => "failed",
                    "message" => "Maaf, Form Evaluasi Hasil Pelatihan Sudah Dilakukan Penilaian!"
                ]);
            }
        } else {
            // Jika kode tidak cocok
            return response()->json([
                "status" => "failed",
                "message" => "Data Evaluasi Hasil Pelatihan Tidak Ditemukan!"
            ]);
        }
    }

    public function pageFinished(Request $request)
    {
        $kode = $request->kode;
        if ($kode) {

            $kode_decode = base64_decode($kode);
            $data = EvaluasiAtasan::where("kode_evaluasi_atasan", $kode_decode)->first();

            if ($data) {
                return view("penilaian.page_finished", compact("kode"));
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }


    public function reviewFile(Request $request)
    {

        $kode = base64_decode($request->kode);
        $data = EvaluasiAtasan::where("kode_evaluasi_atasan", $kode)->first();
        $sectionHead = User::where('level', 'HC Section Head')->first();
        $pathImgAtasan  = "";
        $pathImgSection = "";

        if (!$data) {
            abort(404);
        }

        // TTD HCGA
        if ($sectionHead->ttd) {
            $pathImgSection = public_path('assets/img/ttd/' . uniqid() . '.png');
            $image_parts = explode(";base64,", $sectionHead->ttd);
            $image_base64 = base64_decode($image_parts[1]);
            file_put_contents($pathImgSection, $image_base64);
            [$width, $height] = getimagesize($pathImgSection);
            $imageSectionHeight = (100 / $width) * $height;
        }

        // TTD Atasan
        if ($data->ttd_atasan) {
            $pathImgAtasan = public_path('assets/img/ttd/' . uniqid() . '.png');
            $image_parts = explode(";base64,", $data->ttd_atasan);
            $image_base64 = base64_decode($image_parts[1]);
            file_put_contents($pathImgAtasan, $image_base64);
            [$width, $height] = getimagesize($pathImgAtasan);
            $imageAtasanHeight = (200 / $width) * $height;
        }

        $tgl_ttd_atasan = ($data->tgl_ttd_atasan) ? dateFormat($data->tgl_ttd_atasan) : "";
        $tgl_approve    = ($data->tgl_approve) ? dateFormat($data->tgl_approve) : "";

        // Path ke file PDF
        $pathToFile = public_path('assets/pdf/evaluasi.pdf');

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

                // Bagian Data Identitas //
                // Bagian Kiri
                $maxLength = 34.5;
                $lineHeight = 3.5;
                $pdf->SetFont('Arial', '', 6.5);
                $pdf->SetXY(51.25, 47.8);
                $pdf->Write(0, $data->nrp_karyawan);
                write2LineText($pdf, $data->nama_karyawan, 51.25, 54.6, 56.3, $maxLength, $lineHeight);
                $pdf->SetXY(51.25, 47.8);
                $pdf->Write(33.3, $data->departemen);
                write2LineText($pdf, $data->posisi, 51.25, 71.2, 73.2, $maxLength, $lineHeight);
                // Bagian Kiri

                // Bagian Kanan
                $maxLength = 42;
                $lineHeight = 3.5;
                write2LineText($pdf, $data->nama_pelatihan, 138.6, 46.1, 47.8, $maxLength, $lineHeight);
                $pdf->SetXY(138.6, 47.8);
                $pdf->Write(16.7, $data->bulan_tahun_pelatihan);
                write2LineText($pdf, $data->jenis_pelatihan, 138.6, 62.8, 64.8, $maxLength, $lineHeight);
                write2LineText($pdf, $data->vendor_pelatihan, 138.6, 71.2, 73.2, $maxLength, $lineHeight);
                // Bagian Kanan
                // Bagian Data Identitas //


                // Bagian Penilaian
                // Bagian Penilaian 1
                $initialX = 189.4;
                $initialY = 109.0;
                $text     = $data->penilaian_1;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Penilaian 1

                // Bagian Penilaian 2
                $initialX = 189.4;
                $initialY = 114.0;
                $text     = $data->penilaian_2;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Penilaian 2

                // Bagian Penilaian 3
                $initialX = 189.4;
                $initialY = 119.0;
                $text     = $data->penilaian_3;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Penilaian 3

                // Bagian Penilaian 4
                $initialX = 189.4;
                $initialY = 124.0;
                $text     = $data->penilaian_4;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Penilaian 4


                // Bagian Total
                $initialX = 189.4;
                $initialY = 160.2;
                $text     = $data->total;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Total

                // Bagian Rata-rata
                $initialX = 189.4;
                $initialY = 165.2;
                $text     = $data->rata_rata;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Rata-rata
                // Bagian Penilaian


                // Bagian Kesimpulan //
                // Bagian Kanan
                $pdf->SetXY(11.6, 187.2);
                $pdf->Write(0, $data->alasan_1);
                $pdf->SetXY(11.6, 200.5);
                $pdf->Write(0, $data->alasan_2);
                // Bagian Kanan

                // Bagian Kiri
                $initialX = 189.4;
                $initialY = 178.8;
                $text     = $data->kesimpulan_1;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);

                $initialX = 189.4;
                $initialY = 192.0;
                $text     = $data->kesimpulan_2;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Kiri
                // Bagian Kesimpulan //


                // Bagian Pengesahan
                // Bagian Jabatan
                $initialX = 29.6;
                $initialY = 247.2;
                $text     = $data->posisi_atasan;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Jabatan

                // Bagian Nama
                $initialX = 75.1;
                $initialY = 247.2;
                $text     = $data->nama_atasan;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Nama

                // Bagian Tanggal
                $initialX = 138.8;
                $initialY = 247.2;
                $text     = $tgl_ttd_atasan;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Tanggal

                // Bagian TTD Atasan
                if ($pathImgAtasan != "") {
                    $initialX = 190.7;
                    $initialY = 241.8;
                    $width    = 100 / 5.25;
                    $height   = $imageAtasanHeight / 5.25;
                    $pdf->Image($pathImgAtasan, $initialX - ($width / 2), $initialY, $width, $height);
                }
                // Bagian TTD Atasan


                // Bagian Jabatan
                $initialX = 29.9;
                $initialY = 264.3;
                $text     = $data->posisi_atasan_hcga;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Jabatan

                // Bagian Nama
                $initialX = 75.1;
                $initialY = 264.3;
                $text     = $data->nama_atasan_hcga;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);

                // Bagian Tanggal
                $initialX = 138.8;
                $initialY = 264.3;
                $text     = $tgl_approve;
                $textWidth = $pdf->GetStringWidth($text);
                $pdf->SetXY($initialX - ($textWidth / 2), $initialY);
                $pdf->Write(0, $text);
                // Bagian Tanggal

                // Bagian TTD HCGA
                if ($data->status_approve == "Sudah") {
                    if ($pathImgSection != "") {
                        $initialX = 190.8;
                        $initialY = 259.4;
                        $width    = 100 / 5.21;
                        $height   = $imageSectionHeight / 5.21;
                        $pdf->Image($pathImgSection, $initialX - ($width / 2), $initialY, $width, $height);
                    }
                }
                // Bagian TTD HCGA
                // Bagian Pengesahan
            }
        }

        // Hapus file ttd
        if ($pathImgSection != "") {
            unlink($pathImgSection);
        }
        if ($pathImgAtasan != "") {
            unlink($pathImgAtasan);
        }

        // Output PDF yang sudah dimodifikasi
        return response($pdf->Output('EVALUASI ATASAN.pdf', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="EVALUASI ATASAN.pdf"');
    }
}