<style>
.parsley-errors-list {
    list-style-type: none;
    padding-left: 0;
    /*padding-bottom: 5px;
    margin-top: -15px;
    margin-bottom: 0;*/
    font-weight: 400;
    font-size: 11px;
}

.parsley-errors-list.filled {
    color: #D43F3A;
    opacity: 1;
}
</style>
<?
public function edit($id_buku = null)
{
    if (!isset($id_buku)) redirect('daftar');

    $daftar = $this->daftar_model;
    $validation = $this->form_validation;
    $validation->set_rules($daftar->rules());

    $data["table_buku"] = $daftar->getById($id_buku);

    if (!$data["table_buku"]) {
        show_404();
    }

    // ... sisa kode ...
    // Pastikan variabel $data telah terisi dengan data yang diperlukan untuk halaman edit
    $this->load->view("header");
    $this->load->view("sidebar");
    $this->load->view("edit", $data);
    $this->load->view("footer");
}
?>
<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Edit Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('') ?>">Dashboard</a></li>
                <li><a href="<?php echo site_url('daftar') ?>">Buku</a></li>
                <li class="active">Edit</li>
            </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a href="<?php echo site_url('daftar/') ?>" class="btn btn-light"><i class="fa fa-times"></i>Batal</a>
            </div>
        </div>
        <!-- End Page Header Right Div -->

    </div>
    <!-- End Page Header -->
    <div class="container-default">


<div class="row">


        <div class="col-md-6">
            <div class="panel panel-default">

                <div class="panel-title">
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="kode-alert alert1">
                        <a href="#" class="closed">&times;</a>
                       <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>

                </div>

         <div class="panel-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_buku" value="<?php echo $table_buku->id_buku ?>" />

                                <div class="form-group">
                                    <label for="example3" class="form-label">Judul Buku</label>
                                    <input value="<?php echo $table_buku->judul_buku ?>" 
                                     class="form-control form-control-line <?php echo form_error('judul_buku') ? 'is-invalid':'' ?>" type="text" name="judul_buku" placeholder="judul_buku" required/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('judul_buku') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example3" class="form-label">Penerbit Buku</label>
                                    <input value="<?php echo $table_buku->penerbit_buku ?>" 
                                     class="form-control form-control-line <?php echo form_error('penerbit_buku') ? 'is-invalid':'' ?>" type="text" name="penerbit_buku" placeholder="penerbit_buku" required/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('penerbit_buku') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example3" class="form-label">Kategori Buku</label>
                                    <input value="<?php echo $table_buku->kategori_buku ?>" 
                                     class="form-control form-control-line <?php echo form_error('kategori_buku') ? 'is-invalid':'' ?>" type="text" name="kategori_buku" placeholder="kategori_buku" required/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kategori_buku') ?>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="example3" class="form-label">Tanggal Terbit</label>
                                    <input value="<?php echo $table_buku->tanggal_terbit ?>" 
                                     class="form-control form-control-line <?php echo form_error('tanggal_terbit') ? 'is-invalid':'' ?>" type="date" name="tanggal_terbit" placeholder="tanggal_terbit" required/>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal_terbit') ?>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Cover Buku</label><br>
                                    <img src="<?php echo base_url('uploads/' . $table_buku->cover_buku) ?>" width="128" style="border: 3px solid black;" />
                                    <input class="form-control form-control-line" type="hidden" name="cover_buku" 
                                    value="<?php echo $table_buku->cover_buku ?>" />

                                    <input value="<?php echo $table_buku->cover_buku ?>" class="form-control form-control-line" type="file" name="cover_buku">
                                </div>
                                <button type="submit" class="btn btn-default">Simpan</button>
                            </form>

                        </div>

            </div>
        </div>

    </div>
</div>

<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// -->


</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#addbuku').parsley();
});
</script>
