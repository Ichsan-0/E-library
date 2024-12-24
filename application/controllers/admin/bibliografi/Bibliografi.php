<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bibliografi extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            //$this->Security_model->login_check();

            $this->load->model(array(
                'Biblio_model' => 'Model',
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
            $data['title']='Daftar Bibliografi';
            $data['pointer']="Daftar Bibliografi";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['biblio'] = $this->Model->get_biblios();
            
            $this->load->view('admin/bibliografi/bibliografi',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
    public function save_pengarang() {
        $nama_pengarang = $this->input->post('nama_pengarang');
        $tahun_lahir = $this->input->post('tahun_lahir');
        $jenis_kepengarangan = $this->input->post('jenis_kepengarangan');
        $daftar_terkendali = $this->input->post('daftar_terkendali');

        $data_pengarang = array(
            'nama_pengarang' => $nama_pengarang,
            'tahun_lahir' => $tahun_lahir,
            'jenis_kepengarangan' => $jenis_kepengarangan,
            'daftar_terkendali' => $daftar_terkendali
        );

        $insert_id = $this->Model->insert_pengarang($data_pengarang);

        if ($insert_id) {
            $response = array(
                'status' => 'success',
                'message' => 'Data pengarang berhasil disimpan',
                'pengarang_id' => $insert_id
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Gagal menyimpan data pengarang'
            );
        }

        echo json_encode($response);
    }
    public function add_biblio() {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $cek = $this->session->userdata('logged_in');
        $stts = $this->session->userdata('stts');
        /*jika status login Yes dan status admin tampilkan*/
        if(!empty($cek) && $stts=='admin')
        {
            /*layout*/  
            $data = [
                'title' => 'Penambahan Bibliografi',
                'pointer' => 'Daftar Bibliografi',
                'footer' => $this->load->view('admin/footer', '', TRUE),
            ];
            
            $tmp = [
                'header' => $this->load->view('admin/header2', $data, TRUE),
                'pengarang' => $this->Model->get_pengarangs(),
                'level' => $this->Model->get_levels(),
                'kode' => $this->Master->get_kodes(),
                'tipe' => $this->Master->get_tkoleksi(),
                'gmd' => $this->Master->get_gmd(),
                'isi' => $this->Master->get_tipes(),
                'media' => $this->Master->get_medias(),
                'pembw' => $this->Master->get_pembawas(),
                'kala' => $this->Master->get_terbits(),
                'tmpt' => $this->Master->get_tempats(),
                'sub' => $this->Master->get_subyeks(),
                'bahasa' => $this->Master->get_bahasas(),
                'relasi' => $this->Model->get_biblios(),
            ];
            
            $this->load->view('admin/bibliografi/add_bibliografi', $tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }
    
    public function addBibliografi(){
        $judul = $this->input->post('judul');
        $edisi = $this->input->post('edisi');
        $pernyataan = $this->input->post('pernyataan');
        $spesifik = $this->input->post('spesifik');

        $data = array(
                'judul' => $judul,
                'edisi'=> $edisi,
                'pernyataan'=> $pernyataan,
                'spesifik'=> $spesifik,
                'last_update'   => date('Y-m-d')
            );
            $insert_id = $this->Model->addBiblio($data);
            if ($insert_id) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Biblio berhasil ditambahkan.'
                );
                echo json_encode($response);
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Terjadi kesalahan saat menambahkan Biblio.'
                );
                echo json_encode($response);
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