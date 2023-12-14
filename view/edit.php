<style>
    .parsley-errors-list {
        list-style-type: none;
        padding-left: 0;
        font-weight: 400;
        font-size: 11px;
    }

    .parsley-errors-list.filled {
        color: #D43F3A;
        opacity: 1;
    }

    /* Styling notifikasi */
    .kode-alert {
        position: relative;
        padding: 15px;
        margin: 10px 0;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .kode-alert.alert1 {
        background-color: ##00a2ff;
        border-color: white;
        color: #ffffff
    }

    .closed {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #a94442;
        text-decoration: none;
    }
</style>
</style>


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
                <a href="<?php echo site_url('daftar/') ?>" class="btn btn-light"><i class="fa fa-times"></i> Batal</a>
            </div>
        </div>
        <!-- End Page Header Right Div -->

    </div>
    <!-- End Page Header -->

 <!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->
<div class="container-default">


<div class="row">


        <div class="col-md-6">
            <div class="panel panel-default">

            <div class="kode-alert alert1" id="notification">
    <h1 href="#" class="closed" onclick="closeNotification()">&times;</h1>
    Notifikasi berhasil disimpan.
</div>

 <script type="text/javascript">
        $(document).ready(function () {
            $('.closed').on('click', function () {
                $(this).closest('.kode-alert').fadeOut();
            });

            // Menyembunyikan notifikasi setelah beberapa detik
            setTimeout(function () {
                $('.kode-alert').fadeOut();
            }, 5000); // Misalnya, menyembunyikan notifikasi setelah 5 detik
        });
    </script>


                        <div class="panel-body">
                            <form action="" id="editbuku" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_buku" value="<?php echo $table_buku->id_buku ?>" />
                                
                                <div class="form-group">
                                    <label for="example3" class="form-label">Judul Buku</label>
                                    <input value="<?php echo $table_buku->judul_buku ?>" 
                                    class ="form-control form-control-line <?php echo form_error('judul_buku') ? 'is-invalid':'' ?>"
                                    type="text" name="judul_buku" placeholder="judul buku" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('judul_buku') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example5"  class="form-label">Penerbit Buku</label>
                                     <input value="<?php echo $table_buku->penerbit_buku ?>"
                                     class="form-control form-control-line <?php echo form_error('penerbit_buku') ? 'is-invalid':'' ?>" 
                                     type="text" name="penerbit_buku" placeholder="penerbit buku" />
                                    <div class="invalid-feedback has-error">
                                        <?php echo form_error('penerbit_buku') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example4" class="form-label">Kategori Buku</label>
                                    <input value="<?php echo $table_buku->kategori_buku ?>"
                                     class="form-control form-control-line <?php echo form_error('kategori_buku') ? 'is-invalid':'' ?>" 
                                      type="text" name="kategori_buku" placeholder="kategori buku" />
                                    <div class="invalid-feedback has-error">
                                        <?php echo form_error('kategori_buku') ?>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <label for="example4" class="form-label">Tanggal Terbit</label>
                                    <input value="<?php echo $table_buku->tanggal_terbit ?>"
                                     class="form-control form-control-line <?php echo form_error('tanggal_terbit') ? 'is-invalid':'' ?>" 
                                     type="date" name="tanggal_terbit" placeholder="tanggal terbit" />
                                    <div class="invalid-feedback has-error">
                                        <?php echo form_error('tanggal_terbit') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if(!empty($table_buku->cover_buku)) : ?>
                                        <img src="<?php echo base_url('uploads/'. $table_buku->cover_buku) ?>" alt="" width="128px">
                                    <?php else : ?>
                                        <span>Cover tidak tersedia</span>
                                    <?php endif; ?>
                                    <input type="hidden" class="form-control" name="cover_buku" value="<?php echo $table_buku->cover_buku; ?>">
                                    <div class="invalid-feedback has-error">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control form-control-line" name="cover_baru" value="<?php echo $table_buku->cover_buku?>">
                                </div>
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
