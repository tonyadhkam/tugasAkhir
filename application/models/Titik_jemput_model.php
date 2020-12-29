<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Titik_jemput_model extends CI_Model {

    public function getTitikJemput()
    {
        return $this->db->select('*')
            ->from('tb_kantor_cabang')
            ->join('tb_titik_jemput','tb_titik_jemput.id_kantor_cabang = tb_kantor_cabang.id_kantor_cabang','inner')
            ->get()
            ->result();
    }

    public function getTitikJemputById($id)
    {
        return $this->db->where('id_titik_jemput', $id)->get('tb_titik_jemput')->row();
    }

    public function addTitikJemput()
    {
        $id_kantor_cabang = $this->input->post('id_kantor_cabang');
        $titik_jemput = $this->input->post('titik_jemput');
		$query = $this->db->where('titik_jemput', $titik_jemput)
			->get('tb_titik_jemput');
		if ($query->num_rows() > 0 ) {
			return [
				'status' => FALSE,
				'notif' => 'Data Sudah Ada'
			];
		} else {
			$data = array(
				'id_kantor_cabang' => $id_kantor_cabang,
				'titik_jemput' => ucwords($titik_jemput),
			);
	
			$this->db->insert('tb_titik_jemput', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Titik Jemput Berhasil Di Tambahkan'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Titik Jemput Gagal Di Tambahkan'
				];
			}
		}
    }

    public function updateTitikJemput($id)
    {   
        $id_kantor_cabang = $this->input->post('kantor_cabang');
        $titik_jemput = $this->input->post('titik_jemput');
        $data = array(
            'id_kantor_cabang' => $id_kantor_cabang,
            'titik_jemput' => ucwords($titik_jemput),
        );
        $this->db->where('id_titik_jemput', $id)
                        ->update('tb_titik_jemput', $data);

        if ($this->db->affected_rows() > 0) {
            return [
                'status' => TRUE,
                'notif' => 'Titik Jemput Berhasil Di Edit'
            ];
        }else{
            return [
                'status' => FALSE,
                'notif' => 'Titik Jemput Gagal Di Edit'
            ];
        }
    }

    public function deleteTitikJemput($id)
    {
        $this->db->where('id_titik_jemput', $id)->delete('tb_titik_jemput');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Titik Jemput Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Titik Jemput Gagal Di Hapus'
			];
		}	
    }

}

/* End of file ModelName.php */

?>