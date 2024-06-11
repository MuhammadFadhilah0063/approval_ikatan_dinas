<?php

namespace App\Http\Controllers;

use App\Exports\EvaluasiAtasanExport;
use App\Imports\EvaluasiAtasanImport;
use App\Models\EvaluasiAtasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use setasign\Fpdi\Fpdi;

class EvaluasiAtasanController extends Controller
{
    public function index()
    {
        // Yajra DataTables
        if (request()->ajax()) {
            $level = Auth::user()->level;

            if ($level == "Administrasi") {
                $data = EvaluasiAtasan::orderBy("id", "DESC");
                return DataTables::of($data)
                    ->make(true);
            } else {
                $data = EvaluasiAtasan::where('status_penilaian', "Sudah")
                    ->where('status_approve', "Belum")
                    ->orderBy("id", "DESC");
                return DataTables::of($data)
                    ->make(true);
            }
        }

        $user = Auth::user();
        return view("evaluasi_atasan.index", compact(['user']));
    }

    public function edit($id)
    {
        $data = EvaluasiAtasan::findOrFail($id);
        return response()->json([
            "status"  => "success",
            "message" => "List data",
            "data"    => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = EvaluasiAtasan::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            "status"  => "success",
            "message" => "Berhasil ubah data.",
        ]);
    }

    public function destroy($id)
    {
        EvaluasiAtasan::findOrFail($id)->delete();
        return response()->json([
            "status"  => "success",
            "message" => "Berhasil hapus data.",
        ]);
    }

    public function export()
    {
        return Excel::download(new EvaluasiAtasanExport(), date("d-m-Y") . "evaluasi_atasan.xlsx");
    }

    public function import(Request $request)
    {

        // Validasi file yang diunggah
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new EvaluasiAtasanImport, $request->file);

        return response()->json([
            "status"  => "success",
            "message" => "Berhasil import data."
        ]);
    }

    public function reviewFile($id)
    {

        $data = EvaluasiAtasan::findOrFail($id);
        $sectionHead = User::where('level', 'HC Section Head')->first();
        $pathImgAtasan  = "";
        $pathImgSection = "";

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
                    $initialX = 190.1;
                    $initialY = 241.8;
                    $width    = 120 / 5.25;
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
                        $initialX = 190.1;
                        $initialY = 259.4;
                        $width    = 120 / 5.21;
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


    public function approve($id)
    {
        EvaluasiAtasan::findOrFail($id)->update([
            "status_approve" => "Sudah",
            "tgl_approve" => date("Y-m-d"),
        ]);

        return response()->json([
            "status"  => "success",
            "message" => "Berhasil approve.",
        ]);
    }
}