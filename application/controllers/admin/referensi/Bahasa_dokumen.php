<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bahasa_dokumen extends CI_Controller {

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
            $data['title']='Daftar Bahasa Dokumen';
            $data['pointer']="Bahasa Dokumen";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['bahasa'] = $this->Master->get_bahasas();
            
            $this->load->view('admin/referensi/bahasa',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addBahasa() {
        // Get data from the form
        $kode_bahasa = $this->input->post('kode_bahasa');
        $nama_bahasa = $this->input->post('nama_bahasa');
    
        // Check if the kode_gmd already exists
        $nama_exists = $this->Master->isNamaBahasaExists($nama_bahasa);

        if ($nama_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Bahasa sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kode_bahasa'   => $kode_bahasa,
            'nama_bahasa'   => $nama_bahasa,
            'last_update'    => date('Y-m-d')
        );
        $insert_id = $this->Master->addBahasa($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Nama Bahasa berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Bahasa.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editBahasa($bahasaId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getBahasaById($bahasaId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }

    public function updateBahasa()
    {
        $bahasaId = $this->input->post('id');
        $kode_bahasa = $this->input->post('kode_bahasa');
        $nama_bahasa = $this->input->post('nama_bahasa');
        
        $this->form_validation->set_rules('nama_bahasa', 'Nama bahasa', 'required');

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
                'kode_bahasa' => $kode_bahasa,
                'nama_bahasa' => $nama_bahasa,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateBahasaData($bahasaId, $data);

        if ($isUpdateSuccessful) {
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Data bahasa berhasil diubah.'
            );
            echo json_encode($response);
        } else {
            // Return error response if update was not successful
            $response = array(
                'status' => 'error',
                'message' => 'Gagal mengubah data bahasa.'
            );
            echo json_encode($response);
        }
    }


    }
    
    public function deleteBahasa($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteBahasa($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Bahasa berhasil dihapus.']);
    }
}
?>