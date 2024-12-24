<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kala_terbit extends CI_Controller {

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
            $data['title']='Kala Terbit';
            $data['pointer']="Kala Terbit";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['terbit'] = $this->Master->get_terbits();
            $tmp['bahasa'] = $this->Master->get_bahasas();
            
            $this->load->view('admin/referensi/kala_terbit',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addTerbit() {
        // Get data from the form
        $kala_terbit = $this->input->post('kala_terbit');
        $id_bahasa = $this->input->post('id_bahasa');
        $selang_waktu = $this->input->post('selang_waktu');
        $satuan_waktu = $this->input->post('satuan_waktu');
    
        // Check if the kode_gmd already exists
        $kala_exists = $this->Master->isKalaTerbitExists($kala_terbit);

        if ($kala_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Bahasa sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kala_terbit'   => $kala_terbit,
            'id_bahasa'     => $id_bahasa,
            'selang_waktu'  => $selang_waktu,
            'satuan_waktu'  => $satuan_waktu,
            'last_update'    => date('Y-m-d')
        );
        $insert_id = $this->Master->addKalaTerbit($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Data Kala Terbit ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Data Kala Terbit.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editTerbit($terbitId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getKalaTerbitById($terbitId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }

    public function updateTerbit()
    {
        $terbitId = $this->input->post('id');
        $kala_terbit = $this->input->post('kala_terbit');
        $id_bahasa = $this->input->post('id_bahasa');
        $selang_waktu = $this->input->post('selang_waktu');
        $satuan_waktu = $this->input->post('satuan_waktu');
        
        $this->form_validation->set_rules('kala_terbit', 'Kala Terbit', 'required');

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
                'kala_terbit' => $kala_terbit,
                'id_bahasa'   => $id_bahasa,
                'selang_waktu' => $selang_waktu,
                'satuan_waktu' => $satuan_waktu,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateKalaTerbitData($terbitId, $data);

        if ($isUpdateSuccessful) {
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Data Kala Terbit berhasil diubah.'
            );
            echo json_encode($response);
        } else {
            // Return error response if update was not successful
            $response = array(
                'status' => 'error',
                'message' => 'Gagal mengubah data Kala Terbit.'
            );
            echo json_encode($response);
        }
    }


    }
    
    public function deleteTerbit($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteTerbit($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Bahasa berhasil dihapus.']);
    }
}
?>