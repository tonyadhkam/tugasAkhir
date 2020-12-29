<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('user_model');
    }
    
    public function index()
    {
       $this->load->view('login');
    }

    public function doLogin()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$loginAdmin = $this->admin_model->cek_admin();
				$loginSuperAdmin = $this->admin_model->cek_superAdmin();
				$loginUser = $this->user_model->cek_user();
				if ($loginSuperAdmin['status'] === TRUE || $loginAdmin['status'] === TRUE) {
					redirect('admin');
				} else if ($loginUser['status'] === TRUE) {
					// if (isset($_SESSION['order'])) {
						// $kategori = $_SESSION['order'];
						// redirect("homepage/paket_wisata/$kategori");
					// } else {
						redirect('homepage');
					// }
				} else if ($loginUser['status'] === 'blokir') {
					$data['notif'] = $loginUser['notif'];
					$data['alert'] = 'alert-danger';
					$this->load->view('login', $data);
				} else{
					$data['notif'] = $loginUser['notif'];
					$data['alert'] = 'alert-danger';
					$this->load->view('login', $data);
				}
			} else {
				$data['notif'] = validation_errors();
				$data['alert'] = 'alert-danger';
				$this->load->view('login', $data);
			}
		}else{
			$this->load->view('login');
		}
    }
}

/* End of file Login.php */
