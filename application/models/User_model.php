<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function cek_user()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$is_active = $this->get_data_userByUsername($username) != NULL ? $this->get_data_userByUsername($username) : '';
		if ($is_active != '') {
			if ($is_active->is_active != 'blokir') {
				$query = $this->db->where('username', $username)
						->where('password', $password)
						->get('tb_user');
		
				if ($query->num_rows() > 0) {
					$data = array(
						'id_user' => $query->row()->id_user,
						'email' => $query->row()->email,
						'nama' => $query->row()->nm_depan.' '.$query->row()->nm_belakang,
						'username' => $username,
						'role' => 'user',
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
			} else {
				return [
					'status' => 'blokir',
					'notif' => 'Akun Anda Telah Di Blokir! Hubungi Admin.'
				];
			}
		} else {
			return [
				'status' => '',
				'notif' => 'Username / Password Salah'
			];
		}
	}

	public function insert_user($foto)
	{
		$username = $this->input->post('username');
		$nm_depan = $this->input->post('nm_depan');
		$nm_belakang = $this->input->post('nm_belakang');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$query = $this->db->where('username', $username)
			->get('tb_user');
		if ($query->num_rows() > 0 ) {
			return [
				'status' => FALSE,
				'notif' => 'Username Sudah Ada'
			];
		} else {
			$data = array(
				'username' => $username,
				'nm_depan' => $nm_depan,
				'nm_belakang' => $nm_belakang,
				'password' => md5($password),
				'email' => $email,
				'foto_ktp' => $foto['file_name'],
				'is_active' => 'active',
			);
	
			$this->db->insert('tb_user', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'User Berhasil Di Tambahkan.'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'User Gagal Di Tambahkan.'
				];
			}
		}
	}

	public function get_data_user(){
		return $this->db->get('tb_user')->result();
	}

	public function get_data_userById($id)
	{
		return $this->db->where('id_user', $id)->get('tb_user')->row();
	}

	public function get_data_userByUsername($username)
	{
		return $this->db->where('username', $username)->get('tb_user')->row();
	}

	public function update_user($username,$id,$gambar = "")
    {   
		$path = $_SERVER['DOCUMENT_ROOT'].'/pemesanan_travel/upload/KTP/';
		$checks = $this->get_data_userById($id);
		$namaDepanEdit = $this->input->post('namaDepanEdit');
		$namaBelakangEdit = $this->input->post('namaBelakangEdit');
        $usernameUserEdit = $this->input->post('usernameUserEdit');
        $emailUserEdit = $this->input->post('emailUserEdit');
		$passwordUserEdit = md5($this->input->post('passwordUserEdit'));
        $data = array(
			'nm_depan' => $namaDepanEdit,
			'nm_belakang' => $namaBelakangEdit,
            'username' => $usernameUserEdit,
            'email' => $emailUserEdit,
            'password' => $passwordUserEdit,
		);
		if ($gambar != "") {
            $get_gambar = $this->db->select('foto_ktp')->where('id_user', $id)->get('tb_user')->row();
            unlink($path.$get_gambar->foto_ktp);
            $data['foto_ktp'] = $gambar;
        }
		if ($checks->id_user == $id && $checks->username == $usernameUserEdit) {
			$query = $this->db->where('username', $usernameUserEdit)
					->get('tb_user');
			$this->db->where('username', $username)
				->update('tb_user', $data);

			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'User Berhasil Di Edit'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'User Gagal Di Edit'
				];
			}
		} else {
			$query = $this->db->where('username', $usernameUserEdit)
					->get('tb_user');
			if ($query->num_rows() > 0 ) {
				return [
					'status' => FALSE,
					'notif' => 'Username Sudah Ada'
				];
			} else {
				$this->db->where('username', $username)
					->update('tb_user', $data);

				if ($this->db->affected_rows() > 0) {
					return [
						'status' => TRUE,
						'notif' => 'User Berhasil Di Edit'
					];
				}else{
					return [
						'status' => FALSE,
						'notif' => 'User Gagal Di Edit'
					];
				}
			}
		}
	}
	public function blokir_user($username,$is_active){
		if ($is_active == 0) {
			$data = array(
				'is_active' => 'active',
			);
			$this->db->where('username', $username)
					->update('tb_user', $data);
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'User Berhasil Di Aktifkan'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'User Gagal Di Aktifkan'
				];
			}
		} else {
			$data = array(
				'is_active' => 'blokir',
			);
			$this->db->where('username', $username)
					->update('tb_user', $data);
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'User Berhasil Di Blokir'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'User Gagal Di Blokir'
				];
			}
		}
	}
	public function hapus_user($id)
	{
		$path = $_SERVER['DOCUMENT_ROOT'].'/upload/KTP/';
        $get_gambar = $this->db->select('foto_ktp')->where('id_user', $id)->get('tb_user')->row();
        unlink($path.$get_gambar->foto_ktp);
		$this->db->where('id_user', $id)->delete('tb_user');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'User Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'User Gagal Di Hapus'
			];
		}	
	}

	public function getTotalUser(){
		$query = $this->db->where('is_active', 'active')->get('tb_user')->result();
		return count($query);
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */