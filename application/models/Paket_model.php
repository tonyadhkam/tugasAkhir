<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {

    public function getPaketWisata()
    {
        return $this->db->get('tb_paket')->result();
    }
    public function getKategori()
    {
        return $this->db->distinct()->select('kategori')->get('tb_paket')->result();
    }
    public function getSeat()
    {
        return $this->db->distinct()->select('set_peserta')->get('tb_paket')->result();
    }
    public function getPaketWisataByKategori($kategori, $id)
    {
        return $this->db->where('kategori',$kategori)
                    ->where('id_paket_wisata',$id)
                    ->get('tb_paket')->result();
    }
    public function getPaketWisataById($id)
    {
        return $this->db->where('id_paket_wisata', $id)->get('tb_paket')->row();
    }

    public function addPaket_wisata($gambar)
    {
        $objek_wisata = ucwords($this->input->post('objek_wisata'));
        $set_peserta = $this->input->post('set_peserta');
        $kategori = $this->input->post('kategori');
        $wisata = $this->input->post('wisata');
        $desc_paket = $this->input->post('desc_paket');
        $harga_paket = $this->input->post('harga_paket');
		$query = $this->db->get('tb_paket');
		
			$data = array(
				'nama_paket' => $objek_wisata,
				'set_peserta' => $set_peserta,
                'harga_paket' => $harga_paket,
                'objek_wisata' => $wisata,
				'desc_paket_wisata' => $desc_paket,
                'kategori' => $kategori,
                'gambar' => $gambar['file_name']
			);
	
			$this->db->insert('tb_paket', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Paket Wisata Berhasil Di Tambahkan'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Paket Wisata Gagal Di Tambahkan'
				];
			}
    }
    
    public function updatePaket_wisata($id, $gambar = "")
    {
        $path = $_SERVER['DOCUMENT_ROOT'].'/upload/';
        $checks = $this->getPaketWisataById($id);
        $objek_wisata = ucwords($this->input->post('e_objek_wisata'));
        $set_peserta = $this->input->post('e_set_peserta');
        $kategori = $this->input->post('e_kategori');
        $wisata = $this->input->post('e_wisata');
        $desc_paket = $this->input->post('e_desc_paket');
        $harga_paket = $this->input->post('e_harga_paket');
        $data = array(
            'nama_paket' => $objek_wisata,
            'set_peserta' => $set_peserta,
            'harga_paket' => $harga_paket,
            'objek_wisata' => $wisata,
            'desc_paket_wisata' => $desc_paket,
            'kategori' => $kategori
        );
        if ($gambar != "") {
            $get_gambar = $this->db->select('gambar')->where('id_paket_wisata', $id)->get('tb_paket')->row();
            unlink($path.$get_gambar->gambar);
            $data['gambar'] = $gambar;
        }

            $this->db->where('id_paket_wisata', $id)
                        ->update('tb_paket', $data);

            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => TRUE,
                    'notif' => 'Paket Wisata Berhasil Di Edit'
                ];
            }else{
                return [
                    'status' => FALSE,
                    'notif' => 'Paket Wisata Gagal Di Edit'
                ];
            }
    }

    public function deletePaket_wisata($id)
    {
        $path = $_SERVER['DOCUMENT_ROOT'].'/upload/';
        $get_gambar = $this->db->select('gambar')->where('id_paket_wisata', $id)->get('tb_paket')->row();
        unlink($path.$get_gambar->gambar);
        $this->db->where('id_paket_wisata', $id)->delete('tb_paket');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Paket Wisata Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Paket Wisata Gagal Di Hapus'
			];
		}	
    }

    public function addPaketLaris($id)
    {
        $getPaket = $this->db->where('id_paket_wisata', $id)->get('tb_paket')->row();
        $totalOrder = $getPaket->total_order + 1;
        $data = array(
            'total_order' => $totalOrder
        );
        $this->db->where('id_paket_wisata', $id)
                        ->update('tb_paket', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function getPaketLaris()
    {
        $this->db->select_max('total_order');
        $query = $this->db->get('tb_paket');
        if($query->num_rows() != 0) {
            $result = $query->row();
            $this->db->where('total_order', $result->total_order);
            $queryPaket = $this->db->get('tb_paket');
            if ($queryPaket->num_rows() != 0) {
                return $queryPaket->result();
            } else {
                return false;
            }
		} else {
			return false;
		}
    }

    public function getPaketTidakLaris()
    {
        $this->db->select_min('total_order');
        $query = $this->db->get('tb_paket');
        if($query->num_rows() != 0) {
            $result = $query->row();
            $this->db->where('total_order', $result->total_order);
            $queryPaket = $this->db->get('tb_paket');
            if ($queryPaket->num_rows() != 0) {
                return $queryPaket->result();
            } else {
                return false;
            }
		} else {
			return false;
		}
    }
}

/* End of file ModelName.php */

?>
