<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_paket_model extends CI_Model {

    public function getDaftarPaket()
    {
        return $this->db->get('tb_daftar_paket')->result();
    }

    public function getDaftarPaketById($id)
    {
        return $this->db->where('id_fasilitas', $id)->get('tb_daftar_paket')->row();
    }

    public function addDaftarPaket()
    {
        $nm_daftar_paket = ucwords($this->input->post('nm_daftar_paket'));
        $deskripsi_fasilitas = $this->input->post('deskripsi_fasilitas');
        $harga = $this->input->post('harga_fasilitas');
		$query = $this->db->where('nm_daftar_paket', $nm_daftar_paket)
			->get('tb_daftar_paket');
		if ($query->num_rows() > 0 ) {
			return [
				'status' => FALSE,
				'notif' => 'Daftar Paket Sudah Ada'
			];
		} else {
			$data = array(
				'nm_daftar_paket' => $nm_daftar_paket,
				'deskripsi_fasilitas' => $deskripsi_fasilitas,
				'harga' => $harga,
			);
	
			$this->db->insert('tb_daftar_paket', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Daftar Paket Berhasil Di Tambahkan'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Daftar Paket Gagal Di Tambahkan'
				];
			}
		}
    }

    public function updateDaftarPaket($id)
    {
        $checks = $this->getDaftarPaketById($id);
        $nm_daftar_paket = ucwords($this->input->post('e_nm_daftar_paket'));
        $deskripsi_fasilitas = $this->input->post('e_deskripsi_fasilitas');
        $harga = $this->input->post('e_harga_fasilitas');
        $data = array(
            'nm_daftar_paket' => $nm_daftar_paket,
			'deskripsi_fasilitas' => $deskripsi_fasilitas,
			'harga' => $harga,
        );
        if ($checks->id_fasilitas == $id && $checks->nm_daftar_paket == $nm_daftar_paket) {
            $this->db->where('id_fasilitas', $id)
                        ->update('tb_daftar_paket', $data);

            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => TRUE,
                    'notif' => 'Daftar Paket Berhasil Di Edit'
                ];
            }else{
                return [
                    'status' => FALSE,
                    'notif' => 'Daftar Paket Gagal Di Edit'
                ];
            }
        } else {
            $query = $this->db->where('nm_daftar_paket', $nm_daftar_paket)
					->get('tb_daftar_paket');
			if ($query->num_rows() > 0 ) {
				return [
					'status' => FALSE,
					'notif' => 'Daftar Paket Sudah Ada'
				];
			} else {
				$this->db->where('id_fasilitas', $id)
                        ->update('tb_daftar_paket', $data);

                if ($this->db->affected_rows() > 0) {
                    return [
                        'status' => TRUE,
                        'notif' => 'Daftar Paket Berhasil Di Edit'
                    ];
                }else{
                    return [
                        'status' => FALSE,
                        'notif' => 'Daftar Paket Gagal Di Edit'
                    ];
                }
			}
        }
    }

    public function deleteDaftarPaket($id)
    {
        $this->db->where('id_fasilitas', $id)->delete('tb_daftar_paket');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Daftar Paket Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Daftar Paket Gagal Di Hapus'
			];
		}	
    }

}

/* End of file ModelName.php */

?>