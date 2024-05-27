<?php
// Fungsi untuk membuat kode random
function generateCode($length = 5)
{
  // Generate two random uppercase letters
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $letters = '';
  for ($i = 0; $i < 2; $i++) {
    $letters .= $characters[rand(0, strlen($characters) - 1)];
  }

  // Generate random numbers for the rest of the code
  $numbersLength = $length - 2; // Adjust length for two letters
  $numbers = '';
  for ($i = 0; $i < $numbersLength; $i++) {
    $numbers .= rand(0, 9);
  }

  // Combine letters and numbers
  $productCode = $letters . $numbers;

  return $productCode . date("ymd");
}

function hari_indo($day)
{
  $days = array(
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
  );

  return $days[$day];
}

function bulan($bulan)
{
  $nama_bulan = array(
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  return strtoupper($nama_bulan[(int)$bulan - 1]);
}

// Fungsi untuk mengonversi tanggal dari format YYYY-MM-DD menjadi format "dd MonthName YYYY"
function dateFormat($dateString)
{
  // Pisahkan tahun, bulan, dan hari
  $parts = explode("-", $dateString);
  $year = $parts[0];
  $month = $parts[1];
  $day = $parts[2];

  // Buat objek DateTime dengan tanggal yang diberikan
  $date = new DateTime($year . "-" . $month . "-" . $day);

  // Daftar nama bulan dalam bahasa Indonesia
  $monthNames = array(
    "Januari", "Februari", "Maret",
    "April", "Mei", "Juni", "Juli",
    "Agustus", "September", "Oktober",
    "November", "Desember"
  );

  // Ubah format tanggal menjadi "j MonthName Y" (j tanpa nol di awal)
  $formattedDate = $date->format("j") . " " . $monthNames[$date->format("n") - 1] . " " . $date->format("Y");

  return $formattedDate;
}

function dateFormatWithDay($day, $date)
{
  return hari_indo(date("l")) . " " . dateFormat(date("Y-m-d"));
}

// Fungsi number_format di PHP digunakan untuk memformat angka.
// Argumen pertama adalah angka yang akan diformat.
// Argumen kedua adalah jumlah desimal yang ingin ditampilkan (0 jika tidak ada desimal).
// Argumen ketiga adalah karakter pemisah desimal (dalam contoh ini, tidak ada, jadi string kosong).
// Argumen keempat adalah karakter pemisah ribuan (dalam contoh ini, titik .).
function thousandsNumberFormat($number)
{
  return number_format($number, 0, '', '.');
}

function rupiahNumberFormat($number)
{
  return "Rp. " . number_format($number, 0, '', '.');
}
