<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipePembawa extends CI_Controller {

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
            $data['title']='Daftar Tipe Pembawa';
            $data['pointer']="GMD";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['pembawa'] = $this->Master->get_pembawas();
            
            $this->load->view('admin/master/tipe_pembawa',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addTipe() {
        // Get data from the form
        $kode_tipe = $this->input->post('kode_tipe');
        $nama_tipe = $this->input->post('nama_tipe');
        $kode_marc = $this->input->post('kode_marc');
    
        // Check if the kode_gmd already exists
        $tipe_exists = $this->Master->isKodePembawaExists($kode_tipe);
        $nama_exists = $this->Master->isNamaPembawaExists($nama_tipe);

        if ($tipe_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Kode Tipe Isi sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
        if ($nama_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Tipe Isi sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kode_tipe' => $kode_tipe,
            'nama_tipe' => $nama_tipe,
            'kode_marc' => $kode_marc,
            'input_date' => date('Y-m-d')
        );
        $insert_id = $this->Master->addPembawa($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Data Tipe berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan data Tipe.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editTipe($pembawaId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getPembawaById($pembawaId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Tipe Isi tidak ditemukan']));
        }
    }

    public function updateTipe()
    {
        $pembawaId = $this->input->post('id');
        $kode_tipe = $this->input->post('kode_tipe');
        $kode_marc = $this->input->post('kode_marc');
        $nama_tipe = $this->input->post('nama_tipe');

        $this->form_validation->set_rules('kode_tipe', 'Kode Tipe Isi', 'required');
        $this->form_validation->set_rules('nama_tipe', 'Nama Tipe Isi', 'required');

        if ($this->form_validation->run() == FALSE) {
        // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
        );
        echo json_encode($response);
        } else {
    // Check if nama_tipe already exists
            $nama_pembawa_exists = $this->Master->isNamaPembawaExists($nama_tipe);
    
            if ($nama_pembawa_exists) {
                $response = array(
                'status' => 'error',
                'message' => 'Nama Tipe Isi sudah ada sebelumnya.'
            );
            echo json_encode($response);
            } else {
            // Proceed with the update
                $data = array(
                'kode_tipe' => $kode_tipe,
                'nama_tipe' => $nama_tipe,
                'kode_marc' => $kode_marc,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updatePembawaData($pembawaId, $data);

        if ($isUpdateSuccessful) {
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Data Tipe Isi berhasil diubah.'
            );
            echo json_encode($response);
        } else {
            // Return error response if update was not successful
            $response = array(
                'status' => 'error',
                'message' => 'Gagal mengubah data Tipe Isi.'
            );
            echo json_encode($response);
        }
    }
}

    }
    
    public function deleteTipe($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteTipePembawa($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Tipe isi berhasil dihapus.']);
    }
}
?>