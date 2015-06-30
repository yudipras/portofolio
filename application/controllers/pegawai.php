<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_pegawai');
    $this->load->model('model_hitung');
    $this->load->library('pagination');
    $this->load->database();
  }

  public function index()
  {
    $u2 = $this->session->userdata('u2');
    $u3 = $this->session->userdata('u3');

    $uk2 = $this->model_pegawai->u2($u2);
    $uk3 = $this->model_pegawai->u3($u3);

    $data["uu2"] = "";
    $data["uu3"] = "";

    foreach ($uk2 as $x) {
      $data["uu2"] = $x->nama_dir;
      // print_r($uu2);
    }

    foreach ($uk3 as $x) {
      $data["uu3"] = $x->nama_subdir;
    }

    $que = "WHERE UnitKerja2 LIKE \"%".$data["uu2"]."%\" AND UnitKerja3 LIKE \"%".$data["uu3"]."%\" ";

    $u2 = $this->session->set_userdata('uu2',$data["uu2"]);
    $u3 = $this->session->set_userdata('uu3',$data["uu3"]);

    // print_r($que);

    $total_row = $this->model_pegawai->total_pegawai($que);

    $config["base_url"] = base_url() . "pegawai/index";
		$config["total_rows"] = $total_row;
		$config["per_page"] = 40;
		$config["use_page_numbers"] = TRUE;
		$config["num_links"] = $total_row;
    $config["index_limit"] = 10;

    $limit = $config["per_page"];
    if($this->uri->segment(3)){
		    $offset = (($this->uri->segment(3)) - 1) * $limit ;
		}
		else{
		    $offset = 0;
		}

    $this->pagination->initialize($config);
    $data["pagination"] = $this->pagination->create_links();

    $data["pegawai"] = $this->model_pegawai->pegawai($offset,$limit,$que);
    //echo $pagination;

    $data["offset"] = $offset;
    $data["total_row"] = $total_row;
    // print_r($data);
    $this->load->view("pegawai",$data);
  }

  public function show($nip)
  {
    $nilai_pegawai = array();
    $nilai_pegawai["pendidikan"] = $this->model_hitung->pendidikan(base64_decode($nip));
    $nilai_pegawai["diklat_pim"] = $this->model_hitung->diklat_pim(base64_decode($nip));
		$nilai_pegawai["golongan"] = $this->model_hitung->golongan(base64_decode($nip));
		$nilai_pegawai["masa_kerja"] = $this->model_hitung->masa_kerja(base64_decode($nip));
		$nilai_pegawai["total"] = $nilai_pegawai["pendidikan"] + $nilai_pegawai["diklat_pim"] + $nilai_pegawai["golongan"] + $nilai_pegawai["masa_kerja"];

    $data["nilai_pegawai"] = $nilai_pegawai;


    $data["foto"] = $this->model_pegawai->fotopeg(base64_decode($nip));
    $data["detail_pegawai"] = $this->model_pegawai->detail_pegawai(base64_decode($nip));
    $data["r_jabatan"] = $this->model_pegawai->r_jabatan(base64_decode($nip));
    $data["r_golongan"] = $this->model_pegawai->r_golongan(base64_decode($nip));
    $data["r_pendidikan"] = $this->model_pegawai->r_pendidikan(base64_decode($nip));
    $data["r_diklat"] = $this->model_pegawai->r_diklat(base64_decode($nip));
    $data["r_kursus"] = $this->model_pegawai->r_kursus(base64_decode($nip));
    $data["r_tanda_jasa"] = $this->model_pegawai->r_tanda_jasa(base64_decode($nip));

    // print_r($data);

    //echo $nip;
    $this->load->view("pegawaidetail.php",$data);
  }

  public function showimage($nip)
  {
    $data["foto"] = $this->model_pegawai->foto_pegawai($nip);
  }

  public function search()
  {
    // $tok = $this->input->post("srctoken");

    if ($this->input->post('srctoken')=='')
    {
      $token=$this->session->userdata('ses_qry');
    }
    else
    {
      $token=$this->input->post("srctoken");

      $this->session->set_userdata('ses_qry',$token);
    }



    // $offset =0;
    // $limit = 20;

    $que = "WHERE nama LIKE \"%".$token."%\" OR NIP LIKE \"%".$token."%\" OR UnitKerja4 LIKE \"%".$token."%\" OR UnitKerja3 LIKE \"%".$token."%\" OR UnitKerja2 LIKE \"%".$token."%\" ";

    $total_row = $this->model_pegawai->total_pegawai($que);

    $config["base_url"] = base_url() . "pegawai/search";
    $config["total_rows"] = $total_row;
    $config["per_page"] = 40;
    $config["use_page_numbers"] = TRUE;
    $config["num_links"] = $total_row;
    $config["index_limit"] = 10;

    $limit = $config["per_page"];
    if($this->uri->segment(4)){
        $offset = (($this->uri->segment(4)) - 1) * $limit ;
    }
    else{
        $offset = 0;
    }

    $this->pagination->initialize($config);
    $data["pagination"] = $this->pagination->create_links();
    $data["pegawai"] = $this->model_pegawai->pegawai($offset,$limit,$que);

    $data["offset"] = $offset;
    $data["total_row"] = $total_row;
    // print_r($data["pegawai"]);

    $this->load->view("pegawai",$data);
  }


  public function dikpim($no)
  {
    $que = "diklatpim ".$no."";

    

    $total_row = $this->model_pegawai->total_dikpim($que);

    $config["base_url"] = base_url() . "pegawai/dikpim/".$no."";
    $config["uri_segment"] = 4;
    $config["total_rows"] = $total_row;
    $config["per_page"] = 20;
    $config["use_page_numbers"] = TRUE;
    $config["num_links"] = $total_row;
    $config["index_limit"] = 10;

    $limit = $config["per_page"];

    if($this->uri->segment(4)){
        $offset = (($this->uri->segment(4)) - 1) * $limit ;
    }
    else{
        $offset = 0;
    }

    $this->pagination->initialize($config);
    $data["pagination"] = $this->pagination->create_links();

    $data["pegawai"] = $this->model_pegawai->dikpim($offset,$limit,$que);
    //echo $pagination;

    $data["offset"] = $offset;
    $data["total_row"] = $total_row;
    $data["dikpim"] = "Diklat Pimpinan ".$no."";
    // print_r($offset);
    $this->load->view("pegawai",$data);
  }

}
