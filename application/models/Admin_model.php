<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function cek_superAdmin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$query = $this->db->where('username', $username)
				->where('password', $password)
				->where('role', 'manager')
				->get('tb_admin');

		if ($query->num_rows() > 0) {
			$data = array(
				'username' => $username,
				'role' => 'manager',
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);
			return [
				'status' => TRUE,
				'notif' => 'Login Berhasil!'
			];
		} else {
			return [
				'status' => FALSE,
				'notif' => 'Username / Password Salah'
			];
		}
	}

	public function getBank()
	{
		return $this->db->get('tb_rekening')->result();
	}

	public function cek_admin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$query = $this->db->where('username', $username)
				->where('password', $password)
				->where('role', 'admin')
				->get('tb_admin');

		if ($query->num_rows() > 0) {
			$data = array(
				'username' => $username,
				'role' => 'admin',
				'logged_in' => TRUE
			);
			$this->session->set_userdata($data);
			return [
				'status' => TRUE,
				'notif' => 'Login Berhasil!'
			];
		} else {
			return [
				'status' => FALSE,
				'notif' => 'Username / Password Salah'
			];
		}
	}

	public function get_data_admin(){
		return $this->db->where('role', 'admin')->get('tb_admin')->result();
	}
	public function get_data_adminById($id)
	{
		return $this->db->where('id_admin', $id)->get('tb_admin')->row();
	}

	public function insert_admin()
	{
		$username = $this->input->post('usernameAdmin');
		$password = $this->input->post('passwordAdmin');
		$email = $this->input->post('emailAdmin');
		// $role = $this->input->post('role');
		$query = $this->db->where('username', $username)
			->get('tb_admin');
		if ($query->num_rows() > 0 ) {
			return [
				'status' => FALSE,
				'notif' => 'Username Sudah Ada'
			];
		} else {
			$data = array(
				'username' => $username,
				'password' => md5($password),
				'email' => $email,
				'role' => 'admin',
			);
	
			$this->db->insert('tb_admin', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Admin Berhasil Di Tambahkan'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Admin Gagal Di Tambahkan'
				];
			}
		}
	}

	public function update_admin($username,$id)
    {   
		$checks = $this->get_data_adminById($id);
        $usernameAdminEdit = $this->input->post('usernameAdminEdit');
        $emailAdminEdit = $this->input->post('emailAdminEdit');
		$passwordAdminEdit = md5($this->input->post('passwordAdminEdit'));
        $data = array(
            'username' => $usernameAdminEdit,
            'email' => $emailAdminEdit,
            'password' => $passwordAdminEdit,
		);
		if ($checks->id_admin == $id && $checks->username == $usernameAdminEdit) {
			$this->db->where('username', $username)
				->update('tb_admin', $data);

			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Admin Berhasil Di Edit'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Admin Gagal Di Edit'
				];
			}
		} else {
			$query = $this->db->where('username', $usernameAdminEdit)
					->get('tb_admin');
			if ($query->num_rows() > 0 ) {
				return [
					'status' => FALSE,
					'notif' => 'Username Sudah Ada'
				];
			} else {
				$this->db->where('username', $username)
					->update('tb_admin', $data);

				if ($this->db->affected_rows() > 0) {
					return [
						'status' => TRUE,
						'notif' => 'Admin Berhasil Di Edit'
					];
				}else{
					return [
						'status' => FALSE,
						'notif' => 'Admin Gagal Di Edit'
					];
				}
			}
		}
	}

	public function hapus_admin($id)
	{
		$dataAdmin = $this->db->where('role !=', 'manager')->get('tb_admin')->result();
		$totalAdmin = count($dataAdmin);
		if ($totalAdmin != 1 || $totalAdmin == 0) {
			$this->db->where('id_admin', $id)->delete('tb_admin');
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Admin Berhasil Di Hapus'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Admin Gagal Di Hapus'
				];
			}	
		} else {
			return [
				'status' => FALSE,
				'notif' => 'Admin Gagal Di Hapus'
			];
		}
	}

	public function insert_kantor_cabang()
	{
		$nama_kota = $this->input->post('nama_kota');
		$query = $this->db->where('nama_kota', $nama_kota)
			->get('tb_kantor_cabang');
		if ($query->num_rows() > 0 ) {
			return [
				'status' => FALSE,
				'notif' => 'Data Sudah Ada'
			];
		} else {
			$data = array(
				'nama_kota' => $nama_kota,
			);
	
			$this->db->insert('tb_kantor_cabang', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Kantor Cabang Berhasil Di Tambahkan'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Kantor Cabang Gagal Di Tambahkan'
				];
			}
		}
	}
	
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */