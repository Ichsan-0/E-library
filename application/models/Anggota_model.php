<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota_model extends CI_Model
 {
    public function get_tipe_anggota() {
		$data = $this->db->query("SELECT id, nama_tipe, jumlah_pinjaman, concat(masa_keanggotaan,' hari') AS masa_keanggotaan ,kali_perpanjangan ,DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_tipe_anggota")->result();
        return $data;
	}

    public function isNamaTipeExists($nama_tipe) {
        $query = $this->db->get_where('tb_tipe_anggota', array('nama_tipe' => $nama_tipe));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function addTipe($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_tipe_anggota', $data);
    }

    public function deleteTipeAnggota($id)
    {
        $this->db->where('id', $id)->delete('tb_tipe_anggota');
    }

    public function getTipeById($tipeId) {
        // Replace 'gmd' with the actual table name and 'id' with the column name representing the ID
        $query = $this->db->get_where('tb_tipe_anggota', ['id' => $tipeId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function updateTipeData($tipeId, $data)
    {
    // Assuming you have a table in your database named 'gmd' to store GMD data       
    $this->db->where('id', $tipeId);
    $this->db->update('tb_tipe_anggota', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }
 }