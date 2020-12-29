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
            <h6 class="m-0 font-weight-bold text-primary">Data Informasi Pemesan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="display: none">ID Data Pemesan</th>
                            <th>KD Transaksi</th>
                            <th>ID User</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Penjemputan</th>
                            <th>E-mail</th>
                            <th>No. Telepon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataPemesan)) {
                                foreach ($dataPemesan as $pemesan) {
                        ?>
                            <tr>
                                <td style="display: none"><?=$pemesan->id_detail_booking?></td>
                                <td><?=$pemesan->kd_booking?></td>
                                <td><?=$pemesan->id_user?></td>
                                <td><?=$pemesan->nik?></td>
                                <td><?=$pemesan->nama?></td>
                                <td><?=$pemesan->alamat?></td>
                                <td><?=$pemesan->email?></td>
                                <td><?=$pemesan->no_telepon?></td>
                                <td>
                                <button class="btn btn-primary btnEdit"><i class="fa fa-edit"></i> Edit</button>
                                </td>
                            </tr>
                        <?php
                                }
                            } else {
                        ?>
                            <tr>
                                <td colspan="7">Data Kosong</td>
                            <tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="modalEditPemesan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Pemesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_edit" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="e_nama_pemesan">Nama Lengkap</label>
                                    <input type="text" readonly name="e_nama_pemesan" class="form-control"
                                        id="e_nama_pemesan"
                                        placeholder="Masukan Nama Pemesan">
                                </div>
                                <div class="form-group">
                                    <label for="e_nama_pemesan">NIK</label>
                                    <input type="text" name="e_nik_pemesan" class="form-control"
                                        id="e_nik_pemesan"
                                        placeholder="Masukan NIK Pemesan">
                                </div>
                                <div class="form-group">
                                    <label for="e_alamat_pemesan">Alamat Penjemputan</label>
                                    <input type="text" name="e_alamat_pemesan" class="form-control"
                                        id="e_alamat_pemesan"
                                        placeholder="Masukan Alamat Pemesan">
                                </div>
                                <div class="form-group">
                                    <label for="e_email_pemesan">Email Pemesan</label>
                                    <input type="text" readonly name="e_email_pemesan" class="form-control"
                                        id="e_email_pemesan"
                                        placeholder="Masukan Email Pemesan">
                                </div>
                                <div class="form-group">
                                    <label for="e_no_telepon">No. Telepon</label>
                                    <input type="text" name="e_no_telepon" class="form-control"
                                        id="e_no_telepon"
                                        placeholder="Masukan No. Telepon Yang Dapat Dihubungi">
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
        $('#modalEditPemesan').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        
        let formAction = $('#form_edit');
        formAction = $('#form_edit').attr('action', '<?php echo base_url();?>admin/data_pemesan/'+data[0]);
        
        $('#e_nama_pemesan').val(data[4])
        $('#e_nik_pemesan').val(data[3])
        $('#e_alamat_pemesan').val(data[5])
        $('#e_email_pemesan').val(data[6])
        $('#e_no_telepon').val(data[7])
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