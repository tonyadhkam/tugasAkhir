<div class="container">
    
    <?php
    $notif = $this->session->flashdata('notif');
    $alert = $this->session->flashdata('alert');
    if (!empty($notif)) { ?>
        <div class="alert <?=$alert; ?> align-self-start">
            <?= $notif; ?>
        </div>
    <?php } ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Informasi wisata</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddinfowisata">Tambah wisata</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Info Wisata</th>
                            <th>Nama Wisata</th>
                            <th>Lokasi Wisata</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataInfoWisata)) {
                                foreach ($dataInfoWisata as $wisata) {
                        ?>
                            <tr>
                                <td><?=$wisata->id_info_wisata?></td>
                                <td><?=$wisata->nm_wisata?></td>
                                <td><?=$wisata->tempat_wisata?></td>
                                <td><?=$wisata->desc?></td>
                                <td>
                                    <img id="gambar" style="width: 50px" src="<?php echo base_url() ?>upload/<?php echo $wisata->gambar; ?>" alt="">
                                </td>
                                <td>
                                    <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus info wisata?');" name="delete" href="<?php echo base_url();?>admin/data_info_wisata/delete/<?=$wisata->id_info_wisata?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                                
                            </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="5">Data Kosong</td>
                            <tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="modalAddinfowisata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Tambah Info Wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                <form class="user" id="form_add" enctype="multipart/form-data" action="<?php echo base_url();?>admin/data_info_wisata" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama_objek_wisata">Nama Wisata</label>
                                    <input type="text" name="nm_wisata" class="form-control"
                                        id="nm_wisata"
                                        placeholder="Masukan Nama Wisata">
                                </div>
                                <div class="form-group">
                                <label for="harga">Lokasi Wisata</label>
                                    <input type="text" name="tempat_wisata" class="form-control"
                                        id="tempat_wisata"
                                        placeholder="Masukan Lokasi Tempat Wisata">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Deskripsi Wisata</label>
                                    <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Masukan Deskripsi Wisata"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" name="gambar">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="modalEditinfowisata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Edit Info Wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" enctype="multipart/form-data" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="e_nm_wisata">Lokasi Wisata</label>
                                    <input type="text" name="e_nm_wisata" class="form-control"
                                        id="e_nm_wisata"
                                        placeholder="Masukan Lokasi Tempat Wisata">
                                    <input type="text" name="e_id_info_wisata" class="form-control" style="display: none"
                                        id="e_id_info_wisata">
                                </div>
                                <div class="form-group">
                                    <label for="e_tempat_wisata">Tempat Wisata</label>
                                    <input type="text" name="e_tempat_wisata" class="form-control"
                                        id="e_tempat_wisata"
                                        placeholder="Masukan Lokasi Tempat Wisata">
                                </div>
                                <div class="form-group">
                                    <label for="e_desc">Deskripsi Wisata</label>
                                    <textarea class="form-control" name="e_desc" id="e_desc" rows="3" placeholder="Masukan Deskripsi Wisata"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="e_gambar"> Gambar</label>
                                    <input type="file" name="e_gambar">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="edit" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    CKEDITOR.replace('desc');
    CKEDITOR.replace('e_desc');
    $('.btnEdit').on('click', function() {
        $('#modalEditinfowisata').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).html();
        }).get();

        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/data_info_wisata/');
        $('#e_id_info_wisata').val(data[0])
        $('#e_nm_wisata').val(data[1])
        $('#e_tempat_wisata').val(data[2])
        CKEDITOR.instances['e_desc'].setData(data[3]);
        $('#e_gambar').val(data[4])
        
    });
    $( document ).ready(function() {
        $('#dataTable').DataTable();
        <?php if (!empty($notif)) { ?>
            let alert = $('.alert');
            setTimeout(() => {
                alert.css('display', 'none');
            }, 3000);
        <?php } ?>
        
    });

</script>