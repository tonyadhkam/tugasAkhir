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
            <h6 class="m-0 font-weight-bold text-primary">Data Paket Customize</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Request Paket</th>
                            <th>Fasilitas</th>
                            <th>Nama User</th>
                            <th>Bus</th>
                            <th>Hotel</th>
                            <th>Nama Objek Wisata</th>
                            <th>Harga Paket</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($dataCustomize)) {
                                foreach ($dataCustomize as $custom) {
                        ?>
                            <tr>
                                <td><?=$custom->id_request_paket?></td>
                                <td><?=$custom->nm_daftar_paket?></td>
                                <td><?=$custom->nm_depan?>
                                    <?=$custom->nm_belakang?>
                                </td>
                                <td><?=$custom->desc?></td>
                                <td><?=$custom->nama_hotel?></td>
                                <td>
                                <?php
                                    foreach ($custom->listObjekWisata as $key => $value) { ?>
                                    <?php
                                        echo "&bull; ";
                                        echo $value->nama_wisata ;
                                        echo "<br>";
                                    }
                                ?>
                                </td>
                                <td><?=$custom->harga_paket?></td>
                                <td><?=$custom->created?></td>
                                <td>
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus paket customize?');" name="delete" href="<?php echo base_url();?>admin/doDeleteCustomize/<?=$custom->id_request_paket?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus </a>
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
<script>
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