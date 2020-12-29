<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor_cabang_model extends CI_Model {

    public function getKantorCabang()
    {
        return $this->db->get('tb_kantor_cabang')->result();
	}

    public function getKantorCabangById($id)
    {
        return $this->db->where('id_kantor_cabang', $id)->get('tb_kantor_cabang')->row();
    }

    public function addKantorCabang()
    {
        $nama_kota = ucwords($this->input->post('nama_kota'));
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

    public function updateKantorCabang($id)
    {
		$nama_kota = ucwords($this->input->post('e_nama_kota'));
        $data = array(
            'nama_kota' => $nama_kota,
        );
        $this->db->where('id_kantor_cabang', $id)
                        ->update('tb_kantor_cabang', $data);

        if ($this->db->affected_rows() > 0) {
            return [
                'status' => TRUE,
                'notif' => 'Kantor Cabang Berhasil Di Edit'
            ];
        }else{
            return [
                'status' => FALSE,
                'notif' => 'Kantor Cabang Gagal Di Edit'
            ];
        }
    }

    public function deleteKantorCabang($id)
    {
        $this->db->where('id_kantor_cabang', $id)->delete('tb_kantor_cabang');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Kota Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Kota Gagal Di Hapus'
			];
		}	
    }

}

/* End of file ModelName.php */

?>