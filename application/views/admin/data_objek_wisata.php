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
            <h6 class="m-0 font-weight-bold text-primary">Data wisata</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddwisata">Tambah Wisata</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Objek Wisata</th>
                            <th>Nama Objek Wisata</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Actions</th>
                            <th style="display: none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataObjekWisata)) {
                                foreach ($dataObjekWisata as $wisata) {
                        ?>
                            <tr>
                                <td><?=$wisata->id_objek?></td>
                                <td><?=$wisata->nama_wisata?></td>
                                <td><?=rupiah($wisata->harga)?></td>
                                <td>
                                    <img id="gambar" style="width: 50px" src="<?php echo base_url() ?>upload/<?php echo $wisata->gambar; ?>" alt="">
                                </td>
                                <td>
                                    <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus objek wisata?');" name="delete" href="<?php echo base_url();?>admin/data_objek_wisata/delete/<?=$wisata->id_objek?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                                
                                <td style="display: none"><?=$wisata->harga?></td>
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
    <div class="modal fade" id="modalAddwisata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Objek Wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_add" enctype="multipart/form-data" action="<?php echo base_url();?>admin/data_objek_wisata" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama_objek_wisata">Nama Objek Wisata</label>
                                    <input type="text" name="nama_objek_wisata" class="form-control"
                                        id="nama_objek_wisata"
                                        placeholder="Masukan Nama Objek Wisata">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control"
                                        id="harga"
                                        placeholder="Masukan Harga">
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
    <div class="modal fade" id="modalEditwisata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" enctype="multipart/form-data" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="e_nama_objek_wisata">Nama Objek Wisata</label>
                                    <input type="text" name="e_nama_objek_wisata" class="form-control"
                                        id="e_nama_objek_wisata"
                                        placeholder="Masukan Nama Objek Wisata">
                                    <input type="text" name="e_id_objek_wisata" class="form-control" style="display: none"
                                        id="e_id_objek_wisata">
                                </div>
                                <div class="form-group">
                                    <label for="e_harga">Harga</label>
                                    <input type="text" name="e_harga" class="form-control"
                                        id="e_harga"
                                        placeholder="Masukan Harga">
                                </div>
                                <div class="form-group">
                                <label for="e_gambar">Gambar</label>
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
    $('.btnEdit').on('click', function() {
        $('#modalEditwisata').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();

        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/data_objek_wisata/');
        $('#e_id_objek_wisata').val(data[0])
        $('#e_nama_objek_wisata').val(data[1])
        $('#e_harga').val(data[5])
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