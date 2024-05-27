<?php

namespace App\Http\Controllers;

use App\Exports\AdministrasiExport;
use App\Models\Administrasi;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

class AdministrasiController extends Controller
{
    public function index()
    {
        // Yajra DataTables
        if (request()->ajax()) {
            $data = Administrasi::orderBy("id", "DESC");
            return DataTables::of($data)
                ->make(true);
        }

        return view("administrasi.index");
    }

    public function formInput()
    {
        return view("administrasi.form_input");
    }

    public function formStore(Request $request)
    {

        try {

            $administrasi = Administrasi::create([
                "nrp"          => $request->nrp,
                "nama"         => strtoupper($request->nama),
                "departemen"   => strtoupper($request->departemen),
                "jabatan"      => strtoupper($request->jabatan),
                "perusahaan"   => strtoupper($request->perusahaan),
                "status_arsip" => "belum",
            ]);

            if ($request->ttd) {
                // Set lokal ke Bahasa Indonesia
                Date::setLocale('id');
                $current_date = Carbon::now()->isoFormat('DD MMMM YYYY');

                $administrasi->update([
                    "tgl" => $current_date,
                    "ttd" => $request->ttd,
                ]);
            }

            return redirect('/page-finished');
        } catch (QueryException $e) {
            session()->flash('gagal', $e->getMessage());
            return redirect('/');
        }
    }

    public function pageFinished()
    {
        return view("administrasi.page_finished");
    }

    public function edit(Administrasi $administrasi)
    {
        return response()->json([
            "status" => "success",
            "data"   => $administrasi,
        ]);
    }

    public function update(Administrasi $administrasi, Request $request)
    {

        try {

            $administrasi->update([
                "nrp"          => $request->nrp,
                "nama"         => strtoupper($request->nama),
                "departemen"   => strtoupper($request->departemen),
                "jabatan"      => strtoupper($request->jabatan),
                "perusahaan"   => strtoupper($request->perusahaan),
                "status_arsip" => "belum",
            ]);

            if ($request->ttd) {
                // Set lokal ke Bahasa Indonesia
                Date::setLocale('id');
                $current_date = Carbon::now()->isoFormat('DD MMMM YYYY');

                $administrasi->update([
                    "tgl" => $current_date,
                    "ttd" => $request->ttd,
                ]);
            }

            return response()->json([
                "status" => "success",
                "data"   => $administrasi,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "status"  => "failed",
                "message" => $e->getMessage(),
            ]);
        }
    }

    public function destroy(Administrasi $administrasi)
    {
        try {

            $administrasi->delete();

            return response()->json([
                "status" => "success",
                "data" => $administrasi,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "status"  => "failed",
                "message" => $e->getMessage()
            ]);
        }
    }

    public function changeStatusArsip(Request $request)
    {
        try {

            $data = Administrasi::findOrFail($request->id);
            $status = ($data->status_arsip == "belum") ? "selesai" : "belum";
            $data->update([
                "status_arsip" => $status
            ]);

            return response()->json([
                "status"  => "success",
                "message" => "Berhasil ubah status arsip"
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "status"  => "failed",
                "message" => $e->getMessage()
            ]);
        }
    }
    public function rewiewFile($id)
    {

        $data = Administrasi::findOrFail($id);

        // Title
        if ($data->perusahaan == "PT. PPA") {
            $title = "PT. PUTRA PERKASA ABADI (PPA)";
        } else if ($data->perusahaan == "PT. AMM") {
            $title = "PT. ANTAREJA MAHADA MAKMUR (AMM)";
        }

        // TTD
        if ($data->ttd) {
            $ttd = (explode(",", $data->ttd))[1];
            $tgl = $data->tgl;
        } else {
            $ttd = false;
            $tgl = false;
        }

        /// Bikin file pdf ///

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ])->setPaper(array(0, 0, 609.449, 935.433), 'portrait');

        // Load HTML view
        $html = view("pdf.tanda_terima", compact(['title', 'data', 'ttd', 'tgl']))->render();

        // Load external CSS (Bootstrap)
        $cssFile = 'assets/css/bootstrap.min.css';
        $css     = file_get_contents($cssFile);
        $html    = "<style>$css</style>\n$html";

        // Load external JavaScript (Bootstrap)
        $jsFile = 'assets/js/core/bootstrap.min.js';
        $js     = file_get_contents($jsFile);
        $html   = "<script>$js</script>\n$html";

        $pdf->loadHtml($html);
        $pdf->render();

        return $pdf->stream("TANDA TERIMA " . $data->perusahaan . ".pdf");
    }

    public function export()
    {
        return Excel::download(new AdministrasiExport(), date("d-m-Y") . "-administrasi.xlsx");
    }
}
