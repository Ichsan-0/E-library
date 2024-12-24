<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model
 {

	public function get_gmd() {
		$data = $this->db->query("SELECT id, kode_gmd, nama_gmd, DATE_FORMAT(input_date,'%d-%m-%Y') AS input_date, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_gmd")->result();
        return $data;
	}

	public function addGmd($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_gmd', $data);
    }

    public function isKodeGmdExists($kode_gmd) {
        $query = $this->db->get_where('tb_gmd', array('kode_gmd' => $kode_gmd));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isNamaGmdExists($nama_gmd) {
        $query = $this->db->get_where('tb_gmd', array('nama_gmd' => $nama_gmd));
        $result = $query->result();
        return (count($result) > 0);
    }

	public function getGmdById($gmdId) {
        // Replace 'gmd' with the actual table name and 'id' with the column name representing the ID
        $query = $this->db->get_where('tb_gmd', ['id' => $gmdId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }
    public function getTipeById($tipeId) {
        
        $query = $this->db->get_where('tb_tipe_isi', ['id' => $tipeId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getPembawaById($pembawaId) {
        
        $query = $this->db->get_where('tb_tipe_pembawa', ['id' => $pembawaId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getPenerbitById($penerbitId) {
        
        $query = $this->db->get_where('tb_penerbit', ['id' => $penerbitId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getAgenById($agenId) {
        $query = $this->db->get_where('tb_agen', ['id' => $agenId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getSubyekById($id) {
        $query = $this->db->get_where('tb_subyek', ['id' => $id]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getRujukById($rujukId) {
        $query = $this->db->get_where('tb_rujukan_silang', ['id' => $rujukId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getLokasiById($lokasiId) {
        $query = $this->db->get_where('tb_lokasi', ['id' => $lokasiId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getRakById($rakId) {
        $query = $this->db->get_where('tb_rak', ['id' => $rakId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getTempatById($tempatId) {
        $query = $this->db->get_where('tb_tempat', ['id' => $tempatId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getStatusById($statusId) {
        $query = $this->db->get_where('tb_status_eksemplar', ['id' => $statusId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getBahasaById($bahasaId) {
        $query = $this->db->get_where('tb_bahasa', ['id' => $bahasaId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getKalaTerbitById($terbitId) {
        $query = $this->db->get_where('tb_kala_terbit', ['id' => $terbitId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getKodeById($kodeId) {
        $query = $this->db->get_where('kode_eksemplar', ['id' => $kodeId]);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

	public function updateGmdData($gmdId, $data)
    {
    // Assuming you have a table in your database named 'gmd' to store GMD data       
    $this->db->where('id', $gmdId);
    $this->db->update('tb_gmd', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateTipeData($tipeId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $tipeId);
    $this->db->update('tb_tipe_isi', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updatePembawaData($pembawaId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $pembawaId);
    $this->db->update('tb_tipe_pembawa', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateMediaData($mediaId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $mediaId);
    $this->db->update('tb_tipe_media', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updatePenerbitData($penerbitId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $penerbitId);
    $this->db->update('tb_penerbit', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateAgenData($agenId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $agenId);
    $this->db->update('tb_agen', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updatePengarangData($pengarangId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $pengarangId);
    $this->db->update('tb_pengarang', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateSubyekData($subyekId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $subyekId);
    $this->db->update('tb_subyek', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateRujukData($rujukId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $rujukId);
    $this->db->update('tb_rujukan_silang', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateLokasiData($lokasiId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $lokasiId);
    $this->db->update('tb_lokasi', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateRakData($rakId, $data)
    {
        $this->db->where('id', $rakId);
        $this->db->update('tb_rak', $data);
        return $this->db->affected_rows() > 0;
    }

    public function updateTempatData($tempatId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $tempatId);
    $this->db->update('tb_tempat', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateStatusData($statusId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $statusId);
    $this->db->update('tb_status_eksemplar', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateTipeKoleksiData($tipeId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $tipeId);
    $this->db->update('tb_tipe_koleksi', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateBahasaData($bahasaId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $bahasaId);
    $this->db->update('tb_bahasa', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateKalaTerbitData($terbitId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $terbitId);
    $this->db->update('tb_kala_terbit', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateKodeData($kodeId, $data)
    {
    // Assuming you have a table in your database named 'tipe_isi' to store GMD data       
    $this->db->where('id', $kodeId);
    $this->db->update('kode_eksemplar', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function updateLabel($labelId, $data)
    {      
    $this->db->where('id', $labelId);
    $this->db->update('label', $data);
    // Check if the update was successful
    return $this->db->affected_rows() > 0;
    }

    public function isGmdExistsUpdate($kodeGmd, $gmdId)
    {
    $this->db->where('kode_gmd', $kodeGmd);
    $this->db->where_not_in('id', $gmdId);
    $query = $this->db->get('tb_gmd');
    return $query->num_rows() > 0;
    }
    
	public function deleteGmdData($id)
    {
        $this->db->where('id', $id)->delete('tb_gmd');
    }
    public function deletePenerbit($id)
    {
        $this->db->where('id', $id)->delete('tb_penerbit');
    }

    public function deleteTipeData($id)
    {
        $this->db->where('id',$id)->delete('tb_tipe_isi');
    }

    public function deleteTipeMedia($id)
    {
        $this->db->where('id',$id)->delete('tb_tipe_media');
    }
    public function deleteTipePembawa($id)
    {
        $this->db->where('id',$id)->delete('tb_tipe_pembawa');
    }
    public function deleteAgen($id)
    {
        $this->db->where('id',$id)->delete('tb_agen');
    }

    public function deletePengarang($id)
    {
        $this->db->where('id',$id)->delete('tb_pengarang');
    }

    public function deleteSubyek($id)
    {
        $this->db->where('id',$id)->delete('tb_subyek');
    }

    public function deleteRujuk($id)
    {
        $this->db->where('id',$id)->delete('tb_rujukan_silang');
    }

    public function deleteLokasi($id)
    {
        $this->db->where('id',$id)->delete('tb_lokasi');
    }

    public function deleteRak($id)
    {
        $this->db->where('id',$id)->delete('tb_rak');
    }

    public function deleteTempat($id)
    {
        $this->db->where('id',$id)->delete('tb_tempat');
    }
    public function deleteStatus($id)
    {
        $this->db->where('id',$id)->delete('tb_status_eksemplar');
    }
    public function deleteTipeKoleksi($id)
    {
        $this->db->where('id',$id)->delete('tb_tipe_koleksi');
    }

    public function deleteBahasa($id)
    {
        $this->db->where('id',$id)->delete('tb_bahasa');
    }

    public function deleteTerbit($id)
    {
        $this->db->where('id',$id)->delete('tb_kala_terbit');
    }

    public function deleteLabel($labelId)
    {
        // Ambil nama gambar lama
        $old_image = $this->getOldLabel($labelId);

        // Hapus data label
        $this->db->where('id', $labelId)->delete('label');

        // Jika ada gambar lama, hapus gambar
        if ($old_image) {
            $image_path = 'images/labels/' . $old_image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    }

    public function deleteKode($id)
    {
        $this->db->where('id',$id)->delete('kode_eksemplar');
    }


    public function get_tipes() {
		$data = $this->db->query("SELECT id, kode_tipe, nama_tipe, kode_marc,DATE_FORMAT(input_date,'%d-%m-%Y') AS input_date, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_tipe_isi")->result();
        return $data;
	}

    public function get_agens() {
		$data = $this->db->query("SELECT id, nama_penyuplai, alamat, nomer_telepon, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_agen")->result();
        return $data;
	}

    public function get_pembawas() {
		$data = $this->db->query("SELECT id, kode_tipe, nama_tipe, kode_marc,DATE_FORMAT(input_date,'%d-%m-%Y') AS input_date, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_tipe_pembawa")->result();
        return $data;
	}

    public function get_penerbits() {
		$data = $this->db->query("SELECT id, nama_penerbit, DATE_FORMAT(input_date,'%d-%m-%Y') AS input_date, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_penerbit")->result();
        return $data;
	}

    public function get_status() {
		$data = $this->db->query("SELECT id, kode_status, nama_status, case when ts.aturan=1 then 'Tidak Ada Transaksi Peminjaman' when ts.aturan=2 then 'Lewatkan ketika Inventarisasi' end as aturan, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_status_eksemplar ts")->result();
        return $data;
	}


    public function get_pengarangs() {
		$data = $this->db->query("SELECT tp.id,case when tp.jenis_kepengarangan=1 then 'Nama Orang' when tp.jenis_kepengarangan=2 then 'Badan Organisasi' 
        ELSE 'Konferensi' end AS jenis_kepengarangan, tp.nama_pengarang, tp.tahun_lahir, tp.daftar_terkendali, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_pengarang tp")->result();
        return $data;
	}

    public function get_subyeks() {
		$data = $this->db->query("SELECT ts.id, ts.subyek, ts.kode, 
        case when ts.tipe_subyek=1 then 'Topik' when ts.tipe_subyek=2 then 'Geografis'
        when ts.tipe_subyek=3 then 'Nama' when ts.tipe_subyek=4 then 'Masa'
        when ts.tipe_subyek=5 then 'Aliran' when ts.tipe_subyek=6 then 'Pekerjaan' END AS tipe_subyek
        ,ts.daftar_terkendali, DATE_FORMAT(ts.last_update,'%d-%m-%Y') AS last_update FROM tb_subyek ts")->result();
        return $data;
	}

    public function get_rujuks() {
		$data = $this->db->query("SELECT id, kode, penjelasan,DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_rujukan_silang")->result();
        return $data;
	}

    public function get_lokasis() {
		$data = $this->db->query("SELECT id, kode_lokasi, nama_lokasi,DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_lokasi")->result();
        return $data;
	}

    public function get_rak() {
		$data = $this->db->query("SELECT id, kode_rak, nama_rak,DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_rak")->result();
        return $data;
	}


    public function get_tempats() {
		$data = $this->db->query("SELECT id, nama_tempat, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_tempat")->result();
        return $data;
	}

    public function get_tkoleksi() {
		$data = $this->db->query("SELECT id, tipe_koleksi, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_tipe_koleksi")->result();
        return $data;
	}

    public function get_bahasas() {
		$data = $this->db->query("SELECT id,kode_bahasa, nama_bahasa, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_bahasa")->result();
        return $data;
	}

    public function get_terbits() {
		$data = $this->db->query("SELECT tk.id, tk.kala_terbit, tb.nama_bahasa, tk.selang_waktu, tk.satuan_waktu, DATE_FORMAT(tk.last_update,'%d-%m-%Y') AS last_update
        from tb_kala_terbit tk JOIN tb_bahasa tb ON tk.id_bahasa=tb.id")->result();
        return $data;
	}

    public function get_labels() {
		$data = $this->db->query("SELECT id,nama_label, deskripsi_label, gambar, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM label")->result();
        return $data;
	}

    public function get_kodes() {
		$data = $this->db->query("SELECT id,prefiks, sufiks, panjang, pola, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM kode_eksemplar")->result();
        return $data;
	}

    public function addTipe($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_tipe_isi', $data);
    }

    public function addPembawa($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_tipe_pembawa', $data);
    }

    public function isKodeTipeExists($kode_tipe) {
        $query = $this->db->get_where('tb_tipe_isi', array('kode_tipe' => $kode_tipe));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isNamaTipeExists($nama_tipe) {
        $query = $this->db->get_where('tb_tipe_isi', array('nama_tipe' => $nama_tipe));
        $result = $query->result();
        return (count($result) > 0);
    }
    public function isNamaPenerbitExists($nama_penerbit) {
        $query = $this->db->get_where('tb_penerbit', array('nama_penerbit' => $nama_penerbit));
        $result = $query->result();
        return (count($result) > 0);
    }
    public function isNotlpPenyuplaiExists($nomer_telepon) {
        $query = $this->db->get_where('tb_agen', array('nomer_telepon' => $nomer_telepon));
        $result = $query->result();
        return (count($result) > 0);
    }
    public function isKodePembawaExists($kode_tipe) {
        $query = $this->db->get_where('tb_tipe_pembawa', array('kode_tipe' => $kode_tipe));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isNamaPembawaExists($nama_tipe) {
        $query = $this->db->get_where('tb_tipe_pembawa', array('nama_tipe' => $nama_tipe));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isPenerbitExists($nama_penerbit) {
        $query = $this->db->get_where('tb_penerbit', array('nama_penerbit' => $nama_penerbit));
        $result = $query->result();
        return (count($result) > 0);
    }
    public function isPengarangExists($nama_pengarang) {
        $query = $this->db->get_where('tb_pengarang', array('nama_pengarang' => $nama_pengarang));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isSubyekExists($subyek) {
        $query = $this->db->get_where('tb_subyek', array('subyek' => $subyek));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isRujukanExists($kode) {
        $query = $this->db->get_where('tb_rujukan_silang', array('kode' => $kode));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isKodeLokasiExists($kode_lokasi) {
        $query = $this->db->get_where('tb_lokasi', array('kode_lokasi' => $kode_lokasi));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isNamaLokasiExists($nama_lokasi) {
        $query = $this->db->get_where('tb_lokasi', array('nama_lokasi' => $nama_lokasi));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isKodeRakExists($kode_rak) {
        $query = $this->db->get_where('tb_rak', array('kode_rak' => $kode_rak));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isNamaRakExists($nama_rak){
        $query = $this->db->get_where('tb_rak', array('nama_rak'=> $nama_rak));
        $result = $query->result();
        return (count($result)>0);
    }

    public function isNamaTempatExists($nama_tempat) {
        $query = $this->db->get_where('tb_tempat', array('nama_tempat' => $nama_tempat));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isNamaStatusExists($nama_status) {
        $query = $this->db->get_where('tb_status_eksemplar', array('nama_status' => $nama_status));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isKalaTerbitExists($kala_terbit) {
        $query = $this->db->get_where('tb_kala_terbit', array('kala_terbit' => $kala_terbit));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isNamaLabelExists($nama_label) {
        $query = $this->db->get_where('label', array('nama_label' => $nama_label));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function get_medias() {
		$data = $this->db->query("SELECT id, kode_media, nama_media, kode_marc, DATE_FORMAT(input_date,'%d-%m-%Y') AS input_date, DATE_FORMAT(last_update,'%d-%m-%Y') AS last_update FROM tb_tipe_media")->result();
        return $data;
	}

    public function isKodeMediaExists($kode_media) {
        $query = $this->db->get_where('tb_tipe_media', array('kode_media' => $kode_media));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isNamaMediaExists($nama_media) {
        $query = $this->db->get_where('tb_tipe_media', array('nama_media' => $nama_media));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function istipeKoleksiExists($tipe_koleksi) {
        $query = $this->db->get_where('tb_tipe_koleksi', array('tipe_koleksi' => $tipe_koleksi));
        $result = $query->result();
        return (count($result) > 0);
    }
    public function isNamaBahasaExists($nama_bahasa) {
        $query = $this->db->get_where('tb_bahasa', array('nama_bahasa' => $nama_bahasa));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function isPolaExists($pola) {
        $query = $this->db->get_where('kode_eksemplar', array('pola' => $pola));
        $result = $query->result();
        return (count($result) > 0);
    }

    public function addMedia($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_tipe_media', $data);
    }
    public function addPenerbit($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_penerbit', $data);
    }

    public function addPengarang($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_pengarang', $data);
    }
    public function addSubyek($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_subyek', $data);
    }
    public function addRujuk($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_rujukan_silang', $data);
    }

    public function addStatus($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_status_eksemplar', $data);
    }

    public function addLokasi($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_lokasi', $data);
    }

    public function addRak($data){
        return $this->db->insert('tb_rak',$data);
    }

    public function addTempat($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_tempat', $data);
    }

    public function addTipeKoleksi($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_tipe_koleksi', $data);
    }
    public function addBahasa($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_bahasa', $data);
    }

    public function addLabel($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('label', $data);
    }


    public function addKalaTerbit($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('tb_kala_terbit', $data);
    }

    public function addKode($data) {
        // Insert data into the tb_gmd table
        return $this->db->insert('kode_eksemplar', $data);
    }
    
    public function getMediaById($mediaId) {
        // Replace 'gmd' with the actual table name and 'id' with the column name representing the ID
        $query = $this->db->get_where('tb_tipe_media', ['id' => $mediaId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getPengarangById($pengarangId) {
        // Replace 'gmd' with the actual table name and 'id' with the column name representing the ID
        $query = $this->db->get_where('tb_pengarang', ['id' => $pengarangId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getKoleksiById($tipeId) {
        // Replace 'gmd' with the actual table name and 'id' with the column name representing the ID
        $query = $this->db->get_where('tb_tipe_koleksi', ['id' => $tipeId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getLabelById($labelId) {
        // Replace 'gmd' with the actual table name and 'id' with the column name representing the ID
        $query = $this->db->get_where('label', ['id' => $labelId]);

        // Check if the GMD data is found
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function getOldLabel($labelId)
    {
        $this->db->select('gambar');
        $this->db->where('id', $labelId);
        $query = $this->db->get('label'); // Ganti 'label_table' dengan nama tabel yang sesuai

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->gambar;
        } else {
            return false; // Jika tidak ditemukan gambar
        }
    }
    
}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */