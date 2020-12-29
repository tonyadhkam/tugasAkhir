<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->model('paket_model');
        $this->load->model('info_wisata_model');
        $this->load->model('bus_model');
        $this->load->model('hotel_model');
        $this->load->model('daftar_paket_model');
        $this->load->model('objek_wisata_model');
        $this->load->model('booking_model');
        $this->load->model('titik_jemput_model');
        $this->load->model('Transaction_model');
        $this->load->model('request_paket_model');
    }
    
    public function index()
    {
            $data['tampilan'] = 'index_view';
            $data['paket_wisata'] = $this->paket_model->getPaketWisata();
			$this->load->view('template_view', $data);
    }

    public function paket()
    {
        $data['tampilan'] = 'paket_view';
        $data['dataKategori'] = $this->paket_model->getKategori();
        $data['dataSeat'] = $this->paket_model->getSeat();
        $data['dataPaketWisata'] = $this->paket_model->getPaketWisata();
        $this->load->view('template_view', $data);
    }

    public function about()
    {
        $data['tampilan'] = 'about_view';
        $this->load->view('template_view', $data);
    }

    public function contact()
    {
        $data['tampilan'] = 'contact_view';
        $this->load->view('template_view', $data);
    }
    
    public function gallery()
    {
        $data['tampilan'] = 'gallery_view';
        $this->load->view('template_view', $data);
    }
    public function wisata()
    {
        $data['tampilan'] = 'wisata_view';
        $data['dataNamaWisata'] = $this->info_wisata_model->getNamaWisata();
        $data['dataWisata'] = $this->info_wisata_model->getInfoWisata();
        $this->load->view('template_view', $data);
    }
    public function paket_wisata($kategori,$id = NULL){
        unset($_SESSION['order']);
        $role = $this->session->userdata('role');
        if ($this->input->post('add')) {
            if ($this->session->userdata('logged_in') == TRUE) {
                $insert_data = $this->booking($kategori);
                $this->session->set_flashdata('notif', $insert_data['notif']);
                $this->session->set_flashdata('alert', $insert_data['alert']);
            } else {
                $this->session->set_userdata('order',$kategori);
                redirect('login');
            }
        }
        if ($kategori == 'siswa' || $kategori == 'umum') {
            $data['dataPaket'] = $this->paket_model->getPaketWisataByKategori($kategori,$id);
        } else if ($kategori == 'customize') {
            $data['dataPaket'] = $this->request_paket_model->getRequestPaketById($id);
        }
        if ($this->session->userdata('logged_in') == TRUE) {
            $data['dataUser'] = $this->user_model->get_data_userByUsername($_SESSION['username']);
        }
        $data['dataTitikJemput'] = $this->titik_jemput_model->getTitikJemput();
        $data['page']= 'paket_wisata';
        $data['tampilan'] = 'paket_wisata';
        $this->load->view('template_view', $data);
    }
    
    public function paket_customize()
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
            $data['dataUser'] = $this->user_model->get_data_userByUsername($_SESSION['username']);
        }
        if (!empty($this->input->post('add'))) {  
            $insert_data = $this->doAdd_paket_customize();
            $this->session->set_flashdata('notif', $insert_data['notif']);
            $this->session->set_flashdata('alert', $insert_data['alert']);
            // redirect('admin/paket_wisata/customize');
		}
        $data['dataBus'] = $this->bus_model->getBus();
		$data['dataHotel'] = $this->hotel_model->getHotel();
		$data['dataFasilitas'] = $this->daftar_paket_model->getDaftarPaket();
		$data['dataObjek'] = $this->objek_wisata_model->getObjekWisata();
        $data['page']= 'paket_customize';
        $data['tampilan'] = 'paket_customize';
        $this->load->view('template_view', $data);
	}

	public function doAdd_paket_customize()
	{
        $this->form_validation->set_rules('id_bus', 'Data Bus', 'trim|required');
        $this->form_validation->set_rules('id_hotel', 'Data Hotel', 'trim|required');
        $this->form_validation->set_rules('id_fasilitas', 'Fasilitas', 'trim|required');
        $this->form_validation->set_rules('id_objek_wisata', 'Data Objek Wisata', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            if ($this->session->userdata('logged_in') == TRUE) {
                $insertBooking = $this->booking_model->addBookingCustomize();
                if ($insertBooking['status'] === TRUE) {
                    $data['alert'] = 'alert-success';
                    $data['notif'] = $insertBooking['notif'];
                    $id_request = $insertBooking['id_request'];
                    redirect("homepage/paket_wisata/customize/$id_request");
                    return $data;
                } else {
                    $data['alert'] = 'alert-danger';
                    $data['notif'] = $insertBooking['notif'];
                    return $data;
                }
            } else {
                redirect('login');
            }
        } else {
            $data['alert'] = 'alert-danger';
            $data['notif'] = validation_errors();
            return $data;
        }
    }

	public function detail_paket($id)
	{
		$validation = strip_tags(htmlentities($id, ENT_QUOTES, 'UTF-8'));
		$paket_wisata = $this->paket_model->getPaketWisataById($validation);
        $data['page']= 'paket_detail';
        $data['tampilan']= 'paket_detail';
        $data['paket'] = $paket_wisata;
        $this->load->view('template_view', $data);
    }
    
    public function detail_info_wisata($id)
	{
		$validation = strip_tags(htmlentities($id, ENT_QUOTES, 'UTF-8'));
		$info_wisata = $this->info_wisata_model->getInfoWisataById($validation);
		if($info_wisata->nm_wisata!=''){
			$data['page']= 'wisata_detail';
			$data['tampilan']= 'wisata_detail';
			$data['wisata'] = $info_wisata;
			$this->load->view('template_view', $data);
		} else {
			redirect(base_url());
		}
	}

    public function data_pemesan($kategori,$id_booking = NULL,$kd_booking = NULL){
        if ($id_booking != NULL && $kd_booking != NULL) {
            $this->session->set_userdata('id_booking',$id_booking);
            $this->session->set_userdata('kd_booking',$kd_booking);
        }
        if ($this->input->post('add')) {
            if ($this->session->userdata('logged_in') == TRUE) {
                $insert_data = $this->do_addPemesan();
                $this->session->set_flashdata('notif', $insert_data['notif']);
                $this->session->set_flashdata('alert', $insert_data['alert']);
                redirect("homepage/order");
            } else {
                $this->session->set_userdata('order',$kategori);
                redirect('login');
            }
        }
        $data['dataUser'] = $this->user_model->get_data_userByUsername($_SESSION['username']);
        $data['kategori'] = $kategori;
        $data['page']= 'data_pemesan';
        $data['tampilan'] = 'data_pemesan';
        $this->load->view('template_view', $data);
    }

    public function do_addPemesan(){
        $this->form_validation->set_rules('nama_pemesan', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nik_pemesan', 'NIK', 'trim|required');
        $this->form_validation->set_rules('alamat_pemesan', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'No. Telepon', 'trim|required');
        $this->form_validation->set_rules('email_pemesan', 'Email', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $insertBooking = $this->booking_model->addDetailBooking();
            if ($insertBooking['status'] === TRUE) {
                $data['alert'] = 'alert-success';
                $data['notif'] = $insertBooking['notif'];
                return $data;
            } else {
                $data['alert'] = 'alert-danger';
                $data['notif'] = $insertBooking['notif'];
                return $data;
            }
        } else {
            $data['alert'] = 'alert-danger';
            $data['notif'] = validation_errors();
            return $data;
        }
    }

    public function booking($kategori)
    {
        $this->form_validation->set_rules('tanggal_keberangkatan', 'Tanggal Keberangkatan', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            if ($this->session->userdata('logged_in') == TRUE) {
                $insertBooking = $this->booking_model->addBooking($kategori);
                if ($insertBooking['status'] === TRUE) {
                    $data['alert'] = 'alert-success';
                    $data['notif'] = $insertBooking['notif'];
                    redirect("homepage/data_pemesan/$kategori");
                    return $data;
                } else {
                    $data['alert'] = 'alert-danger';
                    $data['notif'] = $insertBooking['notif'];
                    return $data;
                }
            } else {
                // $this->session->set_userdata('order',TRUE);
                redirect('login');
            }
        } else {
            $data['alert'] = 'alert-danger';
            $data['notif'] = validation_errors();
            return $data;
        }
    }
	
	public function order($param = '', $id_paket_wisata = '', $kategori = '', $kd_booking = '')
	{
		if ($this->session->userdata('logged_in') == TRUE) {
            $data['trx'] = $this->Transaction_model->getDataOrder($this->session->userdata('id_user'), 'trx');
            $data['trxr'] = $this->booking_model->getPendingBooking($this->session->userdata('id_user'));
            unset($_SESSION['id_booking']);
            unset($_SESSION['kd_booking']);
            if ( $param == 'delete') {  
                if ($kategori == 'siswa' || $kategori == 'umum') {
                    $delete_pending_order = $this->doDelete_pending($id_paket_wisata, $kd_booking);
                    $this->session->set_flashdata('notif', $delete_pending_order['notif']);
                    $this->session->set_flashdata('alert', $delete_pending_order['alert']);
                    redirect("homepage/order");
                } else {
                    $delete_pending_order = $this->doDelete_pendingCustomize($id_paket_wisata, $kd_booking);
                    $this->session->set_flashdata('notif', $delete_pending_order['notif']);
                    $this->session->set_flashdata('alert', $delete_pending_order['alert']);
                    redirect("homepage/order");
                }
            }
			$data['page'] = 'order';
            $data['tampilan'] = 'order';
            $this->load->view('template_view', $data);
        } else {
            redirect('login');
        }
    }

    public function doDelete_pending($id_paket_wisata, $kd_booking)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
            $delete_pending_order = $this->booking_model->deletePendingOrder($id_paket_wisata, $kd_booking);
            if ($delete_pending_order['status'] == TRUE) {
                $data['alert'] = 'alert-success';
                $data['notif'] = $delete_pending_order['notif'];
                return $data;

            } else {
                $data['alert'] = 'alert-danger';
                $data['notif'] = $delete_pending_order['notif'];
                return $data;
            }
		} else {
			redirect('login');
		}
    }
    
    public function doDelete_pendingCustomize($id_paket_wisata, $kd_booking)
	{
		$role = $this->session->userdata('role');
		if ($this->session->userdata('logged_in') == TRUE) {
            $delete_pending_order = $this->booking_model->deletePendingOrderCustomize($id_paket_wisata, $kd_booking);
            if ($delete_pending_order['status'] == TRUE) {
                $data['alert'] = 'alert-success';
                $data['notif'] = $delete_pending_order['notif'];
                return $data;

            } else {
                $data['alert'] = 'alert-danger';
                $data['notif'] = $delete_pending_order['notif'];
                return $data;
            }
		} else {
			redirect('login');
		}
	}
	
	public function orderVerification()
	{
		if($this->input->post('upload')){
			$this->load->model('Transaction_model');
			$idtransaction = $this->input->post('idtransaction',true);
			$config['upload_path'] = './upload/';
			$config['encrypt_name'] = TRUE;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2000;

			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('gambar')) {
				
				$paymentVerification = $this->Transaction_model->uploadBukti($idtransaction,$this->upload->data(),'trx');
			
				if ($paymentVerification['status'] === TRUE) {
					redirect(base_url('homepage/order'));
				} else {
					redirect(base_url());
				}
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function orderVerificationRequest()
	{
		if($this->input->post('upload')){
			$this->load->model('Transaction_model');
			$idtransaction = $this->input->post('idtransaction',true);
			$config['upload_path'] = './upload/';
			$config['encrypt_name'] = TRUE;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2000;

			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('gambar')) {
				
				$paymentVerification = $this->Transaction_model->uploadBukti($idtransaction,$this->upload->data(),'request');
			
				if ($paymentVerification['status'] === TRUE) {
					redirect(base_url('homepage/order'));
				} else {
					redirect(base_url());
				}
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}
	
	public function order_cancel($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->load->model('Transaction_model');
			$data['trx'] = $this->Transaction_model->cancelTransaction($id,'trx');
			redirect('homepage/order');
        } else {
            redirect('login');
        }
	}
	
	public function order_request_cancel($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->load->model('Transaction_model');
			$data['trx'] = $this->Transaction_model->cancelTransaction($id,'request');
			redirect('homepage/order');
        } else {
            redirect('login');
        }
	}
	
	public function history()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->load->model('Transaction_model');
			$data['trx'] = $this->Transaction_model->getTransaction($this->session->userdata('id_user'),'history');
			$data['page'] = 'history';
			$data['tampilan'] = 'history';
            $this->load->view('template_view', $data);
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

/* End of file Homepage.php */
