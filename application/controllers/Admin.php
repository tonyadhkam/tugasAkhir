<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->model('kantor_cabang_model');
		$this->load->model('titik_jemput_model');
		$this->load->model('daftar_paket_model');
		$this->load->model('bus_model');
		$this->load->model('hotel_model');
		$this->load->model('objek_wisata_model');
		$this->load->model('paket_model');
		$this->load->model('request_paket_model');
		$this->load->model('info_wisata_model');
		$this->load->model('data_pemesan_model');
		$this->load->model('Transaction_model');
		$this->load->library('Mailer');
	}
    public function index()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
                $data['tampilan']= 'admin/dashboard';
				$data['page']= 'dashboard';
				$this->load->view('admin/template_view', $data);
			}else if($role =="manager") {
				$data['tampilan']= 'admin/dashboard-manager';
				$data['page']= 'dashboard-manager';
				$data['totalUser'] = $this->user_model->getTotalUser();
				$data['totalTransaksiMenungguPembayaran'] = $this->Transaction_model->getTransactionMenungguPembayaran();
				$data['totalTransaksiSelesai'] = $this->Transaction_model->getTransactionSelesai();
				$data['totalTransaksiDalamProses'] = $this->Transaction_model->getTransactionDalamProses();
				$data['paketLaris'] = $this->paket_model->getPaketLaris();
				$data['paketTidakLaris'] = $this->paket_model->getPaketTidakLaris();
				$data['dataChart'] = $this->Transaction_model->dataChart();
				// var_dump("test", $data['test']);
				$this->load->view('admin/template_view', $data);
            } else {
                $data['tampilan'] = 'index_view';
			    $this->load->view('template_view', $data);
            }	
		} else {
			redirect('login');
		}
	}

	public function data_pengguna()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin" || $role == 'manager') {
				$data = [
					'tampilan'	=> 'admin/data_pengguna',
					'page' => 'data_pengguna',
					'dataAdmin'	=> $this->admin_model->get_data_admin(),
					'dataUser'	=> $this->user_model->get_data_user()
				];
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function doAdd_admin()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin" || $role == 'manager') {
				$this->form_validation->set_rules('usernameAdmin', 'Username', 'trim|required');
				$this->form_validation->set_rules('emailAdmin', 'Email', 'trim|required');
				$this->form_validation->set_rules('passwordAdmin', 'Password', 'trim|required');
				
				if ($this->form_validation->run() == TRUE) {
					$insertAdmin = $this->admin_model->insert_admin();
					if ($insertAdmin['status'] === TRUE) {
						$data['page']= 'data_pengguna';
						$data['alert'] = 'alert-success';
						$data['notif'] = $insertAdmin['notif'];
						$data['tampilan'] = 'admin/data_pengguna';
						$data['dataAdmin'] = $this->admin_model->get_data_admin();
						$data['dataUser'] = $this->user_model->get_data_user();
						$this->load->view('admin/template_view', $data);
					} else {
						$data['page']= 'data_pengguna';
						$data['alert'] = 'alert-danger';
						$data['notif'] = $insertAdmin['notif'];
						$data['tampilan'] = 'admin/data_pengguna';
						$data['dataAdmin'] = $this->admin_model->get_data_admin();
						$data['dataUser'] = $this->user_model->get_data_user();
						$this->load->view('admin/template_view', $data);
					}
				} else {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);
				}
			} else {
				redirect('homepage');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function doAdd_user()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin" || $role == 'manager') {
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
						$insertUser = $this->user_model->insert_user($this->upload->data());
						if ($insertUser['status'] == TRUE) {
							$data['page']= 'data_pengguna';
							$data['alert'] = 'alert-success';
							$data['notif'] = $insertUser['notif'];
							$data['tampilan'] = 'admin/data_pengguna';
							$data['dataAdmin'] = $this->admin_model->get_data_admin();
							$data['dataUser'] = $this->user_model->get_data_user();
							$this->load->view('admin/template_view', $data);

						} else {
							$data['page']= 'data_pengguna';
							$data['alert'] = 'alert-danger';
							$data['notif'] = $insertUser['notif'];
							$data['tampilan'] = 'admin/data_pengguna';
							$data['dataAdmin'] = $this->admin_model->get_data_admin();
							$data['dataUser'] = $this->user_model->get_data_user();
							$this->load->view('admin/template_view', $data);
						}
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $this->upload->display_errors();
						return $data;
					}
				} else {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);
				}
			} else {
				redirect('homepage');
			}
		} else {
			$this->load->view('login');
		}
	}
	
	public function doEdit_admin($username,$id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin" || $role == 'manager') {
				$this->form_validation->set_rules('usernameAdminEdit', 'Username', 'trim|required');
				$this->form_validation->set_rules('emailAdminEdit', 'Email', 'trim|required');
				$this->form_validation->set_rules('passwordAdminEdit', 'Password', 'trim|required');
				
				if ($this->form_validation->run() == TRUE) {
					$updateAdmin = $this->admin_model->update_admin($username,$id);
					if ($updateAdmin['status'] === TRUE) {
						$data['page']= 'data_pengguna';
						$data['alert'] = 'alert-success';
						$data['notif'] = $updateAdmin['notif'];
						$data['tampilan'] = 'admin/data_pengguna';
						$data['dataAdmin'] = $this->admin_model->get_data_admin();
						$data['dataUser'] = $this->user_model->get_data_user();
						$this->load->view('admin/template_view', $data);
					} else {
						$data['page']= 'data_pengguna';
						$data['alert'] = 'alert-danger';
						$data['notif'] = $updateAdmin['notif'];
						$data['tampilan'] = 'admin/data_pengguna';
						$data['dataAdmin'] = $this->admin_model->get_data_admin();
						$data['dataUser'] = $this->user_model->get_data_user();
						$this->load->view('admin/template_view', $data);
					}
				} else {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);
				}
			} else {
				redirect('homepage');
			}
		} else {
			$this->load->view('login');
		}
	}
	
	public function doDelete_admin()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin" || $role == 'manager') {
				$deleteUser = $this->admin_model->hapus_admin($this->uri->segment(3));
				if ($deleteUser['status'] == TRUE) {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteUser['notif'];
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);

				} else {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteUser['notif'];
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);
				}
			} else {
				redirect('homepage');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function doBlokir_user($username,$is_active)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin" || $role == 'manager') {
				$blokirUser = $this->user_model->blokir_user($username,$is_active);
				if ($blokirUser['status'] === TRUE) {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-success';
					$data['notif'] = $blokirUser['notif'];
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);
				} else {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-danger';
					$data['notif'] = $blokirUser['notif'];
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);
				}
			}
		} else {
			$this->load->view('login');
		}
	}

	public function doEdit_user($username,$id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin" || $role == 'manager') {
				$this->form_validation->set_rules('namaDepanEdit', 'Nama Depan', 'trim|required');
				$this->form_validation->set_rules('namaBelakangEdit', 'Nama Belakang', 'trim|required');
				$this->form_validation->set_rules('usernameUserEdit', 'Username', 'trim|required');
				$this->form_validation->set_rules('emailUserEdit', 'Email', 'trim|required');
				// $this->form_validation->set_rules('passwordUserEdit', 'Password', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$config['encrypt_name'] = TRUE;
					$config['upload_path'] = './upload/KTP/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '2000';

					$this->load->library('upload', $config);
					if ($_FILES['e_foto_ktp']['name'] != "") {
						if ($this->upload->do_upload('e_foto_ktp')) {
							$updateUser = $this->user_model->update_user($username,$id,$this->upload->data()['file_name']);
							if ($updateUser['status'] === TRUE) {
								$data['page']= 'data_pengguna';
								$data['alert'] = 'alert-success';
								$data['notif'] = $updateUser['notif'];
								$data['tampilan'] = 'admin/data_pengguna';
								$data['dataAdmin'] = $this->admin_model->get_data_admin();
								$data['dataUser'] = $this->user_model->get_data_user();
								$this->load->view('admin/template_view', $data);
							} else {
								$data['page']= 'data_pengguna';
								$data['alert'] = 'alert-danger';
								$data['notif'] = $updateUser['notif'];
								$data['tampilan'] = 'admin/data_pengguna';
								$data['dataAdmin'] = $this->admin_model->get_data_admin();
								$data['dataUser'] = $this->user_model->get_data_user();
								$this->load->view('admin/template_view', $data);
							}
						} else {
							$data['page']= 'data_pengguna';
							$data['alert'] = 'alert-danger';
							$data['notif'] = $this->upload->display_errors();
							$data['tampilan'] = 'admin/data_pengguna';
							$data['dataAdmin'] = $this->admin_model->get_data_admin();
							$data['dataUser'] = $this->user_model->get_data_user();
							$this->load->view('admin/template_view', $data);
						}
					} else {
						$updateUser = $this->user_model->update_user($username,$id);
						if ($updateUser['status'] === TRUE) {
							$data['page']= 'data_pengguna';
							$data['alert'] = 'alert-success';
							$data['notif'] = $updateUser['notif'];
							$data['tampilan'] = 'admin/data_pengguna';
							$data['dataAdmin'] = $this->admin_model->get_data_admin();
							$data['dataUser'] = $this->user_model->get_data_user();
							$this->load->view('admin/template_view', $data);
						} else {
							$data['page']= 'data_pengguna';
							$data['alert'] = 'alert-danger';
							$data['notif'] = $updateUser['notif'];
							$data['tampilan'] = 'admin/data_pengguna';
							$data['dataAdmin'] = $this->admin_model->get_data_admin();
							$data['dataUser'] = $this->user_model->get_data_user();
							$this->load->view('admin/template_view', $data);
						}
					}
					
				} else {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);
				}
			} else {
				redirect('homepage');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function doDelete_user()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin" || $role == 'manager') {
				$deleteUser = $this->user_model->hapus_user($this->uri->segment(3));
				if ($deleteUser['status'] == TRUE) {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteUser['notif'];
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);

				} else {
					$data['page']= 'data_pengguna';
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteUser['notif'];
					$data['tampilan'] = 'admin/data_pengguna';
					$data['dataAdmin'] = $this->admin_model->get_data_admin();
					$data['dataUser'] = $this->user_model->get_data_user();
					$this->load->view('admin/template_view', $data);
				}
			} else {
				redirect('homepage');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function kantor_cabang()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if ($this->input->post('add')) {
					$insert_data = $this->doAdd_kantor_cabang();
					$this->session->set_flashdata('notif', $insert_data['notif']);
					$this->session->set_flashdata('alert', $insert_data['alert']);
					redirect('admin/kantor_cabang');
				} else if ($this->input->post('edit')) {
					$edit = $this->doEdit_kantor_cabang($this->uri->segment(3));
					$this->session->set_flashdata('notif', $edit['notif']);
					$this->session->set_flashdata('alert', $edit['alert']);
					redirect('admin/kantor_cabang');
				} else if ($this->uri->segment(4)){
					$delete = $this->doDelete_kantor_cabang($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/kantor_cabang');
				}
				$data['page']= 'data_master';
				$data['tampilan'] = 'admin/kantor_cabang';
				$data['dataKantor'] = $this->kantor_cabang_model->getKantorCabang();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doAdd_kantor_cabang()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('nama_kota', 'Nama Kota', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$insertKantor = $this->kantor_cabang_model->addKantorCabang();
					if ($insertKantor['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $insertKantor['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $insertKantor['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_kantor_cabang($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('e_nama_kota', 'Nama Kota', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$updateKantor = $this->kantor_cabang_model->updateKantorCabang($id);
					if ($updateKantor['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $updateKantor['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $updateKantor['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDelete_kantor_cabang($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$deleteKantor = $this->kantor_cabang_model->deleteKantorCabang($id);
				if ($deleteKantor['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteKantor['notif'];
					return $data;

				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteKantor['notif'];
					return $data;;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function titik_penjemputan()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if ($this->input->post('add')) {
					$insert_data = $this->doAdd_titik_jemput();
					$this->session->set_flashdata('notif', $insert_data['notif']);
					$this->session->set_flashdata('alert', $insert_data['alert']);
					redirect('admin/titik_penjemputan');
				} else if ($this->input->post('edit')) {
					$edit = $this->doEdit_titik_jemput($this->uri->segment(3));
					$this->session->set_flashdata('notif', $edit['notif']);
					$this->session->set_flashdata('alert', $edit['alert']);
					redirect('admin/titik_penjemputan');
				} else if ($this->uri->segment(4)){
					$delete = $this->doDelete_titik_penjemputan($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/titik_penjemputan');
				}
				$data['page']= 'data_master';
				$data['tampilan'] = 'admin/titik_penjemputan';
				$data['dataTitikJemput'] = $this->titik_jemput_model->getTitikJemput();
				$data['dataKantorCabang'] = $this->kantor_cabang_model->getKantorCabang();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}
	
	public function doAdd_titik_jemput()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('id_kantor_cabang', 'Kantor Cabang', 'trim|required');
				$this->form_validation->set_rules('titik_jemput', 'Titik Jemput', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$insertTitikJemput = $this->titik_jemput_model->addTitikJemput();
					if ($insertTitikJemput['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $insertTitikJemput['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $insertTitikJemput['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_titik_jemput($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('kantor_cabang', 'Kota Cabang', 'trim|required');
				$this->form_validation->set_rules('titik_jemput', 'Titik Jemput', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$updateTitikJemput = $this->titik_jemput_model->updateTitikJemput($id);
					if ($updateTitikJemput['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $updateTitikJemput['notif'];
						return $data;;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $updateTitikJemput['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDelete_titik_penjemputan($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$deleteTitikJemput = $this->titik_jemput_model->deleteTitikJemput($id);
				if ($deleteTitikJemput['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteTitikJemput['notif'];
					return $data;

				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteTitikJemput['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function data_bus()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if ($this->input->post('add')) {
					$insert_data = $this->doAdd_bus();
					$this->session->set_flashdata('notif', $insert_data['notif']);
					$this->session->set_flashdata('alert', $insert_data['alert']);
					redirect('admin/data_bus');
				} else if ($this->input->post('edit')) {
					$edit = $this->doEdit_bus($this->uri->segment(3));
					$this->session->set_flashdata('notif', $edit['notif']);
					$this->session->set_flashdata('alert', $edit['alert']);
					redirect('admin/data_bus');
				} else if ($this->uri->segment(4)){
					$delete = $this->doDelete_bus($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/data_bus');
				}
				$data['page']= 'data_master';
				$data['tampilan'] = 'admin/data_bus';
				$data['dataBus'] = $this->bus_model->getBus();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}

	}

	public function doAdd_bus()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('desc', 'Deskripsi', 'trim|required');
				$this->form_validation->set_rules('seat', 'Seat', 'trim|required');
				$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$insertBus = $this->bus_model->addBus();
					if ($insertBus['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $insertBus['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $insertBus['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_bus($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('e_desc', 'Deskripsi', 'trim|required');
				$this->form_validation->set_rules('e_seat', 'Seat', 'trim|required');
				$this->form_validation->set_rules('e_harga', 'Harga', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$updatebus = $this->bus_model->updateBus($id);
					if ($updatebus['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $updatebus['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $updatebus['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDelete_bus($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$deleteBus = $this->bus_model->deleteBus($id);
				if ($deleteBus['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteBus['notif'];
					return $data;

				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteBus['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function data_daftar_paket()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if (!empty($this->input->post('add'))) {
					$insert_data = $this->doAdd_daftar_paket();
					$this->session->set_flashdata('notif', $insert_data['notif']);
					$this->session->set_flashdata('alert', $insert_data['alert']);
					redirect('admin/data_daftar_paket');
				} else if ($this->input->post('edit')) {
					$edit = $this->doEdit_daftar_paket($this->uri->segment(3));
					$this->session->set_flashdata('notif', $edit['notif']);
					$this->session->set_flashdata('alert', $edit['alert']);
					redirect('admin/data_daftar_paket');
				} else if ($this->uri->segment(4)){
					$delete = $this->doDelete_daftar_paket($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/data_daftar_paket');
				}
				$data['page']= 'data_master';
				$data['tampilan'] = 'admin/data_daftar_paket';
				$data['dataDaftarPaket'] = $this->daftar_paket_model->getDaftarPaket();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}

	}

	public function doAdd_daftar_paket()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('nm_daftar_paket', 'Nama Daftar Paket', 'trim|required');
				$this->form_validation->set_rules('deskripsi_fasilitas', 'Deskripsi Fasilitas', 'trim|required');
				$this->form_validation->set_rules('harga_fasilitas', 'Harga', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$insertDaftarPaket = $this->daftar_paket_model->addDaftarPaket();
					if ($insertDaftarPaket['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $insertDaftarPaket['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $insertDaftarPaket['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_daftar_paket($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('e_nm_daftar_paket', 'Nama Daftar Paket', 'trim|required');
				$this->form_validation->set_rules('e_deskripsi_fasilitas', 'Deskripsi Fasilitas', 'trim|required');
				$this->form_validation->set_rules('e_harga_fasilitas', 'Harga', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$updateDaftarPaket = $this->daftar_paket_model->updateDaftarPaket($id);
					if ($updateDaftarPaket['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $updateDaftarPaket['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $updateDaftarPaket['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDelete_daftar_paket($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$deleteDaftarPaket = $this->daftar_paket_model->deleteDaftarPaket($id);
				if ($deleteDaftarPaket['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteDaftarPaket['notif'];
					return $data;

				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteDaftarPaket['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function data_objek_wisata()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if (!empty($this->input->post('add'))) {
					$insert_data = $this->doAdd_objek_wisata();
					$this->session->set_flashdata('notif', $insert_data['notif']);
					$this->session->set_flashdata('alert', $insert_data['alert']);
					redirect('admin/data_objek_wisata');
				} else if ($this->input->post('edit')) {
					$edit = $this->doEdit_objek_wisata($this->input->post('e_id_objek_wisata'));
					$this->session->set_flashdata('notif', $edit['notif']);
					$this->session->set_flashdata('alert', $edit['alert']);
					redirect('admin/data_objek_wisata');
				} else if ($this->uri->segment(4) != NULL){
					$delete = $this->doDelete_objek_wisata($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/data_objek_wisata');
				}
				$data['page']= 'data_master';
				$data['tampilan'] = 'admin/data_objek_wisata';
				$data['dataObjekWisata'] = $this->objek_wisata_model->getObjekWisata();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doAdd_objek_wisata()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('nama_objek_wisata', 'Nama Objek Wisata', 'trim|required');
				$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './upload/';
					$config['encrypt_name'] = TRUE;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = 2000;

					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('gambar')) {
						
						$insertObjekWisata = $this->objek_wisata_model->addObjekWisata($this->upload->data());
					
						if ($insertObjekWisata['status'] === TRUE) {
							$data['alert'] = 'alert-success';
							$data['notif'] = $insertObjekWisata['notif'];
							return $data;
							
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $insertObjekWisata['notif'];
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
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_objek_Wisata($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('e_nama_objek_wisata', 'Nama Objek Wisata', 'trim|required');
				$this->form_validation->set_rules('e_harga', 'Harga', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					$config['encrypt_name'] = TRUE;
					$config['upload_path'] = './upload/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '2000';

					$this->load->library('upload', $config);

					if ($_FILES['e_gambar']['name'] != "") {
						if ($this->upload->do_upload('e_gambar')) {
							$updateObjekWisata = $this->objek_wisata_model->updateObjekWisata($id, $this->upload->data()['file_name']);
							if ($updateObjekWisata['status'] === TRUE) {
								$data['alert'] = 'alert-success';
								$data['notif'] = $updateObjekWisata['notif'];
								return $data;
							} else {
								$data['alert'] = 'alert-danger';
								$data['notif'] = $updateObjekWisata['notif'];
								return $data;
							}
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $this->upload->display_errors();
							return $data;
						}
					} else {
						$updateObjekWisata = $this->objek_wisata_model->updateObjekWisata($id);
						if ($updateObjekWisata['status'] == TRUE) {
							$data['alert'] = 'alert-success';
							$data['notif'] = $updateObjekWisata['notif'];
							return $data;
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $updateObjekWisata['notif'];
							return $data;
						}
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDelete_objek_Wisata($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$deleteObjekWisata = $this->objek_wisata_model->deleteObjekWisata($id);
				if ($deleteObjekWisata['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteObjekWisata['notif'];
					return $data;
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteObjekWisata['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function data_paket_wisata()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if (!empty($this->input->post('add'))) {
					$insert_data = $this->doAdd_paket_wisata();
					$this->session->set_flashdata('notif', $insert_data['notif']);
					$this->session->set_flashdata('alert', $insert_data['alert']);
					redirect('admin/data_paket_wisata');
				} else if ($this->input->post('edit')) {
					$edit = $this->doEdit_paket_wisata($this->input->post('e_id_paket_wisata'));
					$this->session->set_flashdata('notif', $edit['notif']);
					$this->session->set_flashdata('alert', $edit['alert']);
					redirect('admin/data_paket_wisata');
				} else if ($this->uri->segment(4) != NULL){
					$delete = $this->doDelete_paket_Wisata($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/data_paket_wisata');
				}
				$data['page']= 'data_paket';
				$data['tampilan'] = 'admin/data_paket_wisata';
				$data['dataPaketWisata'] = $this->paket_model->getPaketWisata();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}
	
	public function data_transaksi()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if ($this->input->post('save')) {
					$update_status = $this->doEditTransactionStatus();
					$this->session->set_flashdata('notif', $update_status['notif']);
					$this->session->set_flashdata('alert', $update_status['alert']);
					$status = $this->input->post('status',true);
					if ($status == "Menunggu Pembayaran") {
						$this->send_email($this->input->post('idtransaction',true));
					} else if( $status == "Proses") {
						$this->send_invoice($this->input->post('idtransaction',true));
					} else if($status == "Selesai") {
						$this->updatePaketLaris($this->input->post('idtransaction',true));
					}
					redirect('admin/data_transaksi');
				} else if ($this->uri->segment(3) == 'delete') {
					$delete = $this->doDeleteTransaction($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/data_transaksi');
				}
				$data['page']= 'data_transaksi';
				$data['tampilan'] = 'admin/data_transaksi';
				$data['trx'] = $this->Transaction_model->data_transaksi('trx');
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}
	
	private function updatePaketLaris($id){
		$test = $this->Transaction_model->checkKategoriBooking($id);
		foreach($test as $value) {
			if ($value->kategori != "customize") {
				$this->paket_model->addPaketLaris($value->id_paket_wisata);
			}
		}
	}

	public function data_history()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if ($this->uri->segment(3) == 'delete') {
					$delete = $this->doDeleteTransaction($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/data_history');
				}
				$this->load->model('Transaction_model');
				$data['page']= 'data_history';
				$data['tampilan'] = 'admin/data_history';
				$data['trx'] = $this->Transaction_model->data_transaksi('history');
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}
	
	public function doEditTransactionStatus()
	{
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('idtransaction', 'ID Transaksi', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
			$idtransaction = $this->input->post('idtransaction',true);
			$status = $this->input->post('status',true);
            $updateStatus = $this->Transaction_model->updateStatus($idtransaction,$status);
            if ($updateStatus['status'] === TRUE) {
				$data['alert'] = 'alert-success';
                $data['notif'] = $updateStatus['notif'];
                return $data;
            } else {
                $data['alert'] = 'alert-danger';
                $data['notif'] = $updateStatus['notif'];
                return $data;
            }
        } else {
            $data['alert'] = 'alert-danger';
            $data['notif'] = validation_errors();
            return $data;
        }
	}
	
	public function doDeleteTransaction($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$trx = $this->Transaction_model->getTransactionById($id);
				$kd_booking = $trx->kd_booking;
				$delete = $this->Transaction_model->deleteTransaction($id,$kd_booking);
				if ($delete['status'] === TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $delete['notif'];
					return $data;
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $delete['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function send_email($id){
		$getEmailData = $this->Transaction_model->getEmailData($id);
        $subject = "PEMESANAN PAKET WISATA";
        $this->data['title'] = "CV. CAHAYA TRAVEL";
		
		$this->data['rekening'] = $this->admin_model->getBank();
        $this->data['name'] = $getEmailData->nama;
        $this->data['email'] = $getEmailData->email;
        $this->data['harga'] = $getEmailData->total_harga;
		$this->data['kd_booking'] = $getEmailData->kd_transaksi;
		
        $content = $this->load->view('email/normal', $this->data, true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
            'email_receiver'=>$getEmailData->email,
            'subject'=>$subject,
            'content'=>$content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer\
	}
	
	private function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}

	public function laporan($startdate = '', $enddate = '')
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "manager") {
				$data['tampilan']= 'admin/laporan';
				$data['page']= 'laporan';
				$data['startdate'] = $this->input->post('startdate');
				$data['enddate'] = $this->input->post('enddate');
				$data['filterLaporan'] = $this->filterLaporan($startdate, $enddate);
				$this->load->view('admin/template_view', $data);
            } else {
                $data['tampilan'] = 'index_view';
			    $this->load->view('template_view', $data);
            }	
		} else {
			redirect('login');
		}
	}

	private function filterLaporan($startdate, $enddate)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "manager") {
				$startdate = $this->input->post('startdate');
				$enddate = $this->input->post('enddate');
				$filterLaporan = $this->Transaction_model->filterLaporan($startdate, $enddate);
				return $filterLaporan;
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function cetakLaporan($startdate = '', $enddate = ''){
		$this->load->library('PdfGenerator');
		date_default_timezone_set("Asia/Bangkok");
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		if ($startdate == '' && $enddate == '') {
			$data['filter'] = 'Per Tahun '.date("Y");
		} else {
			$dateStart=date_create($startdate);
			$dateEnd=date_create($enddate);
			$data['filter'] = 'Dari Tanggal '.date_format($dateStart,"d F Y").' - '.date_format($dateEnd,"d F Y");
		}
		$data['laporan'] = $this->filterLaporan($startdate, $enddate);
		$data['tempatTanggal'] = 'Tuban, '.date("d F Y");
	    $html = $this->load->view('pdf/pdf_view', $data, true);
	    $namaFile = 'Laporan-Transaksi-'.date('d-F-Y h:i:s');
	    $this->pdfgenerator->generate($html,$namaFile, 'legal', 'landscape');
	}

	public function send_invoice($id)
	{
		$getEmailData = $this->Transaction_model->getInvoiceData($id);
        $subject = "INVOICE PEMESANAN PAKET TOUR & TRAVEL";
        $this->data['title'] = "INVOICE";
		$totalDibayar = $getEmailData->total_harga - $getEmailData->total_harga;
		date_default_timezone_set("Asia/Bangkok");
		$date = date('d F Y');
		// $this->data['rekening'] = $this->admin_model->getBank();
		$this->data['dateToday'] = $date;
		$this->data['alamatPenerima'] = $getEmailData->alamat;
        $this->data['namaPenerima'] = $getEmailData->nama;
		$this->data['emailPenerima'] = $getEmailData->email;
		$this->data['kategori'] = $getEmailData->kategori;
        $this->data['harga'] = $this->rupiah($getEmailData->total_harga);
		$this->data['kd_booking'] = $getEmailData->kd_transaksi;
		$this->data['kd_booking'] = $getEmailData->kd_transaksi;
		$this->data['nama_paket'] = $getEmailData->nm_paket_wisata;
		$this->data['kekurangan'] = $this->rupiah($totalDibayar);
		
        $content = $this->load->view('email/invoice', $this->data, true); // Ambil isi file content.php dan masukan ke variabel $content
        $sendmail = array(
            'email_receiver'=>$getEmailData->email,
            'subject'=>$subject,
            'content'=>$content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer\
	}

	public function doAdd_paket_wisata()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('objek_wisata', 'Nama Paket', 'trim|required');
				$this->form_validation->set_rules('set_peserta', 'Set Peserta', 'trim|required');
				$this->form_validation->set_rules('harga_paket', 'Harga Paket', 'trim|required');
				$this->form_validation->set_rules('wisata', 'Objek Wisata', 'trim|required');
				$this->form_validation->set_rules('desc_paket', 'Deskripsi Paket', 'trim|required');
				$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './upload/';
					$config['encrypt_name'] = TRUE;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = 2000;

					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('gambar')) {
						
						$insertPaketWisata = $this->paket_model->addPaket_wisata($this->upload->data());
					
						if ($insertPaketWisata['status'] === TRUE) {
							$data['alert'] = 'alert-success';
							$data['notif'] = $insertPaketWisata['notif'];
							return $data;
							
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $insertPaketWisata['notif'];
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
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_paket_Wisata($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('e_objek_wisata', 'Nama Paket', 'trim|required');
				$this->form_validation->set_rules('e_set_peserta', 'Set Peserta', 'trim|required');
				$this->form_validation->set_rules('e_harga_paket', 'Harga Paket', 'trim|required');
				$this->form_validation->set_rules('e_wisata', 'Objek Wisata', 'trim|required');
				$this->form_validation->set_rules('e_desc_paket', 'Deskripsi Paket', 'trim|required');
				$this->form_validation->set_rules('e_kategori', 'Kategori', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					$config['encrypt_name'] = TRUE;
					$config['upload_path'] = './upload/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '2000';

					$this->load->library('upload', $config);

					if ($_FILES['e_gambar']['name'] != "") {
						if ($this->upload->do_upload('e_gambar')) {
							$updatePaketWisata = $this->paket_model->updatePaket_wisata($id, $this->upload->data()['file_name']);
							if ($updatePaketWisata['status'] === TRUE) {
								$data['alert'] = 'alert-success';
								$data['notif'] = $updatePaketWisata['notif'];
								return $data;
							} else {
								$data['alert'] = 'alert-danger';
								$data['notif'] = $updatePaketWisata['notif'];
								return $data;
							}
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $this->upload->display_errors();
							return $data;
						}
					} else {
						$updatePaketWisata = $this->paket_model->updatePaket_wisata($id);
						if ($updatePaketWisata['status'] == TRUE) {
							$data['alert'] = 'alert-success';
							$data['notif'] = $updatePaketWisata['notif'];
							return $data;
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $updatePaketWisata['notif'];
							return $data;
						}
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDelete_paket_Wisata($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$deletePaketWisata = $this->paket_model->deletePaket_wisata($id);
				if ($deletePaketWisata['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $deletePaketWisata['notif'];
					return $data;
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deletePaketWisata['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function data_hotel()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if (!empty($this->input->post('add'))) {
					$insert_data = $this->doAdd_hotel();
					$this->session->set_flashdata('notif', $insert_data['notif']);
					$this->session->set_flashdata('alert', $insert_data['alert']);
					redirect('admin/data_hotel');
				} else if ($this->input->post('edit')) {
					$edit = $this->doEdit_hotel($this->uri->segment(3));
					$this->session->set_flashdata('notif', $edit['notif']);
					$this->session->set_flashdata('alert', $edit['alert']);
					redirect('admin/data_hotel');
				} else if ($this->uri->segment(4)){
					$delete = $this->doDelete_hotel($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/data_hotel');
				}
				$data['page']= 'data_master';
				$data['tampilan'] = 'admin/data_hotel';
				$data['dataHotel'] = $this->hotel_model->getHotel();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}

	}

	public function doAdd_hotel()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('nama_hotel', 'Nama Hotel', 'trim|required');
				$this->form_validation->set_rules('desc', 'Deskripsi Hotel', 'trim|required');
				$this->form_validation->set_rules('bintang', 'Bintang', 'trim|required');
				$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$insertHotel = $this->hotel_model->addHotel();
					if ($insertHotel['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $insertHotel['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $insertHotel['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_hotel($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('e_nama_hotel', 'Nama Hotel', 'trim|required');
				$this->form_validation->set_rules('e_desc', 'Deskripsi Hotel', 'trim|required');
				$this->form_validation->set_rules('e_bintang', 'Bintang', 'trim|required');
				$this->form_validation->set_rules('e_harga', 'Harga', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$updateHotel = $this->hotel_model->updateHotel($id);
					if ($updateHotel['status'] === TRUE) {
						$data['alert'] = 'alert-success';
						$data['notif'] = $updateHotel['notif'];
						return $data;
					} else {
						$data['alert'] = 'alert-danger';
						$data['notif'] = $updateHotel['notif'];
						return $data;
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDelete_hotel($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$deleteHotel = $this->hotel_model->deleteHotel($id);
				if ($deleteHotel['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteHotel['notif'];
					return $data;

				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteHotel['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}


	public function data_info_wisata()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if (!empty($this->input->post('add'))) {
					$insert_data = $this->doAdd_info_wisata();
					$this->session->set_flashdata('notif', $insert_data['notif']);
					$this->session->set_flashdata('alert', $insert_data['alert']);
					redirect('admin/data_info_wisata');
				} else if ($this->input->post('edit')) {
					$edit = $this->doEdit_info_wisata($this->input->post('e_id_info_wisata'));
					$this->session->set_flashdata('notif', $edit['notif']);
					$this->session->set_flashdata('alert', $edit['alert']);
					redirect('admin/data_info_wisata');
				} else if ($this->uri->segment(4) != NULL){
					$delete = $this->doDelete_info_wisata($this->uri->segment(4));
					$this->session->set_flashdata('notif', $delete['notif']);
					$this->session->set_flashdata('alert', $delete['alert']);
					redirect('admin/data_info_wisata');
				}
				$data['page']= 'data_info_wisata';
				$data['tampilan'] = 'admin/data_info_wisata';
				$data['dataInfoWisata'] = $this->info_wisata_model->getInfoWisata();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doAdd_info_wisata()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('nm_wisata', 'Nama Info Wisata', 'trim|required');
				$this->form_validation->set_rules('tempat_wisata', 'Tempat Lokasi Wisata', 'trim|required');
				$this->form_validation->set_rules('desc', 'Deskripsi Wisata', 'trim|required');
				if ($this->form_validation->run() == TRUE) {

					$config['upload_path'] = './upload/';
					$config['encrypt_name'] = TRUE;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = 2000;

					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('gambar')) {
						
						$insertInfoWisata = $this->info_wisata_model->addInfoWisata($this->upload->data());
					
						if ($insertInfoWisata['status'] === TRUE) {
							$data['alert'] = 'alert-success';
							$data['notif'] = $insertInfoWisata['notif'];
							return $data;
							
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $insertInfoWisata['notif'];
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
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_info_wisata($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->form_validation->set_rules('e_nm_wisata', 'Nama Info Wisata', 'trim|required');
				$this->form_validation->set_rules('e_tempat_wisata', 'Tempat Lokasi Wisata', 'trim|required');
				$this->form_validation->set_rules('e_desc', 'Deskripsi Wisata', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					$config['encrypt_name'] = TRUE;
					$config['upload_path'] = './upload/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '2000';

					$this->load->library('upload', $config);

					if ($_FILES['e_gambar']['name'] != "") {
						if ($this->upload->do_upload('e_gambar')) {
							$updateInfoWisata = $this->info_wisata_model->updateInfoWisata($id, $this->upload->data()['file_name']);
							if ($updateInfoWisata['status'] === TRUE) {
								$data['alert'] = 'alert-success';
								$data['notif'] = $updateInfoWisata['notif'];
								return $data;
							} else {
								$data['alert'] = 'alert-danger';
								$data['notif'] = $updateInfoWisata['notif'];
								return $data;
							}
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $this->upload->display_errors();
							return $data;
						}
					} else {
						$updateInfoWisata = $this->info_wisata_model->updateInfoWisata($id);
						if ($updateInfoWisata['status'] == TRUE) {
							$data['alert'] = 'alert-success';
							$data['notif'] = $updateInfoWisata['notif'];
							return $data;
						} else {
							$data['alert'] = 'alert-danger';
							$data['notif'] = $updateInfoWisata['notif'];
							return $data;
						}
					}
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = validation_errors();
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDelete_info_wisata($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$deleteInfoWisata = $this->info_wisata_model->deleteInfoWisata($id);
				if ($deleteInfoWisata['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $deleteInfoWisata['notif'];
					return $data;
				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $deleteInfoWisata['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}
	
	public function	transaction_table_modal()
	{
		$this->load->model('Transaction_model');
		$start = $this->input->post('start_date');
		$end = $this->input->post('end_date');
		if($start!='' && $end!=''){
			$data['trx'] = $this->Transaction_model->getTransactionFilter($start,$end);
			$tanggal = $start." - ".$end;
			$data['tanggal'] = $tanggal;
			$this->load->view('admin/transaction_print',$data);
		} else {
			redirect('admin/data_transaksi');
		}
	}
	
	public function data_pemesan($id = '')
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				if($this->input->post('edit')){
					$edit_pemesan = $this->doEdit_pemesans($id);
					$this->session->set_flashdata('notif', $edit_pemesan['notif']);
                    $this->session->set_flashdata('alert', $edit_pemesan['alert']);
					redirect("admin/data_pemesan");
				}
				$data['page']= 'data_pemesan';
				$data['tampilan'] = 'admin/data_pemesan';
				$data['dataPemesan'] = $this->data_pemesan_model->getDataPemesan();
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doEdit_pemesans($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$updatePemesan = $this->data_pemesan_model->updatePemesan($id);
				if ($updatePemesan['status'] == TRUE) {
					$data['alert'] = 'alert-success';
					$data['notif'] = $updatePemesan['notif'];
					return $data;

				} else {
					$data['alert'] = 'alert-danger';
					$data['notif'] = $updatePemesan['notif'];
					return $data;
				}
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function data_paket_customize()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->load->model('request_paket_model');
				$data['page']= 'data_paket_customize';
				$data['tampilan'] = 'admin/data_paket_customize';
				$data['dataCustomize'] = $this->request_paket_model->getRequestPaket();
				$i = 0;
				//$data['dataObjekWisata'] =  $this->request_paket_model->getRequestPaketCustom();
					foreach($data['dataCustomize'] as $result) {
						$dataObjekWisata = explode(",", $result->id_objek_wisata);
						$listObjekWisata = [];
						foreach ($dataObjekWisata as $key => $value) {
							$ObjekWisata = $this->request_paket_model->getRequestPaketCustomId($value);
								if($ObjekWisata) {
									$listObjekWisata[] = $ObjekWisata[0];
								}
						}
						$data['dataCustomize'][$i]->listObjekWisata = $listObjekWisata;
						$i++;
					}
				$this->load->view('admin/template_view', $data);
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function doDeleteCustomize($id)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($role == "admin") {
				$this->load->model('request_paket_model');
				$customize = $this->request_paket_model->getRequestPaketById($id);
				$id_request_paket = $customize->id_request_paket;
				$this->request_paket_model->deleteRequestPaket($id,$id_request_paket);
				redirect('admin/data_paket_customize');
			} else {
				redirect('homepage');
			}
		} else {
			redirect('login');
		}
	}

	public function logout()
	{
		$data = array('username' => '',
			'logged_in' => FALSE);
		$this->session->sess_destroy();
		
		redirect('homepage');
		
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */