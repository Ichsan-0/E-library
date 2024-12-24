<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Label extends CI_Controller {

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
            $data['title']='Daftar Label';
            $data['pointer']="Label";

            /*data yang ditampilkan*/
            
            $data['footer'] = $this->load->view('admin/footer','', TRUE);
            $tmp['header'] = $this->load->view('admin/header2',$data, TRUE);
            $tmp['label'] = $this->Master->get_labels();
            
            $this->load->view('admin/referensi/label',$tmp);
           // $this->load->view('admin/footer');

        }
        else
        /*jika status login NO atau status bukan admin kembalikan ke login*/
        {
            header('location:'.base_url().'web/log');
        }
    }

    public function addLabel() {
        // Get data from the form
        $nama_label = $this->input->post('nama_label');
        $deskripsi_label = $this->input->post('deskripsi_label');
    
        // Check if the label already exists
        $label_exists = $this->Master->isNamaLabelExists($nama_label);
    
        if ($label_exists) {
            $response = array(
                'status' => 'error',
                'message' => 'Nama Label sudah ada sebelumnya.'
            );
            echo json_encode($response);
            return;
        }
    
        // Check if a file is uploaded
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = 'images/labels/'; // Lokasi penyimpanan gambar
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Tipe file yang diizinkan
            $config['max_size'] = 500; // Maksimum ukuran file dalam KB
            $config['file_name'] = $_FILES['gambar']['name']; // Gunakan nama file asli
    
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('gambar')) {
                $data = array(
                    'nama_label' => $nama_label,
                    'deskripsi_label' => $deskripsi_label,
                    'gambar' => $this->upload->data('file_name'), // Gunakan nama file yang diunggah
                    'last_update' => date('Y-m-d')
                );
    
                $insert_id = $this->Master->addLabel($data);
    
                if ($insert_id) {
                    $response = array(
                        'status' => 'success',
                        'message' => 'Nama Label berhasil ditambahkan.'
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Terjadi kesalahan saat menambahkan Label.'
                    );
                    echo json_encode($response);
                }
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal mengunggah gambar: ' . $this->upload->display_errors()
                );
                echo json_encode($response);
            }
        }
    }
    
    
    
    public function editLabel($labelId) {
        // Assuming you have a model to handle GMD data, fetch the GMD data based on the given ID
        $tipeData = $this->Master->getLabelById($labelId);

        // Check if the GMD data is found
        if ($tipeData) {
            // Return the GMD data as JSON response
            $this->output->set_content_type('application/json')->set_output(json_encode($tipeData));
        } else {
            // Return an error response if the GMD data is not found
            $this->output->set_status_header(404)->set_content_type('application/json')->set_output(json_encode(['error' => 'Data Penerbit tidak ditemukan']));
        }
    }



    public function updateLabel()
    {
        $labelId = $this->input->post('id');
        $nama_label = $this->input->post('nama_label');
        $deskripsi_label = $this->input->post('deskripsi_label');
    
        // Cek apakah ada file gambar yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            // Konfigurasi upload gambar
            $config['upload_path'] = 'images/labels/'; // Lokasi penyimpanan gambar
            $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Tipe file yang diizinkan
            $config['max_size'] = 500; // Maksimum ukuran file dalam KB
            $config['file_name'] = $_FILES['gambar']['name']; // Gunakan nama file asli
    
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('gambar')) {
                // Hapus file gambar lama jika ada
                $old_image = $this->Master->getOldLabel($labelId); // Ganti ini dengan cara Anda mendapatkan nama file gambar lama
                if ($old_image) {
                    $image_path = 'images/labels/' . $old_image;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
    
                $data = array(
                    'nama_label' => $nama_label,
                    'deskripsi_label' => $deskripsi_label,
                    'gambar' => $this->upload->data('file_name'),
                    'last_update' => date('Y-m-d')
                );
                $isUpdateSuccessful = $this->Master->updateLabel($labelId, $data);
    
                if ($isUpdateSuccessful) {
                    $response = array(
                        'status' => 'success',
                        'message' => 'Data Label berhasil diubah.'
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Gagal mengubah / tidak ada perubahan data Label.'
                    );
                    echo json_encode($response);
                }
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => $this->upload->display_errors()
                );
                echo json_encode($response);
            }
        } else {
            // Jika tidak ada file gambar yang diunggah, gunakan nama gambar yang ada di database
            $data = array(
                'nama_label' => $nama_label,
                'deskripsi_label' => $deskripsi_label,
                'last_update' => date('Y-m-d')
            );
            $isUpdateSuccessful = $this->Master->updateLabel($labelId, $data);
    
            if ($isUpdateSuccessful) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Data Label berhasil diubah.'
                );
                echo json_encode($response);
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Gagal mengubah / tidak ada perubahan data Label.'
                );
                echo json_encode($response);
            }
        }
    }
    
    
    public function deleteLabel($labelId)
    {
        $data['log']=$this->db->get_where('tb_petugas',array('id_petugas' => $this->session->userdata('username')))->result();
        $this->Master->deleteLabel($labelId);
        echo json_encode(['status' => 'success', 'message' => 'Data Label dihapus.']);
    }

}
?>