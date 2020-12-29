<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model 
{
	private $table = 'tb_transaksi';
	private $id = 'id_transaksi';
	private $order = 'DESC';
	
	public function getTransaction($id,$type)
	{
		$this->db->join('tb_booking','tb_booking.id_booking = tb_transaksi.id_booking');
		$this->db->where('tb_booking.id_user',$id);
		if($type=='trx'){
			$this->db->where('tb_transaksi.status !=','Selesai');
			$this->db->where('tb_transaksi.status !=','Dibatalkan');
		} else if($type=='history'){
			$this->db->where("tb_transaksi.status='Selesai' OR tb_transaksi.status='Dibatalkan'");
		}
		return $this->db->get($this->table)->result();
	}

	public function getDataOrder($id, $type)
	{
		$this->db->join('tb_booking', 'tb_booking.id_booking = tb_transaksi.id_booking');
		$this->db->where('tb_booking.id_user', $id);
		if($type=='trx'){
			$this->db->where('tb_transaksi.status !=','Selesai');
			$this->db->where('tb_transaksi.status !=','Dibatalkan');
		} else if($type=='history'){
			$this->db->where("tb_transaksi.status='Selesai' OR tb_transaksi.status='Dibatalkan'");
		}
		return $this->db->get('tb_transaksi')->result();
	}
	
	public function getTransactionById($id)
	{
		$this->db->join('tb_booking','tb_booking.id_booking = tb_transaksi.id_booking');
		$this->db->where('tb_transaksi.id_transaksi',$id);
		return $this->db->get($this->table)->row();
	}

	public function getBookingById($id)
    {
        return $this->db->where('id_booking', $id)->get('tb_booking')->row();
    }
	
	public function getTransactionAdmin($type)
	{
		$this->db->join('tb_booking','tb_booking.id_booking = tb_transaksi.id_booking');
		$this->db->join('tb_detail_booking','tb_detail_booking.kd_booking = tb_booking.kd_booking');
		if($type=='trx'){
			$this->db->where('tb_transaksi.status !=','Selesai');
			$this->db->where('tb_transaksi.status !=','Dibatalkan');
		} else if ($type=='history') {
			$this->db->where("tb_transaksi.status='Selesai' OR tb_transaksi.status='Dibatalkan'");
		}
		return $this->db->get($this->table)->result();
	}
	
	public function getTransactionFilter($start,$end)
	{
		$this->db->join('tb_booking','tb_booking.id_booking = tb_transaksi.id_booking');
		$this->db->join('tb_detail_booking','tb_detail_booking.kd_booking = tb_booking.kd_booking');
		$this->db->join('tb_titik_jemput','tb_booking.id_titik_jemput = tb_titik_jemput.id_titik_jemput');
		$this->db->join('tb_kantor_cabang','tb_titik_jemput.id_kantor_cabang = tb_kantor_cabang.id_kantor_cabang');
		$this->db->where("tb_booking.booking_date between '".$start."' and '".$end."' + interval 1 day");
		return $this->db->get($this->table)->result();
	}

	public function getEmailData($idtransaction){
		$this->db->select('tb_booking.total_harga, tb_user.email,
				 tb_transaksi.kd_transaksi,
				 tb_detail_booking.nama');
		$this->db->join('tb_booking','tb_booking.id_booking = tb_transaksi.id_booking');
		$this->db->join('tb_user','tb_user.id_user = tb_booking.id_user');
		$this->db->join('tb_detail_booking','tb_detail_booking.kd_booking = tb_transaksi.kd_transaksi');
		$this->db->where("tb_transaksi.id_transaksi", $idtransaction);
		return $this->db->get($this->table)->row();
	}

	public function getInvoiceData($id) {
		$this->db->select('tb_booking.total_harga, tb_user.email,
				 tb_transaksi.kd_transaksi,
				 tb_detail_booking.nama, tb_detail_booking.alamat, tb_booking.kategori,
				 tb_booking.nm_paket_wisata');
		$this->db->join('tb_booking','tb_booking.id_booking = tb_transaksi.id_booking');
		$this->db->join('tb_user','tb_user.id_user = tb_booking.id_user');
		$this->db->join('tb_detail_booking','tb_detail_booking.kd_booking = tb_transaksi.kd_transaksi');
		$this->db->where("tb_transaksi.id_transaksi", $id);
		return $this->db->get($this->table)->row();
	}
	
	public function updateStatus($id,$status)
	{
		$data = array(
				'status' => $status
		);
		$this->db->where('id_transaksi',$id);
		$this->db->update('tb_transaksi', $data);
		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Transaction Berhasil Di Update'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Transaction Gagal Di Update'
			];
		}
	}
	
	public function cancelTransaction($id,$type)
	{
		$data = array(
				'status' => 'Dibatalkan'
		);
		if($type=='trx'){
			$this->db->where('id_transaksi',$id);
			$this->db->update('tb_transaksi', $data);
		}
	}
	
	public function deleteTransaction($id,$kd_booking)
	{
		$this->db->where('id_transaksi',$id);
		$this->db->delete($this->table);
		
		$this->db->where('kd_booking',$kd_booking);
		$this->db->delete('tb_booking');
		
		$this->db->where('kd_booking',$kd_booking);
		$this->db->delete('tb_detail_booking');
		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Transaction Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Transaction Gagal Di Hapus'
			];
		}
	}
	
	public function uploadBukti($idtransaction,$gambar,$type)
	{
		$data = array(
                'gambar_bukti' => $gambar['file_name'],
				'status' => 'Menunggu Verifikasi'
		);
		if($type=='trx'){
			$this->db->where('id_transaksi',$idtransaction);
			$this->db->update('tb_transaksi', $data);
		}
	
		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE
			];
		}else{
			return [
				'status' => FALSE
			];
		}
	}

	public function data_transaksi($type) {
		$this->db->select('tb_transaksi.id_transaksi, tb_transaksi.kd_transaksi, 
						tb_booking.id_paket_wisata,tb_booking.nm_paket_wisata, tb_detail_booking.nama,
						tb_titik_jemput.titik_jemput, tb_kantor_cabang.nama_kota,
						tb_booking.booking_date, tb_booking.tour_date, tb_booking.jml_peserta,
						tb_booking.total_harga, tb_transaksi.gambar_bukti, tb_transaksi.status, tb_booking.kategori, tb_transaksi.gambar_bukti');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_booking','tb_booking.kd_booking = tb_transaksi.kd_transaksi');
		$this->db->join('tb_titik_jemput','tb_booking.id_titik_jemput = tb_titik_jemput.id_titik_jemput');
		$this->db->join('tb_kantor_cabang','tb_titik_jemput.id_kantor_cabang = tb_kantor_cabang.id_kantor_cabang');
		$this->db->join('tb_detail_booking','tb_booking.kd_booking = tb_detail_booking.kd_booking');
		if($type=='trx'){
			$this->db->where('tb_transaksi.status !=','Selesai');
			$this->db->where('tb_transaksi.status !=','Dibatalkan');
		} else if ($type=='history') {
			$this->db->where("tb_transaksi.status='Selesai' OR tb_transaksi.status='Dibatalkan'");
		}
		$query = $this->db->get(); 
		if($query->num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function getTransactionMenungguPembayaran() 
	{
		$query = $this->db->where('status', 'Menunggu Pembayaran')
				->get('tb_transaksi')->result();
		return count($query);
	}

	public function getTransactionSelesai() 
	{
		$query = $this->db->where('status', 'Selesai')
				->get('tb_transaksi')->result();
		return count($query);
	}
	public function getTransactionDalamProses() 
	{
		$query = $this->db->where('status', 'Proses')
				->get('tb_transaksi')->result();
		return count($query);
	}

	public function checkKategoriBooking($id)
	{
		$this->db->from('tb_transaksi');
		$this->db->join('tb_booking','tb_booking.kd_booking = tb_transaksi.kd_transaksi');
		$this->db->where("tb_transaksi.id_transaksi", $id);
		$query = $this->db->get(); 
		if($query->num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function dataChart(){
		$firstDate = date('Y-m-d', strtotime('first day of january this year'));
		$lastDate = date('Y-m-d', strtotime('last day of december this year'));
		$this->db->from('tb_transaksi');
		$this->db->join('tb_booking','tb_booking.kd_booking = tb_transaksi.kd_transaksi');
		$this->db->where('tb_transaksi.status','Selesai');
		$this->db->where('tb_booking.booking_date >=', $firstDate);
		$this->db->where('tb_booking.booking_date <=', $lastDate);
		$query = $this->db->get(); 
		if($query->num_rows() != 0)
		{
			$results = $query->result();
			$dataArr = [];
			for ($m=1; $m<=12; $m++) {
				$dataArr['month'][] = date('F', mktime(0,0,0,$m, 1, date('Y')));
			}
			foreach($results as $result) {
				$i = 0;
				foreach($dataArr['month'] as $month) {
					if(empty($dataArr['value'][$i])){
						$dataArr['value'][$i] = 0;
					}
					if (date('F', strtotime($result->booking_date)) == $month) {
						$dataArr['value'][$i] += $result->total_harga;
					}
					$i++;
				}
			}
			return $dataArr;
		}
		else
		{
			return false;
		}
	}

	public function filterLaporan($startdate = '', $enddate = '')
	{
		if ($startdate == '' && $enddate == '') {
			$startdate = date('Y-m-d', strtotime('first day of january this year'));
			$enddate = date('Y-m-d', strtotime('last day of december this year'));
		}
		$this->db->from('tb_transaksi');
		$this->db->join('tb_booking','tb_booking.kd_booking = tb_transaksi.kd_transaksi');
		$this->db->join('tb_detail_booking','tb_detail_booking.kd_booking = tb_booking.kd_booking');
		$this->db->join('tb_titik_jemput','tb_titik_jemput.id_titik_jemput = tb_booking.id_titik_jemput');
		$this->db->join('tb_kantor_cabang','tb_kantor_cabang.id_kantor_cabang = tb_titik_jemput.id_kantor_cabang');
		$this->db->where('tb_transaksi.status','Selesai');
		$this->db->where('tb_booking.booking_date >=', $startdate);
		$this->db->where('tb_booking.booking_date <=', $enddate);
		$query = $this->db->get(); 
		if($query->num_rows() != 0)
		{
			$results = $query->result();
			$dataArr = [];
			$i = 0;
			foreach($results as $res) {
				if(empty($dataArr['total'])){
					$dataArr['total'] = 0;
				}
				$dataArr['result'][] = $res;
				$dataArr['total'] += $res->total_harga;
			}
			return $dataArr;
		}
		else
		{
			return false;
		}
	}

}