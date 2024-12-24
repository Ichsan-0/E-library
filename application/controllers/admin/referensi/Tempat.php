<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tempat extends CI_Controller {

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
            $data['title']='Daftar Tempat';
            $data['pointer']="Tempat";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['tempat'] = $this->Master->get_tempats();
            
            $this->load->view('admin/referensi/tempat',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addTempat() {
        // Get data from the form
        $nama_tempat = $this->input->post('nama_tempat');
    
        // Check if the kode_gmd already exists
        $nama_exists = $this->Master->isNamaTempatExists($nama_tempat);

        if ($nama_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Tempat sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'nama_tempat' => $nama_tempat,
            'last_update'    => date('Y-m-d')
        );
        $insert_id = $this->Master->addTempat($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Nama Tempat berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Tempat.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editTempat($tempatId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getTempatById($tempatId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }

    public function updateTempat()
    {
        $tempatId = $this->input->post('id');
        $nama_tempat = $this->input->post('nama_tempat');
        
        $this->form_validation->set_rules('nama_tempat', 'Nama Tempat', 'required');

        if ($this->form_validation->run() == FALSE) {
        // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
        );
        echo json_encode($response);
        } else {
    // Check if nama_tipe already exists
            $nama_tempat_exists = $this->Master->isNamaTempatExists($nama_tempat);
    
            if ($nama_tempat_exists) {
                $response = array(
                'status' => 'error',
                'message' => 'Nama Tempat sudah ada sebelumnya.'
            );
            echo json_encode($response);
            } else {
            // Proceed with the update
                $data = array(
                'nama_tempat' => $nama_tempat,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateTempatData($tempatId, $data);

        if ($isUpdateSuccessful) {
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Data Tempat berhasil diubah.'
            );
            echo json_encode($response);
        } else {
            // Return error response if update was not successful
            $response = array(
                'status' => 'error',
                'message' => 'Gagal mengubah data Tempat.'
            );
            echo json_encode($response);
        }
    }
}

    }
    
    public function deleteTempat($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteTempat($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Tempat berhasil dihapus.']);
    }
}
?>