<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengarang extends CI_Controller {

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
            $data['title']='Daftar Pengarang';
            $data['pointer']="Pengarang";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['pengarang'] = $this->Master->get_pengarangs();
            
            $this->load->view('admin/master/pengarang',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addPengarang() {
        // Get data from the form
        $nama_pengarang      = $this->input->post('nama_pengarang');
        $tahun_lahir         = $this->input->post('tahun_lahir');
        $jenis_kepengarangan   = $this->input->post('jenis_kepengarangan');
        $daftar_terkendali   = $this->input->post('daftar_terkendali');
    
        // Check if the kode_gmd already exists
        $nama_pengarang_exists = $this->Master->isPengarangExists($nama_pengarang);

        if ($nama_pengarang_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Pengarang sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'nama_pengarang'       => $nama_pengarang,
            'tahun_lahir'          => $tahun_lahir,
            'jenis_kepengarangan'  => $jenis_kepengarangan,
            'daftar_terkendali'    => $daftar_terkendali,
            'last_update'          => date('Y-m-d')
        );
        $insert_id = $this->Master->addPengarang($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Nama Pengarang berhasil ditambahkan.'
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
    
    public function editPengarang($pengarangId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getPengarangById($pengarangId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }

    public function updatePengarang()
    {
        $pengarangId = $this->input->post('id');
        $nama_pengarang = $this->input->post('nama_pengarang');
        $tahun_lahir = $this->input->post('tahun_lahir');
        $jenis_kepengarangan = $this->input->post('jenis_kepengarangan');
        $daftar_terkendali = $this->input->post('daftar_terkendali');
        
        $this->form_validation->set_rules('nama_pengarang', 'Nama Pengarang', 'required');

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
                'nama_pengarang'      => $nama_pengarang,
                'tahun_lahir'         => $tahun_lahir,
                'jenis_kepengarangan' => $jenis_kepengarangan,
                'daftar_terkendali'   => $daftar_terkendali,
                'last_update'         => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updatePengarangData($pengarangId, $data);

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
    
    public function deletePengarang($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deletePengarang($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Pengarang berhasil dihapus.']);
    }
}
?>