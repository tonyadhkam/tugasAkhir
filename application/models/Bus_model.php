<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus_model extends CI_Model {

    public function getBus()
    {
        return $this->db->get('tb_bus')->result();
    }

    public function getBusById($id)
    {
        return $this->db->where('id_bus', $id)->get('tb_bus')->row();
    }

    public function addBus()
    {
        $desc = $this->input->post('desc');
        $seat = $this->input->post('seat');
        $harga = $this->input->post('harga');

        $data = array(
            'desc' => $desc,
            'seat' => $seat,
            'harga' => $harga,
        );

        $this->db->insert('tb_bus', $data);

        if ($this->db->affected_rows() > 0) {
            return [
                'status' => TRUE,
                'notif' => 'Bus Berhasil Di Tambahkan'
            ];
        }else{
            return [
                'status' => FALSE,
                'notif' => 'Bus Gagal Di Tambahkan'
            ];
        }
    }

    public function updateBus($id)
    {
        $desc = $this->input->post('e_desc');
        $seat = $this->input->post('e_seat');
        $harga = $this->input->post('e_harga');
        $data = array(
            'desc' => $desc,
            'seat' => $seat,
            'harga' => $harga,
        );
        $this->db->where('id_bus', $id)
                    ->update('tb_bus', $data);

        if ($this->db->affected_rows() > 0) {
            return [
                'status' => TRUE,
                'notif' => 'Bus Berhasil Di Edit'
            ];
        }else{
            return [
                'status' => FALSE,
                'notif' => 'Bus Gagal Di Edit'
            ];
        }
    }

    public function deleteBus($id)
    {
        $this->db->where('id_bus', $id)->delete('tb_bus');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Bus Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Bus Gagal Di Hapus'
			];
		}	
    }

}

/* End of file ModelName.php */

?>