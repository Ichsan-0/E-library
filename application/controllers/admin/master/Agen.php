<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agen extends CI_Controller {

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
            $data['title']='Daftar Agen';
            $data['pointer']="GMD";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['agen'] = $this->Master->get_agens();
            
            $this->load->view('admin/master/agen',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addAgen() {
        // Get data from the form
        $nama_penyuplai = $this->input->post('nama_penyuplai');
        $alamat         = $this->input->post('alamat');
        $kontak         = $this->input->post('kontak');
        $nomer_telepon  = $this->input->post('nomer_telepon');
        $nomer_faks     = $this->input->post('nomer_faks');
        $nomer_akun     = $this->input->post('nomer_akun');
    
        // Check if the kode_gmd already exists
        $nomertlp_penyuplai_exists = $this->Master->isNotlpPenyuplaiExists($nomer_telepon);

        if ($nomertlp_penyuplai_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nomer Telepon Penyuplai sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'nama_penyuplai' => $nama_penyuplai,
            'alamat'         => $alamat,
            'kontak'         => $kontak,
            'nomer_telepon'  => $nomer_telepon,
            'nomer_faks'     => $nomer_faks,
            'nomer_akun'     => $nomer_akun,
            'last_update'    => date('Y-m-d')
        );
        $insert_id = $this->Master->addPenerbit($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Nama Penerbit berhasil ditambahkan.'
            );
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menambahkan Penerbit.'
            );
            echo json_encode($response);
        }
        }
    }
    
    public function editAgen($agenId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getAgenById($agenId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }

    public function updateAgen()
    {
        $agenId = $this->input->post('id');
        $nama_penyuplai = $this->input->post('nama_penyuplai');
        $alamat = $this->input->post('alamat');
        $kontak = $this->input->post('kontak');
        $nomer_telepon = $this->input->post('nomer_telepon');
        $nomer_faks = $this->input->post('nomer_faks');
        $nomer_akun = $this->input->post('nomer_akun');
        
        $this->form_validation->set_rules('nama_penyuplai', 'Nama Penyuplai', 'required');

        if ($this->form_validation->run() == FALSE) {
        // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
        );
        echo json_encode($response);
        } else {
    // Check if nama_tipe already exists
            $nomertlp_penyuplai_exists = $this->Master->isNotlpPenyuplaiExists($nomer_telepon);
    
            if ($nomertlp_penyuplai_exists) {
                $response = array(
                'status' => 'error',
                'message' => 'Nomer telepon sudah ada sebelumnya.'
            );
            echo json_encode($response);
            } else {
            // Proceed with the update
                $data = array(
                'nama_penyuplai' => $nama_penyuplai,
                'alamat'        => $alamat,
                'kontak'        => $kontak,
                'nomer_telepon' => $nomer_telepon,
                'nomer_faks'   => $nomer_faks,
                'nomer_akun'   => $nomer_akun,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateAgenData($agenId, $data);

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
    
    public function deleteAgen($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteAgen($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Agen berhasil dihapus.']);
    }
}
?>