<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

    public function getBooking()
    {
        return $this->db->get('tb_booking')->result();
    }

    public function getBookingById($id)
    {
        return $this->db->where('id_booking', $id)->get('tb_booking')->row();
    }

    public function getPendingBooking($id_user)
    {
        // $query = $this->db->where('username', $username)
		// 		->where('password', $password)
		// 		->where('role', 'super_admin')
		// 		->get('tb_admin');
        return $this->db->where('id_user', $id_user)
            ->where('status_booking', 'pending')
            ->get('tb_booking')->result();
    }

    public function deletePendingOrder($id_paket_wisata, $kd_booking)
    {
        $this->db->where('id_paket_wisata', $id_paket_wisata);
        $this->db->where('kd_booking', $kd_booking);
        $this->db->delete('tb_booking');
		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Pending Order Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Pending Order Gagal Di Hapus'
			];
		}	
    }

    public function deletePendingOrderCustomize($id_paket_wisata, $kd_booking)
    {
        $this->db->where('id_paket_wisata', $id_paket_wisata)->where('kd_booking', $kd_booking)->delete('tb_booking');
        $this->db->where('id_request_paket', $id_paket_wisata)->delete('tb_request_paket');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Pending Order Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Pending Order Gagal Di Hapus'
			];
		}	
    }
   
    public function addBooking($kategori)
    {
        $id_user = $this->input->post('id_user');
        $id_paket_wisata = $this->input->post('paket_id');
        $nm_paket_wisata = $this->input->post('nm_paket_wisata');
        $booking_date = date('Y-m-d', strtotime('now'));
        $tour_date = date('Y-m-d', strtotime($this->input->post('tanggal_keberangkatan')));
        $id_titik_jemput = $this->input->post('titik_penjemputan');
        $jml_peserta = $this->input->post('jml_peserta');
        $total_harga = $this->input->post('total_bayar');
        $kd_booking = 'KD'.microtime("now");
		$this->session->set_userdata('harga_booking',$total_harga);
        $data = array(
            'id_user' => $id_user,
            'kd_booking' => $kd_booking,
            'id_paket_wisata' => $id_paket_wisata,
            'nm_paket_wisata' => $nm_paket_wisata,
            'booking_date' => $booking_date,
            'tour_date' => $tour_date,
            'id_titik_jemput' => $id_titik_jemput,
            'jml_peserta' => $jml_peserta,
            'total_harga' => $total_harga,
            'status_booking' => 'pending',
            'kategori' => $kategori
        );
        
        $this->db->insert('tb_booking', $data);
		
		$id_booking = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_userdata('id_booking',$id_booking);
            $this->session->set_userdata('kd_booking',$kd_booking);
            return [
                'status' => TRUE,
                'notif' => 'Booking Berhasil Di Tambahkan'
            ];
        }else{
            return [
                'status' => FALSE,
                'notif' => 'Booking Gagal Di Tambahkan'
            ];
        }
    }
	
	public function addBookingCustomize()
    {
        $id_bus = $this->input->post('id_bus');
        $id_hotel = $this->input->post('id_hotel');
        $id_fasilitas = $this->input->post('id_fasilitas');
        $id_objek = $this->input->post('id_objek_wisata');
        $harga = $this->input->post('total_bayar');
		$this->session->set_userdata('harga_booking_customize',$harga);
        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'id_bus' => $id_bus,
            'id_hotel' => $id_hotel,
            'id_fasilitas' => $id_fasilitas,
            'id_objek_wisata' => $id_objek,
            'harga_paket' => $harga,
            'created' => date('YmdHis')
        );

        $this->db->insert('tb_request_paket', $data);
        $id_request = $this->db->insert_id();
		if ($this->db->affected_rows() > 0) {
            return [
                'status' => TRUE,
                'id_request' => $id_request,
                'notif' => 'Paket Berhasil Di Tambahkan'
            ];
        }else{
            return [
                'status' => FALSE,
                'notif' => 'Paket Gagal Di Tambahkan'
            ];
        }
    }
	
	public function addTransaction($id_booking,$kd_booking)
	{
		$trx_data = array(
			'kd_transaksi'	=>	$kd_booking,
			'id_booking'	=>	$id_booking,
			'gambar_bukti'	=>	'null',
			'status'		=>	'Menunggu Validasi Paket'
		);
		$this->db->insert('tb_transaksi', $trx_data);
	}

    public function updateDataBooking($id_booking)
    {
        $data = array(
            'status_booking' => 'pembayaran'
        );
        $this->db->where('id_booking',$id_booking);
        $this->db->update('tb_booking', $data);
    }

    public function addDetailBooking()
    {
        $id_booking = $this->input->post('id_user');
        $id_user = $this->input->post('id_user');
        $nik = $this->input->post('nik_pemesan');
        $alamat = $this->input->post('alamat_pemesan');
        $email = $this->input->post('email_pemesan');
        $no_telepon = $this->input->post('no_telepon');
        $nama = $this->input->post('nama_pemesan');
        $id_booking = $_SESSION['id_booking'];
        $kd_booking = $_SESSION['kd_booking'];
        $data = array(
            'kd_booking' => $kd_booking,
            'id_user' => $id_user,
            'nik' => $nik,
            'alamat' => $alamat,
            'email' => $email,
            'no_telepon' => $no_telepon,
            'nama' => $nama,
        );

        $this->db->insert('tb_detail_booking', $data);
        if ($this->db->affected_rows() > 0) {
            $this->addTransaction($id_booking,$kd_booking);
            $this->updateDataBooking($id_booking);
            return [
                'status' => TRUE,
                'notif' => 'Detail Booking Berhasil Di Tambahkan'
            ];
        }else{
            return [
                'status' => FALSE,
                'notif' => 'Detail Booking Gagal Di Tambahkan'
            ];
        }
        unset($_SESSION['id_booking']);
        unset($_SESSION['kd_booking']);
    }

    public function updateBookinh()
    {

    }

    public function deleteBooking()
    {
        
    }

}

/* End of file ModelName.php */

?>