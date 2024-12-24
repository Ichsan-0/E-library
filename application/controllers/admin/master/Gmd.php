<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gmd extends CI_Controller {

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
            $data['title']='Daftar GMD';
            $data['pointer']="GMD";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['gmds'] = $this->Master->get_gmd();
            
            $this->load->view('admin/master/gmd',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function get_gmd() {
        $this->load->model('Master_model');
        $data = $this->Master_model->get_gmd();

        echo json_encode(['data' => $data]);
    }

    public function addGmd() {
        // Get data from the form
        $kode_gmd = $this->input->post('kode_gmd');
        $nama_gmd = $this->input->post('nama_gmd');
    
        // Check if the kode_gmd already exists
        $kode_exists = $this->Master->isKodeGmdExists($kode_gmd);
        $nama_exists = $this->Master->isNamaGmdExists($nama_gmd);

        if ($kode_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Kode GMD sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }

        if ($nama_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama GMD sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kode_gmd' => $kode_gmd,
            'nama_gmd' => $nama_gmd,
            'input_date' => date('Y-m-d')
        );
        $insert_id = $this->Master->addGmd($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Data GMD berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan data GMD.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editGmd($gmdId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $gmdData = $this->Master->getGmdById($gmdId);

        // Check if the GMD data is found
        if ($gmdData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($gmdData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'GMD data not found']));
        }
    }

    public function updateGmd()
    {
        $gmdId = $this->input->post('id');
        $kode_gmd = $this->input->post('kode_gmd');
        $nama_gmd = $this->input->post('nama_gmd');
    
        $this->form_validation->set_rules('kode_gmd', 'Kode GMD', 'required');
        $this->form_validation->set_rules('nama_gmd', 'Nama GMD', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
            echo json_encode($response);
        } else {
            // Load Gmd_model to check if kode_gmd already exists
            $isGmdExists = $this->Master->isGmdExistsUpdate($kode_gmd, $gmdId);
            if ($isGmdExists) {
                // If kode_gmd already exists, return error response
                $response = array(
                    'status' => 'error',
                    'message' => 'Kode GMD telah ada sebelumnya.'
                );
                echo json_encode($response);
            } else {
                // If kode_gmd is unique, update the data in the database
                $data = array(
                    'kode_gmd' => $kode_gmd,
                    'nama_gmd' => $nama_gmd,
                    'last_update' => date('Y-m-d')
                );
                $isUpdateSuccessful = $this->Master->updateGmdData($gmdId, $data);
    
                if ($isUpdateSuccessful) {
                    // Return success response
                    $response = array(
                        'status' => 'success',
                        'message' => 'Data GMD berhasil diubah.'
                    );
                    echo json_encode($response);
                } else {
                    // Return error response if update was not successful
                    $response = array(
                        'status' => 'error',
                        'message' => 'Gagal mengubah data GMD.'
                    );
                    echo json_encode($response);
                }
            }
        }
    }
    
    public function deleteGmd($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteGmdData($id);
        echo json_encode(['status' => 'success', 'message' => 'Data GMD berhasil dihapus.']);
    }
}
?>