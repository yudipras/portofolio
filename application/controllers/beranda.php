<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_pegawai');
    $this->load->model('model_hitung');
    $this->load->model('model_beranda');
    $this->load->database();
  }

  public function index()
  {
    // $data = array();
    $data['pim1'] = $this->model_beranda->pim1();
    $data['pim2'] = $this->model_beranda->pim2();
    $data['pim3'] = $this->model_beranda->pim3();
    $data['pim4'] = $this->model_beranda->pim4();
    // print_r($data);

    $this->load->view("beranda",$data);
  }

  public function get_toplist()
  {
    $eselon = $this->input->get('eselon');
    $limit  = $this->input->get('limit');
    $persen = $this->input->get('persen');
    $array_all = array();
    if ($eselon == 0) {
      $query = $this->db->query("SELECT NIP,nama FROM pegawai_aktif__");
    }else{
      $query = $this->db->query("SELECT NIP,nama FROM pegawai_aktif__ WHERE eselon = '$eselon'");
    }
		
		foreach ($query->result() as $row) {
			$nip = $row->NIP;
      $nama = $row->nama;
			$pendidikan = $this->model_hitung->pendidikan($nip);
			$diklat_pim = $this->model_hitung->diklat_pim($nip);
			$golongan = $this->model_hitung->golongan($nip);
			$masa_kerja = $this->model_hitung->masa_kerja($nip);
			$nilai_total = $pendidikan + $diklat_pim + $golongan + $masa_kerja;
			// $array_all[0] = $nip;
      // $array_all[1] = $nama;
      $array_all[$nip] = $nilai_total;
		}
		arsort($array_all);



		$i = 1;
    $table = "";
    $table .= "<table class=\"table table-striped table-responsive\" width=\"100%\"><tr><td><b>NIP</b></td><td><b>Nama</b></td><td><b>Skor</b></td></tr>";
		foreach ($array_all as $key => $val) {
    	$nama_pegawai = $this->model_pegawai->nama_pegawai($key);
      $str = $key;
      $encoded = urlencode(base64_encode($str));

      if ($persen == 0) {
        $xpersen = npersen($val,30);
      }else{
        $xpersen = $val;
      }

      $table .= "<tr style=\"cursor:pointer\" onclick=\"window.location = '".base_url()."pegawai/show/".$encoded."'\">";
      $table .= "<td>".$key."</td><td>".$nama_pegawai->nama."</td><td>".$xpersen."</td></tr>";
			if ($i >= $limit) {
				break;
			}
			$i++;
		}
    $table .= "</table>";

    echo $table;
  }
}
