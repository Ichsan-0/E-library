<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biblio_model extends CI_Model
{
	public function get_biblios() {
		$data = $this->db->query("SELECT b.id,b.judul,b.cover,(SELECT REPLACE(GROUP_CONCAT(tp.nama_pengarang), ',', ' - ') FROM biblio_pengarang bp JOIN tb_pengarang tp ON bp.id_pengarang=tp.id 
		WHERE bp.id_biblio=b.id) AS nama_pengarang, b.isbn, COUNT(i.id_biblio) AS salin, b.last_update
		FROM bibliografi b left join item i ON i.id_biblio=b.id GROUP BY b.id")->result();
        return $data;
	}
	
	public function get_pengarangs(){
    $data = $this->db->query("SELECT tp.id, tp.nama_pengarang, tp.jenis_kepengarangan AS jenis from tb_pengarang tp")->result();
    return $data;
	}
	public function get_levels(){
		$query = $this->db->get('jenis_pengarang');
		return $query->result();
	}

	public function get_kodes(){
		$query = $this->db->get('kode_eksemplar');
		return $query->result();
	}

	public function get_tipe_koleksi(){
		$query = $this->db->get('tb_tipe_koleksi');
		return $query->result();
	}

	public function addBiblio($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('bibliografi', $data);
    }
	public function save_pengarang($data) {
		// Memasukkan data ke dalam tabel tb_pengarang
		return $this->db->insert('tb_pengarang', $data);
	}
}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */