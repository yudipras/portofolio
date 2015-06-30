<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Model_pegawai extends CI_Model
{
  public function pegawai($offset,$limit,$que)
  {
    $query = $this->db->query("SELECT * FROM pegawai_aktif__ ".$que." ORDER BY tgl_mulai_PNS ASC LIMIT $offset, $limit ");
    return $query->result();
  }

  public function total_pegawai($que)
  {
    $query = $this->db->query("SELECT * FROM  pegawai_aktif__ ".$que." " );
    return $query->num_rows();
  }

  public function detail_pegawai($nip)
  {
    $query = $this->db->query("SELECT a.*, b.tempat_lahir, b.alamat, b.rt, b.rw, b.kel, b.kec, b.kotamadya, b.propinsi FROM pegawai_aktif__ a INNER JOIN pegawai b ON a.NIP=b.NIP WHERE a.nip ='$nip'");
    return $query->row();
  }

  public function nama_pegawai($nip)
  {
    $query = $this->db->query("SELECT nama FROM pegawai_aktif__ WHERE nip ='$nip'");
    return $query->row();
  }

  public function foto_pegawai($nip)
  {
    // $query = $this->db->query("SELECT foto FROM foto_bank WHERE nip ='$nip' and imagecode='000' ");
    $query=mysqli_query("SELECT * FROM foto_bank WHERE NIP='$nip' AND imagecode='000'");
        $no=0;
        while($row = mysqli_fetch_assoc($query))
        {

            $imagedata[$no] = $row['foto'];
            $no++;
        }
        header("content-type: image/jpg");
        echo $imagedata[0];
  }

  public function fotopeg($nip)
  {
    $query = $this->db->query("SELECT thumbnail FROM foto_bank WHERE NIP='$nip' AND imagecode='000'");
    if($query->num_rows() > 0)
    {
      $row = $query->row_array();
      $conv = base64_encode($row['thumbnail']);
      $foto = "data:image/jpeg;base64,".$conv;
    }
    else
    {
      $foto = base_url()."asset/img/ava2.jpg";
    }

    return $foto;
    //header("Content-type: image/jpeg");
  }

  public function r_jabatan($nip)
  {
    $query = $this->db->query("SELECT a.*, b.jabatan, c.nama_seksi, d.nama_subdir, e.nama_dir
                              FROM r_jabatan a
                              LEFT JOIN jabatan b ON a.kode_jab=b.kode_jab
                              LEFT JOIN seksi c ON a.kode_seksi = c.kode_seksi
                              LEFT JOIN subdirektorat d ON a.kode_subdir = d.kode_subdir
                              LEFT JOIN direktorat e ON a.kode_dir = e.kode_dir WHERE a.nip ='$nip' ORDER BY a.tmt DESC");
    return $query->result();
  }

  public function r_golongan($nip)
  {
    $query = $this->db->query("SELECT a.*, b.pangkat FROM r_golongan a
                               LEFT JOIN pangkat b ON a.gol = b.gol WHERE nip ='$nip' ORDER BY gol DESC");
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
                              "WHERE nip ='$nip' ORDER BY r_pendidikan.kode_pend DESC");
    return $query->result();
  }

  public function r_diklat($nip)
  {
    $query = $this->db->query("SELECT * FROM r_diklat WHERE nip ='$nip'");
    return $query->result();
  }

  public function r_kursus($nip)
  {
    $query = $this->db->query("SELECT * FROM r_kursus WHERE nip ='$nip'");
    return $query->result();
  }

  public function r_tanda_jasa($nip)
  {
    $query = $this->db->query("SELECT * FROM r_tanda_jasa WHERE nip ='$nip'");
    return $query->result();
  }

  public function u2($u2)
  {
    $query = $this->db->query("SELECT * FROM direktorat WHERE kode_dir ='$u2'");
    return $query->result();
  }

  public function u3($u3)
  {
    $query = $this->db->query("SELECT * FROM subdirektorat WHERE kode_subdir ='$u3'");
    return $query->result();
  }


  public function dikpim($offset,$limit,$que)
    {
        $query = $this->db->query("SELECT * FROM ".
                                 "(SELECT a.idx, a.nip as NIP, b.nama, MIN"."(a.diklat)"." as diklat_terbaru, a.tahun_diklat,
                                  b.UnitKerja2, b.UnitKerja3, b.UnitKerja4 
                                  from r_diklat a
                                 INNER JOIN pegawai_aktif__ b ON a.nip = b.nip
                                 WHERE a.diklat LIKE \"%diklatpim%\"
                                 GROUP BY NIP)"."as sortir
                                 WHERE sortir.diklat_terbaru LIKE \"%".$que."%\" LIMIT $offset, $limit ");
        return $query->result();


    }

    public function total_dikpim($que)
    {
        $query = $this->db->query("SELECT * FROM ".
                                 "(SELECT a.idx, a.nip, b.nama, MIN"."(a.diklat)"." as diklat_terbaru, a.tahun_diklat from r_diklat a
                                 INNER JOIN pegawai_aktif__ b ON a.nip = b.nip
                                 WHERE a.diklat LIKE \"%diklatpim%\"
                                 GROUP BY NIP)"."as sortir
                                 WHERE sortir.diklat_terbaru LIKE \"%".$que."%\" ");
        return $query->num_rows();

    }

    public function masa_kerja($nip) {
        $query = $this->db->query("SELECT MKSTahun, MKSBulan, PMK FROM masakerja__ WHERE nip ='$nip'");
        $lama_tahun = $query->row("MKSTahun");
        $lama_bulan = $query->row("MKSBulan");
        $lama_pmk = $query->row("PMK");
        
        if ($lama_bulan >= 6) {
          $lama_tahun = $lama_tahun + 1;
        }
        else {
          $lama_tahun = $lama_tahun;
        }

        $tahun = $lama_tahun + $lama_pmk;
        return $tahun." Tahun";
    }


}
