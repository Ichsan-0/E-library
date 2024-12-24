<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subyek extends CI_Controller {

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
            $data['title']='Daftar Subyek & Rujukan Silang';
            $data['pointer']="Subyek";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['subyek'] = $this->Master->get_subyeks();
            $tmp['rujukan'] = $this->Master->get_rujuks();
            
            $this->load->view('admin/master/subyek',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addSubyek() {
        // Get data from the form
        $subyek              = $this->input->post('subyek');
        $kode                = $this->input->post('kode');
        $tipe_subyek         = $this->input->post('tipe_subyek');
        $daftar_terkendali   = $this->input->post('daftar_terkendali');
    
        // Check if the kode_gmd already exists
        $subyek_exists = $this->Master->isSubyekExists($subyek);

        if ($subyek_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Subyek sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'subyek'             => $subyek,
            'kode'               => $kode,
            'tipe_subyek'        => $tipe_subyek,
            'daftar_terkendali'  => $daftar_terkendali,
            'last_update'        => date('Y-m-d')
        );
        $insert_id = $this->Master->addSubyek($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Nama Subyek berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Subyek.'
            );
            echo json_encode($response);
        }
    }
    }
    
    public function editSubyek($subyekId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getSubyekById($subyekId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Subyek tidak ditemukan']));
        }
    }

    public function updateSubyek()
    {
        $subyekId = $this->input->post('id');
        $subyek = $this->input->post('subyek');
        $kode = $this->input->post('kode');
        $tipe_subyek = $this->input->post('tipe_subyek');
        $daftar_terkendali = $this->input->post('daftar_terkendali');
        
        $this->form_validation->set_rules('subyek', 'Subyek', 'required');

        if ($this->form_validation->run() == FALSE) {
        // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
        );
        echo json_encode($response);
        } else {
            // Proceed with the update
                $data = array(
                'subyek'              => $subyek,
                'kode'                => $kode,
                'tipe_subyek'         => $tipe_subyek,
                'daftar_terkendali'   => $daftar_terkendali,
                'last_update'         => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateSubyekData($subyekId, $data);

        if ($isUpdateSuccessful) {
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Data Subyek berhasil diubah.'
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
    
    public function deleteSubyek($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteSubyek($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Subyek berhasil dihapus.']);
    }

    public function addRujuk() {
        // Get data from the form
        $kode                = $this->input->post('kode');
        $penjelasan          = $this->input->post('penjelasan');
    
        // Check if the kode_gmd already exists
        $rujukan_exists = $this->Master->isRujukanExists($kode);

        if ($rujukan_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Rujukan Silang sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kode'               => $kode,
            'penjelasan'         => $penjelasan,
            'last_update'        => date('Y-m-d')
        );
            $insert_id = $this->Master->addRujuk($data);
    
            if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Nama Rujukan Silang / Istilah baru berhasil ditambahkan.'
            );
            echo json_encode($response);
            } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Istilah baru.'
            );
            echo json_encode($response);
            }
        }
    }
    public function deleteRujuk($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteRujuk($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Rujukan Silang berhasil dihapus.']);
    }

    public function editRujuk($rujukId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getRujukById($rujukId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Subyek tidak ditemukan']));
        }
    }

        public function updateRujuk()
        {
            $rujukId = $this->input->post('id');
            $kode_r = $this->input->post('kode');
            $penjelasan = $this->input->post('penjelasan');
            
            $this->form_validation->set_rules('kode', 'kode', 'required');

            if ($this->form_validation->run() == FALSE) {
            // If validation fails, return error response
                $response = array(
                    'status' => 'error',
                    'message' => validation_errors()
            );
            echo json_encode($response);
            } else {
                // Proceed with the update
                    $data = array(
                    'kode'                => $kode_r,
                    'penjelasan'          => $penjelasan,
                    'last_update'         => date('Y-m-d')
                );
                $isUpdateSuccessful = $this->Master->updateRujukData($rujukId, $data);

            if ($isUpdateSuccessful) {
                // Return success response
                $response = array(
                    'status' => 'success',
                    'message' => 'Data Rujukan Silang berhasil diubah.'
                );
                echo json_encode($response);
            } else {
                // Return error response if update was not successful
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal mengubah data Rujukan Silang.'
                );
                echo json_encode($response);
            }
        }
        }

}
?>