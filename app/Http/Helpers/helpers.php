<?php

// format uang


function format_uang($angka)
{
  return number_format($angka, 0, ',', '.');
}

// angka terbilang
function terbilang($angka)
{
  $angka = abs($angka);
  $baca = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
  $terbilang = '';

  if ($angka < 12) {
    $terbilang = '' . $baca[$angka];
  } elseif( $angka < 20) {
    $terbilang = terbilang($angka - 20) . ' belas';
  }

}

function tanggalIndonesia($tanggal){
  // Array hari dan bulan
  $hari = array ( 1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
  $bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
  
  // Memecah tanggal untuk mendapatkan hari, bulan, dan tahun
  $split = explode('-', $tanggal);
  
  // Mengubah string menjadi integer untuk mendapatkan nama hari dan nama bulan
  $numHari = date('N', strtotime($tanggal));
  $numBulan = (int) $split[1];
  
  // Menggabungkan hasil format tanggal
  return $hari[$numHari] . ', ' . $split[2] . ' ' . $bulan[$numBulan] . ' ' . $split[0];
}
