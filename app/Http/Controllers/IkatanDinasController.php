<?php

namespace App\Http\Controllers;

use App\Exports\IkatanDinasExport;
use App\Imports\IkatanDinasImport;
use App\Models\IkatanDinas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use setasign\Fpdi\Fpdi;

class IkatanDinasController extends Controller
{
    public function index()
    {
        // Yajra DataTables
        if (request()->ajax()) {
            $level = Auth::user()->level;

            if ($level == "Administrasi") {
                $data = IkatanDinas::orderBy("id", "DESC");
                return DataTables::of($data)
                    ->make(true);
            } else {
                $data = IkatanDinas::where('status', 1)
                    ->where('approve', 0)
                    ->orderBy("id", "DESC");
                return DataTables::of($data)
                    ->make(true);
            }
        }

        $user = Auth::user();
        return view("ikatan_dinas.index", compact(['user']));
    }

    public function edit($id)
    {
        $data = IkatanDinas::findOrFail($id);
        return response()->json([
            "status"  => "success",
            "message" => "List data",
            "data"    => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = IkatanDinas::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            "status"  => "success",
            "message" => "Berhasil ubah data.",
        ]);
    }

    public function destroy($id)
    {
        IkatanDinas::findOrFail($id)->delete();
        return response()->json([
            "status"  => "success",
            "message" => "Berhasil hapus data.",
        ]);
    }

    public function export()
    {
        return Excel::download(new IkatanDinasExport(), date("d-m-Y") . "ikatan_dinas.xlsx");
    }

    public function import(Request $request)
    {

        // Validasi file yang diunggah
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new IkatanDinasImport, $request->file);

        return response()->json([
            "status"  => "success",
            "message" => "Berhasil import data."
        ]);
    }

    public function reviewFile($id)
    {

        $data = IkatanDinas::findOrFail($id);
        $formatTanggalTTD = ($data->tgl_ttd) ? dateFormat($data->tgl_ttd) : "";
        $sectionHead = User::where('level', 'HC Section Head')->first();

        $imageWidth = 100; // Width of the image in the PDF (adjust as needed)

        if ($sectionHead->ttd) {
            // Gambar TTD Section Head
            $pathImgSection = public_path('assets/img/ttd/' . uniqid() . '.png');
            $image_parts = explode(";base64,", $sectionHead->ttd);
            $image_base64 = base64_decode($image_parts[1]);
            file_put_contents($pathImgSection, $image_base64);
            // Get image dimensions
            [$width, $height] = getimagesize($pathImgSection);
            $imageSectionHeight = ($imageWidth / $width) * $height; // Maintain aspect ratio
            // Gambar TTD Section Head
        }

        if ($data->ttd) {
            // Gambar TTD Peserta
            $pathImgPeserta = public_path('assets/img/ttd/' . uniqid() . '.png');
            $image_parts = explode(";base64,", $data->ttd);
            $image_base64 = base64_decode($image_parts[1]);
            file_put_contents($pathImgPeserta, $image_base64);
            // Get image dimensions
            [$width, $height] = getimagesize($pathImgPeserta);
            $imagePesertaHeight = ($imageWidth / $width) * $height; // Maintain aspect ratio
            // Gambar TTD Peserta
        }

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

                // Bagian Nomor Surat
                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(100.25, 48.22);
                $pdf->Write(8, $data->no_surat);

                // Bagian Data
                $pdf->SetFont('Arial', '', 8);
                $pdf->SetXY(63.25, 67.9);
                $pdf->Write(8, $data->nama_peserta);
                $pdf->SetXY(63.25, 70.9);
                $pdf->Write(15.8, $data->nrp_peserta);
                $pdf->SetXY(63.25, 73.9);
                $pdf->Write(23.4, $data->departemen);
                $pdf->SetXY(63.25, 76.9);
                $pdf->Write(31.4, $data->posisi);
                $pdf->SetXY(63.25, 79.9);
                $pdf->Write(38.8, $data->nama_pelatihan);
                $pdf->SetXY(63.25, 82.9);
                $pdf->Write(46.8, dateFormat($data->waktu_pelatihan));
                $pdf->SetXY(63.25, 85.9);
                $pdf->Write(54.6, thousandsNumberFormat($data->biaya_pelatihan));
                $pdf->SetXY(63.25, 88.9);
                $pdf->Write(63.2, ucwords(strtolower($data->lama_ikatan_dinas)) . " (" . dateFormat($data->tgl_selesai_ikatan_dinas) . ")");
                // Bagian Data

                // Bagian Tanggal
                $pdf->SetFont('Arial', 'B', 9);
                $pdf->SetXY(91.9, 205.6);
                $pdf->Write(8, $formatTanggalTTD);

                // Bagian Nama Section Head
                $pdf->SetFont('Arial', 'BU', 9);
                $pdf->SetXY(25.8, 244.4);
                $pdf->Write(8, ucwords(strtolower($sectionHead->nama)));

                // Bagian Section Head
                $pdf->SetFont('Arial', 'B', 9);
                $pdf->SetXY(25.8, 248.8);
                $pdf->Write(8, "HC Section Head");

                // Bagian TTD Section Head
                if (isset($pathImgSection)) {
                    if ($data->approve == 1) {
                        $pdf->Image($pathImgSection, 17.5, 220.4, $imageWidth / 2, $imageSectionHeight / 2);
                    }
                }

                // Bagian Nama Peserta
                $pdf->SetFont('Arial', 'BU', 9);
                $pdf->SetXY(136.8, 244.6);
                $pdf->Write(8, ucwords(strtolower($data->nama_peserta)));

                // Bagian Peserta
                $pdf->SetFont('Arial', 'B', 9);
                $pdf->SetXY(136.8, 249);
                $pdf->Write(8, $data->posisi);

                // Bagian TTD Peserta
                if (isset($pathImgPeserta)) {
                    if ($data->status == 1) {
                        $pdf->Image($pathImgPeserta, 127.5, 220.4, $imageWidth / 2, $imagePesertaHeight / 2);
                    }
                }
            }
        }

        // Hapus file ttd
        if (isset($pathImgSection)) {
            unlink($pathImgSection);
        }
        if (isset($pathImgPeserta)) {
            unlink($pathImgPeserta);
        }

        // Output PDF yang sudah dimodifikasi
        return response($pdf->Output('FORM PERNYATAAN IKATAN DINAS.pdf', 'S'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="FORM PERNYATAAN IKATAN DINAS.pdf"');
    }

    public function approve($id)
    {
        IkatanDinas::findOrFail($id)->update([
            "approve" => 1
        ]);

        return response()->json([
            "status"  => "success",
            "message" => "Berhasil approve.",
        ]);
    }
}
