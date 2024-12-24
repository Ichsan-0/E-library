<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipe_koleksi extends CI_Controller {

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
            $data['title']='Daftar Tipe Koleksi';
            $data['pointer']="Tipe Koleksi";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['koleksi'] = $this->Master->get_tkoleksi();
            
            $this->load->view('admin/referensi/tipe_koleksi',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addKoleksi() {
        // Get data from the form
        $tipe_koleksi = $this->input->post('tipe_koleksi');
    
        // Check if the kode_gmd already exists
        $tipe_exists = $this->Master->istipeKoleksiExists($tipe_koleksi);

        if ($tipe_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Tempat sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'tipe_koleksi' => $tipe_koleksi,
            'last_update'    => date('Y-m-d')
        );
        $insert_id = $this->Master->addTipeKoleksi($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Nama Tipe Koleksi berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Tipe Koleksi.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editTipe($tipeId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getKoleksiById($tipeId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }

    public function updateTipe()
    {
        $tipeId = $this->input->post('id');
        $tipe_koleksi = $this->input->post('tipe_koleksi');
        
        $this->form_validation->set_rules('tipe_koleksi', 'Nama Tempat', 'required');

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
                'tipe_koleksi' => $tipe_koleksi,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateTipeKoleksiData($tipeId, $data);

            if ($isUpdateSuccessful) {
                // Return success response
                $response = array(
                    'status' => 'success',
                    'message' => 'Data Tipe Koleksi berhasil diubah.'
                );
                echo json_encode($response);
            } else {
                // Return error response if update was not successful
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal mengubah data Tipe Koleksi.'
                );
                echo json_encode($response);
            }
        }
    }
    
    public function deleteTipe($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteTipeKoleksi($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Tempat berhasil dihapus.']);
    }
}
?>