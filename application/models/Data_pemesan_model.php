<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pemesan_model extends CI_Model {

    public function getDataPemesan()
    {
        return $this->db->get('tb_detail_booking')->result();
    }

    public function getDataPemesanById($id)
    {
        return $this->db->where('id_detail_booking', $id)->get('tb_detail_booking')->row();
    }

    public function updatePemesan($id)
    {
        $checks = $this->getDataPemesanById($id);
        $nama = ucwords($this->input->post('e_nama_pemesan'));
        $nik = $this->input->post('e_nik_pemesan');
        $alamat = $this->input->post('e_alamat_pemesan');
        $email = $this->input->post('e_email_pemesan');
        $no_telepon = $this->input->post('e_no_telepon');
        $data = array(
            'nama' => $nama,
            'nik' => $nik,
            'alamat' => $alamat,
            'email' => $email,
            'no_telepon' => $no_telepon,
        );
        $this->db->where('id_detail_booking', $id)
        ->update('tb_detail_booking', $data);
            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => TRUE,
                    'notif' => 'Data Pemesan Berhasil Di Edit'
                 ];
            }else{
                return [
                    'status' => FALSE,
                    'notif' => 'Data Pemesan Gagal Di Edit'
                ];
            }
        }
}

/* End of file ModelName.php */

?>