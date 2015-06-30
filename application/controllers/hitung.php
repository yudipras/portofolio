<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hitung extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_hitung');
		$this->load->database();
	}

	public function index()
	{
    echo"hallo";
	}

  public function show($nip) {
		$pendidikan = $this->model_hitung->pendidikan($nip);
		echo " Nilai pendidikan = ".$pendidikan."\n";

		$diklat_pim = $this->model_hitung->diklat_pim($nip);
		echo " Nilai diklat pim = ".$diklat_pim."\n";

		$golongan = $this->model_hitung->golongan($nip);
		echo " Nilai golongan = ".$golongan."\n";

		$masa_kerja = $this->model_hitung->masa_kerja($nip);
		echo " Nilai masa kerja = ".$masa_kerja."\n\n";

  }

	public function toplist($eselon,$limit) {
		$array_all = array();
		$query = $this->db->query("SELECT NIP FROM pegawai_aktif__ WHERE eselon = '$eselon'");
		foreach ($query->result() as $row) {
			$nip = $row->NIP;
			$pendidikan = $this->model_hitung->pendidikan($nip);
			$diklat_pim = $this->model_hitung->diklat_pim($nip);
			$golongan = $this->model_hitung->golongan($nip);
			$masa_kerja = $this->model_hitung->masa_kerja($nip);
			$nilai_total = $pendidikan + $diklat_pim + $golongan + $masa_kerja;
			$array_all[$nip] = $nilai_total;
			//echo $nip.'('.$nilai_total.')'."\n";
		}
		arsort($array_all);
		//$result_arr = array_slice($array_all, 0, 3);
		// for ($i=0; $i < $limit ; $i++) {
		// 	echo $array_all[i];
		// }
		$i = 1;
		foreach ($array_all as $key => $val) {
    	echo "$key = $val\n";
			if ($i >= $limit) {
				break;
			}
			$i++;
		}
		// print_r($result_arr);
	}


}
