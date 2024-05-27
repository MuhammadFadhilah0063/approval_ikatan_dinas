<table style="border-collapse: collapse; width: 100%;">
  <thead>
    <tr>
      <th colspan="14" style="text-align: center;">
        <h1>IKATAN DINAS</h1>
      </th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th style="text-align: center; border: 1px solid black;">No.</th>
      <th style="text-align: center; border: 1px solid black;">Kode Ikatan Dinas</th>
      <th style="text-align: center; border: 1px solid black;">NRP Peserta</th>
      <th style="text-align: center; border: 1px solid black;">Nama Peserta</th>
      <th style="text-align: center; border: 1px solid black;">Departemen</th>
      <th style="text-align: center; border: 1px solid black;">Posisi</th>
      <th style="text-align: center; border: 1px solid black;">Nama Pelatihan</th>
      <th style="text-align: center; border: 1px solid black;">Waktu Pelatihan</th>
      <th style="text-align: center; border: 1px solid black;">Biaya Pelatihan</th>
      <th style="text-align: center; border: 1px solid black;">Lama Ikatan Dinas</th>
      <th style="text-align: center; border: 1px solid black;">Tanggal Selesai Ikatan Dinas</th>
      <th style="text-align: center; border: 1px solid black;">Status</th>
      <th style="text-align: center; border: 1px solid black;">Nomor Surat</th>
      <th style="text-align: center; border: 1px solid black;">Tanggal Ditandatangani</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
    <tr>
      <td style="text-align: center; border: 1px solid black;">{{ $loop->iteration }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->kode_ikatan_dinas }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nrp_peserta }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nama_peserta }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->departemen }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->posisi }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nama_pelatihan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->waktu_pelatihan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->biaya_pelatihan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->lama_ikatan_dinas }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->tgl_selesai_ikatan_dinas }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->status }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->no_surat }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->tgl_ttd }}</td>
    </tr>
    @endforeach
  </tbody>
</table>