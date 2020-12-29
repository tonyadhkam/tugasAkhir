<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model {

    public function getHotel()
    {
        return $this->db->get('tb_hotel')->result();
    }

    public function getHotelById($id)
    {
        return $this->db->where('id_hotel', $id)->get('tb_hotel')->row();
    }

    public function addHotel()
    {
        $nama_hotel = ucwords($this->input->post('nama_hotel'));
        $desc = $this->input->post('desc');
        $bintang = $this->input->post('bintang');
        $harga = $this->input->post('harga');
		$query = $this->db->get('tb_hotel');
            $data = array(
                'nama_hotel' => $nama_hotel,
                'desc' => $desc,
                'bintang' => $bintang,
                'harga' => $harga,
            );

            $this->db->insert('tb_hotel', $data);

            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => TRUE,
                    'notif' => 'Hotel Berhasil Di Tambahkan'
                ];
            }else{
                return [
                    'status' => FALSE,
                    'notif' => 'Hotel Gagal Di Tambahkan'
                ];
            }
    }

    public function updateHotel($id)
    {
        $checks = $this->getHotelById($id);
        $nama_hotel = ucwords($this->input->post('e_nama_hotel'));
        $desc = $this->input->post('e_desc');
        $bintang = $this->input->post('e_bintang');
        $harga = $this->input->post('e_harga');
        $data = array(
            'nama_hotel' => $nama_hotel,
            'desc' => $desc,
            'bintang' => $bintang,
            'harga' => $harga,
        );
            $this->db->where('id_hotel', $id)
                        ->update('tb_hotel', $data);

            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => TRUE,
                    'notif' => 'Hotel Berhasil Di Edit'
                ];
            }else{
                return [
                    'status' => FALSE,
                    'notif' => 'Hotel Gagal Di Edit'
                ];
            }
    }

    public function deleteHotel($id)
    {
        $this->db->where('id_hotel', $id)->delete('tb_hotel');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Hotel Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Hotel Gagal Di Hapus'
			];
		}	
    }

}

/* End of file ModelName.php */

?>