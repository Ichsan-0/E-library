<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipeMedia extends CI_Controller {

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
            $data['title']='Daftar Tipe Media';
            $data['pointer']="GMD";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['media'] = $this->Master->get_medias();
            
            $this->load->view('admin/master/tipe_media',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addMedia() {
        // Get data from the form
        $kode_media = $this->input->post('kode_media');
        $nama_media = $this->input->post('nama_media');
        $kode_marc = $this->input->post('kode_marc');
    
        // Check if the kode_gmd already exists
        $kode_exists = $this->Master->isKodeMediaExists($kode_media);
        $nama_exists = $this->Master->isNamaMediaExists($nama_media);

        if ($kode_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Kode kode Media sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
        if ($nama_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Nama Media sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'kode_media' => $kode_media,
            'nama_media' => $nama_media,
            'kode_marc' => $kode_marc,
            'input_date' => date('Y-m-d')
        );
        $insert_id = $this->Master->addMedia($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Data Tipe Media berhasil ditambahkan.'
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
    
    public function editMedia($mediaId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $mediaData = $this->Master->getMediaById($mediaId);

        // Check if the GMD data is found
        if ($mediaData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($mediaData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Tipe Media tidak ditemukan']));
        }
    }

    public function updateMedia()
    {
        $mediaId = $this->input->post('id');
        $kode_media = $this->input->post('kode_media');
        $kode_marc = $this->input->post('kode_marc');
        $nama_media = $this->input->post('nama_media');

        $this->form_validation->set_rules('kode_media', 'Kode Tipe Media', 'required');
        $this->form_validation->set_rules('nama_media', 'Nama Tipe Media', 'required',array('required' => 'Data Nama Media tidak boleh kosong'));

        if ($this->form_validation->run() == FALSE) {
        // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
        );
        echo json_encode($response);
        } else {
    // Check if nama_tipe already exists
            $nama_media_exists = $this->Master->isNamaMediaExists($nama_media);
    
            if ($nama_media_exists) {
                $response = array(
                'status' => 'error',
                'message' => 'Nama Tipe Media sudah ada sebelumnya.'
            );
            echo json_encode($response);
            } else {
            // Proceed with the update
                $data = array(
                'kode_media' => $kode_media,
                'nama_media' => $nama_media,
                'kode_marc' => $kode_marc,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateMediaData($mediaId, $data);

        if ($isUpdateSuccessful) {
            // Return success response
            $response = array(
                'status' => 'success',
                'message' => 'Data Tipe Media berhasil diubah.'
            );
            echo json_encode($response);
        } else {
            // Return error response if update was not successful
            $response = array(
                'status' => 'error',
                'message' => 'Gagal mengubah data Tipe Media.'
            );
            echo json_encode($response);
        }
    }
}

    }
    
    public function deleteMedia($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteTipeMedia($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Tipe Media berhasil dihapus.']);
    }
}
?>