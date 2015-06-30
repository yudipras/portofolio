<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Model_hitung extends CI_Model
{

  public function pendidikan($nip) {
    $query = $this->db->query("SELECT level FROM pegawai_aktif__ WHERE nip ='$nip'");
    $level_pendidikan = $query->row('level');
    if ($level_pendidikan == 8) {
      $nilai_pendidikan = 100;
    }
    elseif ($level_pendidikan == 7) {
      $nilai_pendidikan = 90;
    }
    elseif ($level_pendidikan == 6) {
      $nilai_pendidikan = 80;
    }
    elseif ($level_pendidikan == 5) {
      $nilai_pendidikan = 70;
    }
    elseif ($level_pendidikan == 4) {
      $nilai_pendidikan = 60;
    }
    elseif ($level_pendidikan == 3) {
      $nilai_pendidikan = 50;
    }
    elseif ($level_pendidikan == 2) {
      $nilai_pendidikan = 40;
    }
    elseif ($level_pendidikan == 1) {
      $nilai_pendidikan = 30;
    }
    else {
      $nilai_pendidikan = 0;
    }
    return $nilai_pendidikan;
  }

  public function diklat_pim($nip) {
    $query = $this->db->query("SELECT eselon FROM pegawai_aktif__ WHERE nip ='$nip'");
    $eselon = $query->row('eselon');
    $query_r_diklat = $this->db->query("SELECT diklat FROM r_diklat WHERE nip ='$nip' AND diklat LIKE '%diklatpim%'");

    if ($eselon == "Staff") {
      $nilai_diklat_pim = 0;
    }
    else {
      if ($query_r_diklat->num_rows() > 0) {
        foreach ($query_r_diklat->result() as $row)
        {
          $diklat = $row->diklat;
          $get_diklat_ke = explode(" ",$diklat);
          $diklat_ke = $get_diklat_ke[1];
          if ($eselon > $diklat_ke) {
            $nilai_diklat_pim = 100;
          }
          elseif ($eselon == $diklat_ke) {
            $nilai_diklat_pim = 100;
          }
          elseif ($eselon < $diklat_ke) {
            $nilai_diklat_pim = 50;
          }
        }
      }
      else {
        $nilai_diklat_pim = 25;
      }
    }
    return $nilai_diklat_pim;
  }



  public function golongan($nip) {
    $query = $this->db->query("SELECT eselon,gol,level FROM pegawai_aktif__ WHERE nip ='$nip'");
    $eselon = $query->row('eselon');
    $gol = $query->row('gol');
    $level = $query->row('level');
    if ($eselon == "Staff") {
      $query_map_pend = $this->db->query("SELECT gol_awal,gol_akhir FROM map_gol_pend WHERE level =$level");
      $gol_awal = $query_map_pend->row('gol_awal');
      $gol_akhir = $query_map_pend->row('gol_akhir');
      $cnv_gol = cnv($gol);
      $cnv_gol_awal = cnv($gol_awal);
      $cnv_gol_akhir = cnv($gol_akhir);
      if ($cnv_gol > $cnv_gol_akhir) {
        $nilai_golongan = 100;
      }
      elseif ($cnv_gol >= $cnv_gol_awal and $cnv_gol <= $cnv_gol_akhir ) {
        $nilai_golongan = 100;
      }
      elseif ($cnv_gol < $cnv_gol_awal) {
        $nilai_golongan = 75;
      }
      else {
        $nilai_golongan = 0;
      }
    }
    else {
      $query_map_eselon = $this->db->query("SELECT eselon FROM map_gol_eselon WHERE gol ='$gol'");
      $map_eselon = $query_map_eselon->row('eselon');
      if ($eselon >= $map_eselon) {
        $nilai_golongan = 100;
      }
      elseif ($eselon <= $map_eselon) {
        $nilai_golongan = 75;
      }
      else {
        $nilai_golongan = 0;
      }
    }
    //return $level.'-'.$gol.'('.$cnv_gol.')'.'---'.$gol_awal.$cnv_gol_awal.'-'.$gol_akhir.$cnv_gol_akhir;
    return $nilai_golongan;
  }

  public function masa_kerja($nip) {
    $query = $this->db->query("SELECT MKSTahun, MKSBulan, PMK FROM masakerja__ WHERE nip ='$nip'");
    
    //$tgl_mulai_cpns = $query->row('tgl_mulai_CPNS');
    //$dt_mulai = new DateTime($tgl_mulai_cpns);
    //$dt_now = new DateTime(date("Y-m-d"));
    //$diff = $dt_now->diff($dt_mulai);
    
    $lama_tahun = $query->row("MKSTahun");
    $lama_bulan = $query->row("MKSBulan");
    $lama_pmk = $query->row("PMK");

    if ($lama_bulan >= 6) {
      $lama_tahun = $lama_tahun + 1;
    }
    else {
      $lama_tahun = $lama_tahun;
    }

    // Tambah PMK
    $lama_tahun = $lama_tahun + $lama_pmk;



    if ($lama_tahun > 30) {
      $nilai_masa_kerja = 100;
    }
    elseif ($lama_tahun >= 26 and $lama_tahun <= 30) {
      $nilai_masa_kerja = 86;
    }
    elseif ($lama_tahun >= 21 and $lama_tahun <= 25) {
      $nilai_masa_kerja = 70;
    }
    elseif ($lama_tahun >= 16 and $lama_tahun <= 20) {
      $nilai_masa_kerja = 53;
    }
    elseif ($lama_tahun >= 11 and $lama_tahun <= 15) {
      $nilai_masa_kerja = 37;
    }
    elseif ($lama_tahun >= 6 and $lama_tahun <= 10) {
      $nilai_masa_kerja = 20;
    }
    elseif ($lama_tahun <= 5) {
      $nilai_masa_kerja = 17;
    }
    else {
      $nilai_masa_kerja = 0;
    }
    return $nilai_masa_kerja;
  }


}
