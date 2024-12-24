<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipeAnggota extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            //$this->Security_model->login_check();

            $this->load->model(array(
                'Anggota_model' => 'Model'
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
            $data['title']='Daftar Tipe Anggota';
            $data['pointer']="Tipe Anggota";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['tipe'] = $this->Model->get_tipe_anggota();
            
            $this->load->view('admin/tipe_anggota',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addTipe() {
        // Get data from the form
        $nama_tipe = $this->input->post('nama_tipe');
        $jumlah_pinjaman = $this->input->post('jumlah_pinjaman');
        $lama_peminjaman = $this->input->post('lama_peminjaman');
        $reservasi = $this->input->post('reservasi');
        $jumlah_reservasi = $this->input->post('jumlah_reservasi');
        $masa_keanggotaan = $this->input->post('masa_keanggotaan');
        $kali_perpanjangan = $this->input->post('kali_perpanjangan');
        $denda = $this->input->post('denda');
        $toleransi_lambat = $this->input->post('toleransi_lambat');
    
        // Check if the kode_gmd already exists
        $nama_exists = $this->Model->isNamaTipeExists($nama_tipe);

        if ($nama_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Tipe Anggota sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
       else{// Insert data into the database
        $data = array(
            'nama_tipe' => $nama_tipe,
            'jumlah_pinjaman' => $jumlah_pinjaman,
            'lama_peminjaman' => $lama_peminjaman,
            'reservasi' => $reservasi,
            'jumlah_reservasi' => $jumlah_reservasi,
            'masa_keanggotaan' => $masa_keanggotaan,
            'kali_perpanjangan' => $kali_perpanjangan,
            'denda'            => $denda,
            'toleransi_lambat' => $toleransi_lambat,
            'last_update' => date('Y-m-d')
        );
        $insert_id = $this->Model->addTipe($data);
    
        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Data Tipe Anggota berhasil ditambahkan.'
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
    
    public function editTipe($tipeId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $mediaData = $this->Model->getTipeById($tipeId);

        // Check if the GMD data is found
        if ($mediaData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($mediaData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Tipe Anggota tidak ditemukan']));
        }
    }

    public function updateTipe()
    {
        $tipeId = $this->input->post('id');
        $nama_tipe = $this->input->post('nama_tipe');
        $jumlah_pinjaman = $this->input->post('jumlah_pinjaman');
        $lama_peminjaman = $this->input->post('lama_peminjaman');
        $reservasi       = $this->input->post('reservasi');
        $jumlah_reservasi = $this->input->post('jumlah_reservasi');
        $masa_keanggotaan = $this->input->post('masa_keanggotaan');
        $kali_perpanjangan = $this->input->post('kali_perpanjangan');
        $denda = $this->input->post('denda');
        $toleransi_lambat = $this->input->post('toleransi_lambat');
    
        $this->form_validation->set_rules('nama_tipe', 'Nama Tipe Anggota', 'required',array('required' => 'Data Nama Media tidak boleh kosong'));

        if ($this->form_validation->run() == FALSE) {
        // If validation fails, return error response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
        );
        echo json_encode($response);
        }  else {
            // Proceed with the update
                $data = array(
                    'nama_tipe' => $nama_tipe,
                    'jumlah_pinjaman' => $jumlah_pinjaman,
                    'lama_peminjaman' => $lama_peminjaman,
                    'reservasi' => $reservasi,
                    'jumlah_reservasi' => $jumlah_reservasi,
                    'masa_keanggotaan' => $masa_keanggotaan,
                    'kali_perpanjangan' => $kali_perpanjangan,
                    'denda'            => $denda,
                    'toleransi_lambat' => $toleransi_lambat,
                    'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Model->updateTipeData($tipeId, $data);

            if ($isUpdateSuccessful) {
                // Return success response
                $response = array(
                    'status' => 'success',
                    'message' => 'Data Tipe Anggota berhasil diubah.'
                );
                echo json_encode($response);
            } else {
                // Return error response if update was not successful
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal mengubah data Tipe Anggota.'
                );
                echo json_encode($response);
            }
        }

    }
    
    public function deleteTipe($id)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Model->deleteTipeAnggota($id);
        echo json_encode(['status' => 'success', 'message' => 'Data Tipe Anggota berhasil dihapus.']);
    }
}
?>