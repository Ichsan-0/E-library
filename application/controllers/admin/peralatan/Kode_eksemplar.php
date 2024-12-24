<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kode_eksemplar extends CI_Controller {

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
            $data['title']='Pola Kode Eksemplar';
            $data['pointer']="Kode Eksemplar";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['kode'] = $this->Master->get_kodes();
            
            $this->load->view('admin/alat/kode_eksemplar',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addKode() {
        // Get data from the form
        $prefiks = $this->input->post('prefiks');
        $sufiks = $this->input->post('sufiks');
        $panjang = $this->input->post('panjang');
        $pola   = $this->input->post('pola');
    
        // Check if the kode_gmd already exists
        $pola_exists = $this->Master->isPolaExists($pola);

        if ($pola_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Data Pola sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'prefiks'       => $prefiks,
            'sufiks'        => $sufiks,
            'panjang'       => $panjang,
            'pola'          => $pola,
            'last_update'    => date('Y-m-d')
        );
        $insert_id = $this->Master->addKode($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Kode Eksemplar berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Kode Eksemplar.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editKode($kodeId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getKodeById($kodeId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }

    public function updateKode()
    {
        $kodeId = $this->input->post('id');
        $prefiks = $this->input->post('prefiks');
        $sufiks = $this->input->post('sufiks');
        $panjang = $this->input->post('panjang');
        $pola = $this->input->post('pola');
        
        $this->form_validation->set_rules('prefiks', 'Prefiks', 'required');

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
                'prefiks' => $prefiks,
                'sufiks' => $sufiks,
                'panjang' => $panjang,
                'pola'  => $pola,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateKodeData($kodeId, $data);

            if ($isUpdateSuccessful) {
                // Return success response
                $response = array(
                    'status' => 'success',
                    'message' => 'Data Kode Eksemplar berhasil diubah.'
                );
                echo json_encode($response);
            } else {
                // Return error response if update was not successful
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal mengubah Kode Eksemplar.'
                );
                echo json_encode($response);
            }
        }
    }
    
    public function deleteKode($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteKode($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Kode Eksemplar berhasil dihapus.']);
    }
}
?>