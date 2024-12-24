<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            //$this->Security_model->login_check();

            $this->load->model(array(
                'Master_model' => 'Master'
            ));

        }
    public function index()
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data['title']='Daftar Lokasi & Rak';
            $data['pointer']="GMD";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['lokasi'] = $this->Master->get_lokasis();
            $tmp['rak'] = $this->Master->get_rak();
            
            $this->load->view('admin/master/lokasi',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addLokasi() {
        // Get data from the form
        $kode_lokasi = $this->input->post('kode_lokasi');
        $nama_lokasi = $this->input->post('nama_lokasi');
    
        // Check if the kode_gmd already exists
        $kode_exists = $this->Master->isKodeLokasiExists($kode_lokasi);
        $nama_exists = $this->Master->isNamaLokasiExists($nama_lokasi);

        if ($kode_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Kode Lokasi sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
        if ($nama_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Lokasi sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kode_lokasi' => $kode_lokasi,
            'nama_lokasi' => $nama_lokasi,
            'last_update' => date('Y-m-d')
        );
        $insert_id = $this->Master->addLokasi($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Data Lokasi berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan data Lokasi.'
            );
            echo json_encode($response);
        }
        }
    }

    public function addRak(){
        $kode_rak = $this->input->post('kode_rak');
        $nama_rak = $this->input->post('nama_rak');

        $kode_rak_exists = $this->Master->isKodeRakExists($kode_rak);
        $nama_rak_exists = $this->Master->isNamaRakExists($nama_rak);

        if ($kode_rak_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Kode Rak sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
        if ($nama_rak_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Rak sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kode_rak' => $kode_rak,
            'nama_rak' => $nama_rak,
            'last_update' => date('Y-m-d')
        );
        $insert_id = $this->Master->addRak($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Data Rak berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan data Rak.'
            );
            echo json_encode($response);
        }
        }
    }

    
    public function editLokasi($lokasiId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $mediaData = $this->Master->getLokasiById($lokasiId);

        // Check if the GMD data is found
        if ($mediaData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($mediaData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Tipe Media tidak ditemukan']));
        }
    }

    public function editRak($rakId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $mediaData = $this->Master->getRakById($rakId);

        // Check if the GMD data is found
        if ($mediaData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($mediaData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Tipe Media tidak ditemukan']));
        }
    }

    public function updateLokasi()
    {
        $lokasiId = $this->input->post('id');
        $kode_lokasi = $this->input->post('kode_lokasi');
        $nama_lokasi = $this->input->post('nama_lokasi');

        $this->form_validation->set_rules('kode_lokasi', 'Kode Tipe Media', 'required');
        $this->form_validation->set_rules('nama_lokasi', 'Nama Tipe Media', 'required',array('required' => 'Data Nama Lokasi tidak boleh kosong'));

        if ($this->form_validation->run() == FALSE) {
        // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
        );
        echo json_encode($response);
        } else {
        // Check if nama_tipe already exist
            // Proceed with the update
                $data = array(
                'kode_lokasi' => $kode_lokasi,
                'nama_lokasi' => $nama_lokasi,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateLokasiData($lokasiId, $data);

        if ($isUpdateSuccessful) {
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Data Lokasi berhasil diubah.'
            );
            echo json_encode($response);
        } else {
            // Return error response if update was not successful
            $response = array(
                'status' => 'error',
                'message' => 'Gagal mengubah data Tipe Lokasi.'
            );
            echo json_encode($response);
        }
    }
    }
    
    public function updateRak()
    {
        $rakId = $this->input->post('id');
        $kode_rak = $this->input->post('kode_rak');
        $nama_rak = $this->input->post('nama_rak');

        $this->form_validation->set_rules('kode_rak', 'Kode Rak', 'required');
        $this->form_validation->set_rules('nama_rak', 'Nama Rak', 'required',array('required' => 'Data Nama Rak tidak boleh kosong'));

        if ($this->form_validation->run() == FALSE) {
        // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
        );
        echo json_encode($response);
        } else {
                $data = array(
                'kode_rak' => $kode_rak,
                'nama_rak' => $nama_rak,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateRakData($rakId, $data);

        if ($isUpdateSuccessful) {
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Data Rak Buku berhasil diubah.'
            );
            echo json_encode($response);
        } else {
            // Return error response if update was not successful
            $response = array(
                'status' => 'error',
                'message' => 'Gagal mengubah data Rak Buku.'
            );
            echo json_encode($response);
        }
    }
    }
    public function deleteLokasi($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteLokasi($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Lokasi berhasil dihapus.']);
    }
    public function deleteRak($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteRak($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Rak berhasil dihapus.']);
    }
}
?>