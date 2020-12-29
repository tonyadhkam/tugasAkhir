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
            <h6 class="m-0 font-weight-bold text-primary">Data Bus</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex flex-row justify-content-end align-items-center mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddBus">Tambah Bus</button>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Bus</th>
                            <th>Deskripsi Jenis Bus</th>
                            <th>Seat</th>
                            <th>Harga</th>
                            <th>Actions</th>
                            <th style="display: none"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataBus)) {
                                foreach ($dataBus as $bus) {
                        ?>
                            <tr>
                                <td><?=$bus->id_bus?></td>
                                <td><?=$bus->desc?></td>
                                <td><?=$bus->seat?></td>
                                <td><?= rupiah($bus->harga)?></td>
                                <td>
                                <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                <a onclick="return confirm('Apakah anda yakin untuk menghapus bus?');" href="<?php echo base_url();?>admin/data_bus/delete/<?=$bus->id_bus?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
                                </td>
                                <td style="display: none"><?=$bus->harga?></td>
                            </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="2">Data Kosong</td>
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
    <div class="modal fade" id="modalAddBus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Bus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_add" action="<?php echo base_url();?>admin/data_bus" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="desc">Deskripsi Jenis Bus</label>
                                    <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="Masukan Deskripsi Bus"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="seat">Seat</label>
                                    <input type="number" name="seat" class="form-control"
                                        id="seat"
                                        placeholder="Masukan Jumlah Seat">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control"
                                        id="harga"
                                        placeholder="Masukan Harga">
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
    <div class="modal fade" id="modalEditBus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Bus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="e_desc">Deskripsi Jenis Bus</label>
                                    <textarea class="form-control" name="e_desc" id="e_desc" rows="3" placeholder="Masukan Deskripsi Bus"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="e_seat">Seat</label>
                                    <input type="number" name="e_seat" class="form-control"
                                        id="e_seat"
                                        placeholder="Masukan Jumlah Seat">
                                </div>
                                <div class="form-group">
                                    <label for="e_harga">Harga</label>
                                    <input type="number" name="e_harga" class="form-control"
                                        id="e_harga"
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
        $('#modalEditBus').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        
        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/data_bus/'+data[0]);
        
        $('#e_desc').val(data[1])
        $('#e_seat').val(data[2])
        $('#e_harga').val(data[5])
        
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