<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
    }
    
    public function index()
    {
		if ($this->input->post('submit')) {
			$register = $this->doRegister();
			$this->session->set_flashdata('notif', $register['notif']);
			$this->session->set_flashdata('alert', $register['alert']);
			if (isset($_SESSION['order'])) {
				redirect('login');
			} else {
				redirect('register');
			}
		}
       $this->load->view('register');
    }

    public function doRegister()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('nm_depan', 'Nama Depan', 'trim|required');
			$this->form_validation->set_rules('nm_belakang', 'Nama Belakang', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$config['upload_path'] = './upload/KTP/';
				$config['encrypt_name'] = TRUE;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = 2000;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto_ktp')) {
					$userRegister = $this->register_model->register_user($this->upload->data());
					if ($userRegister['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $userRegister['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $userRegister['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $this->upload->display_errors();
					return $data;
				}
				
			} else {
				$data['alert'] = 'alert-danger';
				$data['notif'] = validation_errors();
				return $data;
			}
		}else{
			$this->load->view('register');
		}
    }
}

/* End of file Login.php */
