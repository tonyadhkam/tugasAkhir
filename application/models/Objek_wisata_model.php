<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objek_wisata_model extends CI_Model {

    public function getObjekWisata()
    {
        return $this->db->get('tb_objek_wisata')->result();
    }

    public function getObjekWisataById($id)
    {
        return $this->db->where('id_objek', $id)->get('tb_objek_wisata')->row();
    }

    public function addObjekWisata($gambar)
    {
        $nama_wisata = ucwords($this->input->post('nama_objek_wisata'));
        $harga = $this->input->post('harga');
		$query = $this->db->where('nama_wisata', $nama_wisata)
			->get('tb_objek_wisata');
		if ($query->num_rows() > 0 ) {
			return [
				'status' => FALSE,
				'notif' => 'Data Sudah Ada'
			];
		} else {
			$data = array(
                'nama_wisata' => $nama_wisata,
                'harga' => $harga,
                'gambar' => $gambar['file_name']
			);
	
			$this->db->insert('tb_objek_wisata', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Objek Wisata Berhasil Di Tambahkan'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Objek Wisata Gagal Di Tambahkan'
				];
			}
		}
    }

    public function updateObjekWisata($id, $gambar = "")
    {
        $path = $_SERVER['DOCUMENT_ROOT'].'/upload/';
        $checks = $this->getObjekWisataById($id);
        $nama_wisata = ucwords($this->input->post('e_nama_objek_wisata'));
        $harga = $this->input->post('e_harga');
        $data = array(
            'nama_wisata' => $nama_wisata,
            'harga' => $harga
        );
        if ($gambar != "") {
            $get_gambar = $this->db->select('gambar')->where('id_objek', $id)->get('tb_objek_wisata')->row();
            unlink($path.$get_gambar->gambar);
            $data['gambar'] = $gambar;
        }
        if ($checks->id_objek == $id && $checks->nama_wisata == $nama_wisata) {
            $this->db->where('id_objek', $id)
                        ->update('tb_objek_wisata', $data);

            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => TRUE,
                    'notif' => 'Objek Wisata Berhasil Di Edit'
                ];
            }else{
                return [
                    'status' => FALSE,
                    'notif' => 'Objek Wisata Gagal Di Edit'
                ];
            }
        } else {
            $query = $this->db->where('nama_wisata', $nama_wisata)
					->get('tb_objek_wisata');
			if ($query->num_rows() > 0 ) {
				return [
					'status' => FALSE,
					'notif' => 'Objek Wisata Sudah Ada'
				];
			} else {
				$this->db->where('id_objek', $id)
                        ->update('tb_objek_wisata', $data);

                if ($this->db->affected_rows() > 0) {
                    return [
                        'status' => TRUE,
                        'notif' => 'Objek Wisata Berhasil Di Edit'
                    ];
                }else{
                    return [
                        'status' => FALSE,
                        'notif' => 'Objek Wisata Gagal Di Edit'
                    ];
                }
			}
        }
    }

    public function deleteObjekWisata($id)
    {
        $path = $_SERVER['DOCUMENT_ROOT'].'/upload/';
        $get_gambar = $this->db->select('gambar')->where('id_objek', $id)->get('tb_objek_wisata')->row();
        unlink($path.$get_gambar->gambar);
        $this->db->where('id_objek', $id)->delete('tb_objek_wisata');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Objek Wisata Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Objek Wisata Gagal Di Hapus'
			];
		}	
    }

}

/* End of file ModelName.php */

?>