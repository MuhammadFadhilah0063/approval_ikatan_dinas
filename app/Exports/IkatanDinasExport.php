<?php

namespace App\Exports;

use App\Models\IkatanDinas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IkatanDinasExport implements FromView, ShouldAutoSize
{

  public function view(): View
  {
    $data = IkatanDinas::orderBy("id", "ASC")->get();
    return view('ikatan_dinas.export', compact('data'));
  }
}
