<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_wisata_model extends CI_Model {

    public function getInfoWisata()
    {
        return $this->db->get('tb_info_wisata')->result();
    }

    public function getNamaWisata()
    {
        return $this->db->distinct()->select('nm_wisata')->get('tb_info_wisata')->result();
    }

    public function getInfoWisataById($id)
    {
        return $this->db->where('id_info_wisata', $id)->get('tb_info_wisata')->row();
    }

    public function addInfoWisata($gambar)
    {
        $nm_wisata = ucwords($this->input->post('nm_wisata'));
        $tempat_wisata = $this->input->post('tempat_wisata');
        $desc = $this->input->post('desc');
		$query = $this->db->where('nm_wisata', $nm_wisata)
			->get('tb_info_wisata');
		if ($query->num_rows() > 0 ) {
			return [
				'status' => FALSE,
				'notif' => 'Data Sudah Ada'
			];
		} else {
			$data = array(
                'nm_wisata' => $nm_wisata,
                'tempat_wisata' => $tempat_wisata,
                'desc' => $desc,
                'gambar' => $gambar['file_name']
			);
	
			$this->db->insert('tb_info_wisata', $data);
	
			if ($this->db->affected_rows() > 0) {
				return [
					'status' => TRUE,
					'notif' => 'Informasi Wisata Berhasil Di Tambahkan'
				];
			}else{
				return [
					'status' => FALSE,
					'notif' => 'Informasi Wisata Gagal Di Tambahkan'
				];
			}
		}
    }

    public function updateInfoWisata($id, $gambar = "")
    {
        $path = $_SERVER['DOCUMENT_ROOT'].'/upload/';
        $checks = $this->getInfoWisataById($id);
        $nm_wisata = ucwords($this->input->post('e_nm_wisata'));
        $tempat_wisata = $this->input->post('e_tempat_wisata');
        $desc = $this->input->post('e_desc');
        $data = array(
            'nm_wisata' => $nm_wisata,
            'tempat_wisata' => $tempat_wisata,
            'desc' => $desc,
        );
        if ($gambar != "") {
            $get_gambar = $this->db->select('gambar')->where('id_info_wisata', $id)->get('tb_info_wisata')->row();
            unlink($path.$get_gambar->gambar);
            $data['gambar'] = $gambar;
        }
        if ($checks->id_info_wisata == $id && $checks->nm_wisata == $nm_wisata) {
            $this->db->where('id_info_wisata', $id)
                     ->update('tb_info_wisata', $data);

            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => TRUE,
                    'notif' => 'Informasi Wisata Berhasil Di Edit'
                ];
            }else{
                return [
                    'status' => FALSE,
                    'notif' => 'Informasi Wisata Gagal Di Edit'
                ];
            }
        } else {
            $query = $this->db->where('nm_wisata', $nm_wisata)
                    ->get('tb_info_wisata');
            if ($query->num_rows() > 0 ) {
                return [
                    'status' => FALSE,
                    'notif' => 'Informasi Wisata Sudah Ada'
                ];
            } else {
                $this->db->where('id_info_wisata', $id)
                        ->update('tb_info_wisata', $data);

                if ($this->db->affected_rows() > 0) {
                    return [
                        'status' => TRUE,
                        'notif' => 'Informasi Wisata Berhasil Di Edit'
                    ];
                }else{
                    return [
                        'status' => FALSE,
                        'notif' => 'Informasi Wisata Gagal Di Edit'
                    ];
                }
            }
        }
    }

    // public function updateInfoWisata($id, $gambar = NULL)
    // {
    //     $path = $_SERVER['DOCUMENT_ROOT'].'/pemesanan_travel/upload/';
    //     $checks = $this->getInfoWisataById($id);
    //     $nm_wisata = ucwords($this->input->post('e_nm_wisata'));
    //     $tempat_wisata = $this->input->post('e_tempat_wisata');
    //     $desc = $this->input->post('e_desc');
    //     $data = array(
    //         'nm_wisata' => $nm_wisata,
    //         'tempat_wisata' => $tempat_wisata,
    //         'desc' => $desc,
    //     );
    //     if ($gambar != NULL) {
    //         $get_gambar = $this->db->select('gambar')->where('id_info_wisata', $id)->get('tb_info_wisata')->row();
    //         unlink($path.$get_gambar->gambar);
    //         $data['gambar'] = $gambar;
    //     }
    //     if ($checks->id_info_wisata == $id && $checks->nm_wisata == $nm_wisata) {
    //         $this->db->where('id_info_wisata', $id)
    //                  ->update('tb_info_wisata', $data);

    //         if ($this->db->affected_rows() > 0) {
    //             return [
    //                 'status' => TRUE,
    //                 'notif' => 'Informasi Wisata Berhasil Di Edit'
    //             ];
    //         }else{
    //             return [
    //                 'status' => FALSE,
    //                 'notif' => 'Informasi Wisata Gagal Di Edit'
    //             ];
    //         }
    //     } else {
    //         $query = $this->db->where('nm_wisata', $nm_wisata)
	// 				->get('tb_info_wisata');
	// 		if ($query->num_rows() > 0 ) {
	// 			return [
	// 				'status' => FALSE,
	// 				'notif' => 'Informasi Wisata Sudah Ada'
	// 			];
	// 		} else {
	// 			$this->db->where('id_info_wisata', $id)
    //                     ->update('tb_info_wisata', $data);

    //             if ($this->db->affected_rows() > 0) {
    //                 return [
    //                     'status' => TRUE,
    //                     'notif' => 'Informasi Wisata Berhasil Di Edit'
    //                 ];
    //             }else{
    //                 return [
    //                     'status' => FALSE,
    //                     'notif' => 'Informasi Wisata Gagal Di Edit'
    //                 ];
    //             }
	// 		}
    //     }
    // }

    public function deleteInfoWisata($id)
    {
        $path = $_SERVER['DOCUMENT_ROOT'].'/upload/';
        $get_gambar = $this->db->select('gambar')->where('id_info_wisata', $id)->get('tb_info_wisata')->row();
        unlink($path.$get_gambar->gambar);
        $this->db->where('id_info_wisata', $id)->delete('tb_info_wisata');

		if ($this->db->affected_rows() > 0) {
			return [
				'status' => TRUE,
				'notif' => 'Informasi Wisata Berhasil Di Hapus'
			];
		}else{
			return [
				'status' => FALSE,
				'notif' => 'Informasi Wisata Gagal Di Hapus'
			];
		}	
    }

}

/* End of file ModelName.php */

?>