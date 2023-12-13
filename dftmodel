<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_model extends CI_Model
{
    private $_table = "table_buku";

    public $id_buku; // id (primary-key) dari nama_tabel
    public $judul_buku;
    public $penerbit_buku;
    public $kategori_buku;
    public $tanggal_terbit;
    public $cover_buku = "default.png";

public function rules() // form-validation
    {
        return [

            [
                'field' => 'judul_buku',
                'label' => 'Judul Buku',
                'rules' => 'required'
            ],

        ];
    }

public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_buku)
    {
        return $this->db->get_where($this->_table, ["id_buku" => $id_buku])->row();
    }

public function save()
{
    $post = $this->input->post();
    $this->judul_buku = $post["judul_buku"];
    $this->penerbit_buku = $post["penerbit_buku"];
    $this->kategori_buku = $post["kategori_buku"];
    $this->tanggal_terbit = $post["tanggal_terbit"];

    if(isset($_FILES['cover_buku'])) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '.gif|jpg|jpeg|png';
        $config['file_name'] = "buku_".date("YmdHis");
        $config['max_size'] = 1024; // 1MB
        // $config['max_width'] = 1080;
        // $config['max_height'] = 1080;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('cover_buku')){
            $error = array('error' => $this->upload->display_error());
            print_r($error);
            exit;
        } else {
            $uploadData = $this->upload->data();
            $this->cover_buku = $uploadData["file_name"];
        }
    }

    return $this->db->insert($this->_table, $this);
    
}
public function hapus_data($id_buku) {
        // Lakukan penghapusan data dari tabel yang sesuai
        $this->db->where('id_buku', $id_buku);
        $this->db->delete('table_buku'); // Ganti 'nama_tabel_buku' dengan nama tabel Anda

        // Mengembalikan TRUE jika penghapusan berhasil, FALSE jika gagal
        return $this->db->affected_rows() > 0 ? true : false;
    }


public function update()
{
    $post = $this->input->post();

    $this->id_buku = $post["id_buku"];
    $this->judul_buku = $post["judul_buku"];
    $this->penerbit_buku = $post["penerbit_buku"];
    $this->kategori_buku = $post["kategori_buku"];
    $this->tanggal_terbit = $post["tanggal_terbit"];
    $this->cover_buku = $post["cover_buku"];

    if (!empty($_FILES['cover_buku'])) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '.gif|jpg|jpeg|png';
        $config['file_name'] = "buku_" . date("YmdHis");
        $config['max_size'] = 1024; // 1MB
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('cover_buku')) {
            $uploadData = $this->upload->data();

            //unlink('./uploads/biodata/' . $post["foto_siswa"]);

            $this->cover_buku = $uploadData['file_name'];
        } else {
            $this->cover_buku = $post['cover_buku'];
            $error = $this->upload->display_errors();
            // Handle the upload error
        }
    }

    return $this->db->update($this->_table, $this, array('id_buku' => $post['id_buku']));
}
}
