<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_Paket_Model extends CI_Model {

    public function getRequestPaketCustomId($id) {
      $this->db->select('tb_objek_wisata.id_objek ,tb_objek_wisata.nama_wisata');
      $this->db->where('tb_objek_wisata.id_objek',$id);
      return $this->db->get('tb_objek_wisata')->result();
    }

    public function getRequestPaket()
    {
      $this->db->select('tb_request_paket.id_objek_wisata, tb_request_paket.id_request_paket ,tb_user.nm_depan, tb_user.nm_belakang, tb_daftar_paket.nm_daftar_paket,
      tb_bus.desc, tb_hotel.nama_hotel, tb_request_paket.harga_paket, tb_request_paket.created');
      $this->db->join('tb_user','tb_user.id_user = tb_request_paket.id_user');
      $this->db->join('tb_bus','tb_bus.id_bus = tb_request_paket.id_bus');
      $this->db->join('tb_hotel','tb_hotel.id_hotel = tb_request_paket.id_hotel');
      $this->db->join('tb_daftar_paket','tb_daftar_paket.id_fasilitas = tb_request_paket.id_fasilitas ');
      return $this->db->get('tb_request_paket')->result();

    }

    public function getRequestPaketById($id)
    {
		$this->db->join('tb_user','tb_request_paket.id_user = tb_user.id_user');
		$this->db->join('tb_bus','tb_request_paket.id_bus = tb_bus.id_bus');
		$this->db->join('tb_daftar_paket','tb_request_paket.id_fasilitas = tb_daftar_paket.id_fasilitas');
		$this->db->where('tb_request_paket.id_request_paket',$id);
		return $this->db->get('tb_request_paket')->result();
    }



    public function addRequestPaket()
    {

    }

    public function updateRequestPaket()
    {

    }

    public function deleteRequestPaket($id)
    {
        $this->db->where('id_request_paket', $id)->delete('tb_request_paket');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Data Paket Customize Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Data Paket Customize Gagal Di Hapus'
			];
		}
    }

}

/* End of file ModelName.php */

?>