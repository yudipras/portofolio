<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');
class Logout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
		$this->load->library(array('form_validation','session'));
		$this->load->database(); //berlanjut ke bawah ini ….
		//lanjutan yang diatas
		$this->load->helper('url');
	}

	public function index()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	
}