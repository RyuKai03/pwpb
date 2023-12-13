<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
 public function __construct()
    {
        parent::__construct();
        $this->load->model("daftar_model");
        $this->load->library('form_validation');
        // Memastikan session
        // if ($this->session->userdata('masuk') != TRUE) {
        //     $url = base_url('login');
        //     redirect($url);
        // }
        ;

    }

	   // Menampilkan list data siswa
    public function index()
    {
        $data["table_buku"] = $this->daftar_model->getAll();
        $this->load->view("header");
        $this->load->view("sidebar");
        $this->load->view("daftar", $data);
        $this->load->view("footer");
    }

    public function detail($id_buku = null)
{
    if (!isset($id_buku)) redirect('daftar');

    $daftar = $this->daftar_model;
    $validation = $this->form_validation;
    $validation->set_rules($daftar->rules());

    $data["table_buku"] = $daftar->getById($id_buku);

    if (!$data["table_buku"])
        show_404();

    if ($validation->run()) {
        // Tangani pengiriman formulir untuk memperbarui catatan
        $dataToUpdate = [
            // nama dan nilai input formulir Anda
            'judul' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis'),
            // ... bidang lainnya ...
        ];

        $daftar->update($id_buku, $dataToUpdate);
        $this->session->set_flashdata('success', 'Berhasil diperbarui');
        redirect('daftar');
    } else {
        // Tampilkan tampilan untuk pengeditan
        $this->load->view("header");
        $this->load->view("sidebar");
        $this->load->view("detail", $data);
        $this->load->view("footer");
    }
}

    public function add()
    {
        $daftar = $this->daftar_model; 
        $validation = $this->form_validation; 
        $validation->set_rules ($daftar->rules());

        if ($validation->run()) {
            $daftar->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        } 

        $this->load->view("header");
        $this->load->view("sidebar");
        $this->load->view("tambah");
        $this->load->view("footer");
    }

    public function hapus_buku($id_buku) {
    // Panggil model yang sesuai untuk mengakses database
    $this->load->model('daftar_model');

    $result = $this->daftar_model->hapus_data($id_buku);

    if ($result) {
        redirect('daftar/index'); 
    } else {
        echo "Gagal menghapus data.";
    }
}
    public function edit($id_buku)
    {
    if (!isset($id_buku)) 
        redirect('daftar');

    $daftar = $this->daftar_model;
    $validation = $this->form_validation;
    $validation->set_rules($daftar->rules());

    if ($validation->run()) {
        $daftar->update();
        // $this->session->set_flashdata('success', 'Berhasil diperbarui');
        $this->session->set_flashdata('success', 'Berhasil diperbarui');
        }
        
         $data["table_buku"] = $daftar->getById($id_buku);
         //  $data["listJurusan"] = $this->biodata_model->getAllJurusan();

        if (!$data["table_buku"])
        show_404();
        
        $this->load->view("header");
        $this->load->view("sidebar");
        $this->load->view("edit", $data);
        $this->load->view("footer");
    }
}
