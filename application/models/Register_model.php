<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {
public function register_user($foto)
	{
        $nm_depan = $this->input->post('nm_depan');
		$nm_belakang = $this->input->post('nm_belakang');
        $username = $this->input->post('username');
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
                'nm_depan' => $nm_depan,
				'nm_belakang' => $nm_belakang,
                'username' => $username,
				'password' => md5($password),
				'email' => $email,
				'foto_ktp' => $foto['file_name'],
				'is_active' => 'active',
			);
	
			$this->db->insert('tb_user', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'User Berhasil Di Daftarkan.'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'User Gagal Di Daftarkan.'
				];
			}
		}
    }
}