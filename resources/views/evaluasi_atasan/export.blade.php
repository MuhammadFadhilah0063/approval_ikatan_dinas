<table style="border-collapse: collapse; width: 100%;">
  <thead>
    <tr>
      <th colspan="25" style="text-align: center;">
        <h1>Evaluasi Atasan</h1>
      </th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th style="text-align: center; border: 1px solid black;">No.</th>
      <th style="text-align: center; border: 1px solid black;">Kode Evaluasi Atasan</th>
      <th style="text-align: center; border: 1px solid black;">NRP Karyawan</th>
      <th style="text-align: center; border: 1px solid black;">Nama Karyawan</th>
      <th style="text-align: center; border: 1px solid black;">Departemen</th>
      <th style="text-align: center; border: 1px solid black;">Posisi</th>
      <th style="text-align: center; border: 1px solid black;">Nama Pelatihan</th>
      <th style="text-align: center; border: 1px solid black;">Bulan Dan Tahun Pelatihan</th>
      <th style="text-align: center; border: 1px solid black;">Jenis Pelatihan</th>
      <th style="text-align: center; border: 1px solid black;">Vendor Pelatihan</th>
      <th style="text-align: center; border: 1px solid black;">NRP Atasan</th>
      <th style="text-align: center; border: 1px solid black;">Nama Atasan</th>
      <th style="text-align: center; border: 1px solid black;">Posisi Atasan</th>
      <th style="text-align: center; border: 1px solid black;">Nama Atasan HCGA</th>
      <th style="text-align: center; border: 1px solid black;">Posisi Atasan HCGA</th>
      <th style="text-align: center; border: 1px solid black;">Tanggal TTD Atasan</th>
      <th style="text-align: center; border: 1px solid black;">Tanggal Approve</th>
      <th style="text-align: center; border: 1px solid black;">Pemahaman Materi</th>
      <th style="text-align: center; border: 1px solid black;">Implementasi Materi Di Lapangan</th>
      <th style="text-align: center; border: 1px solid black;">Improvement</th>
      <th style="text-align: center; border: 1px solid black;">Kinerja</th>
      <th style="text-align: center; border: 1px solid black;">Apakah pelatihan perlu dievaluasi ulang ?</th>
      <th style="text-align: center; border: 1px solid black;">Alasan</th>
      <th style="text-align: center; border: 1px solid black;">Apakah hasil dari pelatihan ini sesuai harapan ?</th>
      <th style="text-align: center; border: 1px solid black;">Alasan</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
    <tr>
      <td style="text-align: center; border: 1px solid black;">{{ $loop->iteration }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->kode_evaluasi_atasan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nrp_karyawan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nama_karyawan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->departemen }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->posisi }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nama_pelatihan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->bulan_tahun_pelatihan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->jenis_pelatihan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->vendor_pelatihan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nrp_atasan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nama_atasan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->posisi_atasan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->nama_atasan_hcga }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->posisi_atasan_hcga }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->tgl_ttd_atasan }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->tgl_approve }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->penilaian_1 }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->penilaian_2 }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->penilaian_3 }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->penilaian_4 }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->kesimpulan_1 }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->alasan_1 }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->kesimpulan_2 }}</td>
      <td style="text-align: center; border: 1px solid black;">{{ $item->alasan_2 }}</td>
    </tr>
    @endforeach
  </tbody>
</table>