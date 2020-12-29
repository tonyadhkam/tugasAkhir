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
            <h6 class="m-0 font-weight-bold text-primary">Data Daftar Paket</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddDaftarPaket">Tambah Daftar Paket</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Fasilitas</th>
                            <th>Nama Daftar Paket</th>
                            <th>Deskripsi Fasilitas Paket</th>
                            <th>Harga</th>
                            <th>Actions</th>
                            <th style="display: none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataDaftarPaket)) {
                                foreach ($dataDaftarPaket as $paket) {
                        ?>
                            <tr>
                                <td><?=$paket->id_fasilitas?></td>
                                <td><?=$paket->nm_daftar_paket?></td>
                                <td><?=$paket->deskripsi_fasilitas?></td>
                                <td><?=rupiah($paket->harga)?></td>
                                <td>
                                    <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus daftar paket?');" href="<?php echo base_url();?>admin/data_daftar_paket/delete/<?=$paket->id_fasilitas?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                                <td style="display: none"><?=$paket->harga?></td>
                            </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="4">Data Kosong</td>
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
    <div class="modal fade" id="modalAddDaftarPaket" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Daftar Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_add" action="<?php echo base_url();?>admin/data_daftar_paket" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nm_daftar_paket">Nama Daftar Paket</label>
                                    <input type="text" name="nm_daftar_paket" class="form-control"
                                        id="nm_daftar_paket"
                                        placeholder="Masukan Nama Daftar Paket">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_fasilitas">Deskripsi Fasilitas Paket</label>
                                    <textarea class="form-control" name="deskripsi_fasilitas" id="deskripsi_fasilitas" rows="7" placeholder="Masukan Deskripsi Fasilitas"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="harga_fasilitas">Harga</label>
                                    <input type="number" name="harga_fasilitas" class="form-control"
                                        id="harga_fasilitas"
                                        placeholder="Masukan Harga Daftar Paket">
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="add" class="btn btn-primary btn-block" value="Save" />
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="modalEditDaftarPaket" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Daftar Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="e_nm_daftar_paket">Nama Daftar Paket</label>
                                    <input type="text" name="e_nm_daftar_paket" class="form-control"
                                        id="e_nm_daftar_paket"
                                        placeholder="Masukan Nama Fasilitas">
                                </div>
                                <div class="form-group">
                                    <label for="e_deskripsi_fasilitas">Deskripsi Fasilitas Paket</label>
                                    <textarea class="form-control" name="e_deskripsi_fasilitas" id="e_deskripsi_fasilitas" rows="7" placeholder="Masukan Deskripsi Fasilitas"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="e_harga_fasilitas">Harga</label>
                                    <input type="number" name="e_harga_fasilitas" class="form-control"
                                        id="e_harga_fasilitas"
                                        placeholder="Masukan Harga">
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
        $('#modalEditDaftarPaket').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        
        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/data_daftar_paket/'+data[0]);
        
        $('#e_nm_daftar_paket').val(data[1])
        $('#e_deskripsi_fasilitas').val(data[2])
        $('#e_harga_fasilitas').val(data[5])
        
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