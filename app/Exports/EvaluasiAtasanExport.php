<?php

namespace App\Exports;

use App\Models\EvaluasiAtasan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EvaluasiAtasanExport implements FromView, ShouldAutoSize
{

  public function view(): View
  {
    $data = EvaluasiAtasan::orderBy("id", "DESC")->get();
    return view('evaluasi_atasan.export', compact('data'));
  }
}
