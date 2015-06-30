<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Model_komparasi extends CI_Model
{
  public function get_autocomp($q) {
    $query = $this->db->query("SELECT NIP,nama FROM pegawai_aktif__ WHERE nip LIKE '%$q%' OR nama LIKE '%$q%'");
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row["NIP"]));
        $new_row['value']=htmlentities(stripslashes($row["NIP"]));
        $new_row['nama']=htmlentities(stripslashes($row['nama']));
        $new_row['image']=htmlentities(stripslashes("avatar.png"));
        $row_set[] = $new_row;
      }
      return $row_set;
    }
  }

  // added new
  public function r_jabatan($nip)
  {
    $query = $this->db->query("SELECT * FROM r_jabatan WHERE nip ='$nip' ORDER BY tmt DESC");
    return $query->result();
  }

  public function r_golongan($nip)
  {
    $query = $this->db->query("SELECT * FROM r_golongan WHERE nip ='$nip' ORDER BY tmt DESC");
    return $query->result();
  }

  public function r_pendidikan($nip)
  {
    $query = $this->db->query("SELECT pendidikan.nama_pend, ".
                              "bidang_studi.nama_studi, r_pendidikan.tahun_lulus ".
                              "FROM simpegdb.r_pendidikan ".
                              "INNER JOIN simpegdb.pendidikan ".
                              "ON r_pendidikan.kode_pend = pendidikan.kode_pend ".
                              "LEFT JOIN simpegdb.bidang_studi ".
                              "ON r_pendidikan.kode_studi = bidang_studi.kode_studi ".
                              "WHERE nip ='$nip' ORDER BY tahun_lulus DESC");
    return $query->result();
  }

  public function r_diklat($nip)
  {
    $query = $this->db->query("SELECT * FROM r_diklat WHERE nip ='$nip' ORDER BY tahun_diklat DESC");
    return $query->result();
  }

  public function r_kursus($nip)
  {
    $query = $this->db->query("SELECT * FROM r_kursus WHERE nip ='$nip' ORDER BY thn_kursus DESC");
    return $query->result();
  }

  public function r_tanda_jasa($nip)
  {
    $query = $this->db->query("SELECT * FROM r_tanda_jasa WHERE nip ='$nip' ORDER BY tahun_perolehan DESC");
    return $query->result();
  }

  public function unit_kerja($u2,$u3,$u4)
  {
    if (isset($u2)) {
      $queryu2 = $this->db->query("SELECT nama_dir FROM direktorat WHERE kode_dir ='$u2'");
      $unit_kerja2 = $queryu2->row('nama_dir');
    }
    else {
      $unit_kerja2 = "";
    }

    if (isset($u3)) {
      $queryu3 = $this->db->query("SELECT nama_subdir FROM subdirektorat WHERE kode_subdir ='$u3'");
      $unit_kerja3 = $queryu3->row('nama_subdir');
    }
    else {
      $unit_kerja3 = "";
    }

    if (isset($u4)) {
      $queryu4 = $this->db->query("SELECT nama_seksi FROM seksi WHERE kode_seksi ='$u4'");
      $unit_kerja4 = $queryu4->row('nama_seksi');
    }
    else {
      $unit_kerja4 = "";
    }
    return $unit_kerja4." ".$unit_kerja3." ".$unit_kerja2;
  }

  public function jabatan($id)
  {
    $query = $this->db->query("SELECT jabatan FROM jabatan WHERE kode_jab ='$id'");
    $jabatan = $query->row("jabatan");
    return $jabatan;
  }

}
