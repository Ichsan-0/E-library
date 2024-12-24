<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

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
            $data['title']='Status Eksemplar';
            $data['pointer']="Status Eksemplar";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['status'] = $this->Master->get_status();
            
            $this->load->view('admin/referensi/status',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addStatus() {
        // Get data from the form
        $kode_status = $this->input->post('kode_status');
        $nama_status = $this->input->post('nama_status');
        $aturan = $this->input->post('aturan');
    
        // Check if the kode_gmd already exists
        $nama_exists = $this->Master->isNamaStatusExists($nama_status);

        if ($nama_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama status sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kode_status' => $kode_status,
            'nama_status' => $nama_status,
            'aturan'      => $aturan,
            'last_update'    => date('Y-m-d')
        );
        $insert_id = $this->Master->addStatus($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Nama Status berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Status.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editStatus($statusId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getStatusById($statusId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }

    public function updateStatus()
    {
        $statusId = $this->input->post('id');
        $kode_status = $this->input->post('kode_status');
        $nama_status = $this->input->post('nama_status');
        $aturan = $this->input->post('aturan');
        
        $this->form_validation->set_rules('nama_status', 'Nama Status', 'required');

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
                'kode_status' => $kode_status,
                'nama_status' => $nama_status,
                'aturan'      => $aturan,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateStatusData($statusId, $data);

            if ($isUpdateSuccessful) {
                // Return success response
                $response = array(
                    'status' => 'success',
                    'message' => 'Data Status berhasil diubah.'
                );
                echo json_encode($response);
            } else {
                // Return error response if update was not successful
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal mengubah data Status.'
                );
                echo json_encode($response);
            }
        }
    }
    
    public function deleteStatus($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteStatus($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Status berhasil dihapus.']);
    }
}
?>