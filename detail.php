<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">List Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('') ?>">Dashboard</a></li>
                <li class="active">Daftar Buku</li>
            </ol>

        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a href="<?php echo site_url('buku/add') ?>" class="btn btn-light"><i class="fa fa-plus"></i>Tambah Buku</a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

 <!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->
<div class="container-default">

    <div class="row">

        <!-- Start Panel -->
        <div class="col-md-12">o
            <div class="panel panel-default">
                <div class="panel-body table-responsive">

                        <table id="listbuku" class="table display">
                                <thead>
                                        <tr>
                                                <th>Gambar</th>
                                                <th>Nama Buku</th>
                                                <th>Penerbit</th>
                                               <th>Kategori</th>
                                               <th>Tanggal Terbit</th>
                                                <!-- <?php if ($this->session->userdata('access')=='1'): ?>
                                                <th width="150px">Aksi</th>
                                                <?php endif;?> -->
                                        </tr>
                                </thead>

                                <tfoot>
                                        <tr>
                                                <th>Gambar</th>
                                                <th>Judul Buku</th>
                                                <th>Penerbit</th>
                                                <th>Kategori</th>
                                                <th>Tanggal Terbit</th>
                                                <!-- <?php if ($this->session->userdata('access')=='1'): ?>
                                                <th>Aksi</th>
                                                <?php endif;?> -->
                                        </tr>
                                </tfoot>

                                <tbody>
                                    <tr>
                                        <td> <img src="<?php echo base_url('uploads/' . $table_buku->cover_buku) ?>"width="128" style="border: 3px solid black;"/>
                                            <input class="form-control form-control-line" type="hidden" name="cover_buku" value="<?php echo $table_buku->cover_buku ?>" /></td>

                                            <td><input value="<?php echo $table_buku->judul_buku ?>"
                                                class="form-control form-control-line type="text" name="judul_buku" placeholder="judul_buku" disabled /></td>

                                            <td><input value="<?php echo $table_buku->penerbit_buku ?>
                                                "class="form-control form-control-line type="text" name="penerbit_terbot" placeholder="penerbit_buku" disabled /></td>

                                            <td><input value="<?php echo $table_buku->kategori_buku ?> "class="form-control     form-control-line type="text" name=" kategori_buku" placeholder="kategori_buku" disabled /></td >

                                            <td><input value="<?php echo $table_buku->tanggal_terbit ?> "class="form-control form-control-line type="text" name=" kategori_buku" placeholder="kategori_buku" disabled /></td >

</tr>

                                </tbody>
                        </table>


                </div>

            </div>
        </div>
        <!-- End Panel -->


    </div>

</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// -->




</div>

<script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Apakah anda yakin?</h4>
            </div>
            <div class="modal-body">
                Data yang sudah terhapus tidak dapat dikembalikan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Tetap Hapus</a>
            </div>
        </div>
    </div>
</div>
