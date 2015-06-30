<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');
class Login extends CI_Controller
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
		// $session = $this->session->userdata('isLogin');
		// if($session == TRUE)
		// {
		// 	//redirect('login/view_login');
		// 	redirect('#');
		// 	//$this->load->base_url();
		// }
		// else
		// {
			$this->load->view('login');
		// }
	}

	public function auth()
	{
		// $username = $this->input->post('username');
		// $guest = $this->model_user->pengguna($username);
		// print_r($guest);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		if($this->form_validation->run()==FALSE)
		{
			redirect(base_url());
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cekpengguna = $this->model_user->hitungpengguna($username,$password);

			if($cekpengguna > 0)
			{
				$this->session->set_userdata('isLogin', TRUE);
				$this->session->set_userdata('username',$username);

				$guest = $this->model_user->pengguna($username);

				foreach ($guest as $dp)
                {
                    $userid = $dp->userid;
                    $level = $dp->level;

										if(!empty($dp->kode_dir)){
											$u2 = $dp->kode_dir;
											$this->session->set_userdata('u2', $u2);
										}

										if (!empty($dp->kode_subdir)) {
											$u3 = $dp->kode_subdir;
											$this->session->set_userdata('u3', $u3);
										}

                    $this->session->set_userdata('userid', $userid);
                    $this->session->set_userdata('level', $level);
                    


                }
				redirect('beranda');
			}
			else
			{
				echo"
					<script>
					alert('Gagal Login: Cek username dan password anda!');
					history.go(-1);
					</script>";
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
