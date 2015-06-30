<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');
class Model_beranda extends CI_Model
{
    public function pim1()
    {
        $query = $this->db->query("SELECT * FROM ".
                                 "(SELECT a.idx, a.nip, b.nama, MIN"."(a.diklat)"." as diklat_terbaru, a.tahun_diklat from r_diklat a
                                 INNER JOIN pegawai_aktif__ b ON a.nip = b.nip
                                 WHERE a.diklat LIKE \"%diklatpim%\"
                                 GROUP BY NIP)"."as sortir
                                 WHERE sortir.diklat_terbaru LIKE \"%diklatpim 1%\" ");
        return $query->num_rows();

    }

    public function pim2()
    {
        $query = $this->db->query("SELECT * FROM ".
                                 "(SELECT a.idx, a.nip, b.nama, MIN"."(a.diklat)"." as diklat_terbaru, a.tahun_diklat from r_diklat a
                                 INNER JOIN pegawai_aktif__ b ON a.nip = b.nip
                                 WHERE a.diklat LIKE \"%diklatpim%\"
                                 GROUP BY NIP)"."as sortir
                                 WHERE sortir.diklat_terbaru LIKE \"%diklatpim 2%\" ");
        return $query->num_rows();

    }

    public function pim3()
    {
        $query = $this->db->query("SELECT * FROM ".
                                 "(SELECT a.idx, a.nip, b.nama, MIN"."(a.diklat)"." as diklat_terbaru, a.tahun_diklat from r_diklat a
                                 INNER JOIN pegawai_aktif__ b ON a.nip = b.nip
                                 WHERE a.diklat LIKE \"%diklatpim%\"
                                 GROUP BY NIP)"."as sortir
                                 WHERE sortir.diklat_terbaru LIKE \"%diklatpim 3%\" ");
        return $query->num_rows();

    }

    public function pim4()
    {
        $query = $this->db->query("SELECT * FROM ".
                                 "(SELECT a.idx, a.nip, b.nama, MIN"."(a.diklat)"." as diklat_terbaru, a.tahun_diklat from r_diklat a
                                 INNER JOIN pegawai_aktif__ b ON a.nip = b.nip
                                 WHERE a.diklat LIKE \"%diklatpim%\"
                                 GROUP BY NIP)"."as sortir
                                 WHERE sortir.diklat_terbaru LIKE \"%diklatpim 4%\" ");
        return $query->num_rows();

    }

}
