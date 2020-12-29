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
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="display: none">ID Transaksi</th>
                            <th>KD Transaksi</th>
                            <th>ID Paket</th>
                            <th>Nama Paket</th>
                            <th>Pemesan</th>
                            <th>Titik Jemput</th>
                            <th>Kantor Cabang</th>
                            <th>Tgl Booking</th>
                            <th>Tgl Tour</th>
                            <th>Jumlah Peserta</th>
                            <th>Harga Paket</th>
                            <th>Kategori</th>
                            <th>Bukti Trf</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($trx)) {
                                foreach ($trx as $paket) {
                        ?>
                            <tr>
                                <td style="display: none"><?=$paket->id_transaksi?></td>
                                <td><?=$paket->kd_transaksi?></td>
                                <td><?=$paket->id_paket_wisata?></td>
                                <td><?=$paket->nm_paket_wisata?></td>
                                <td><?=$paket->nama?></td>
                                <td><?=$paket->titik_jemput?></td>
                                <td><?=$paket->nama_kota?></td>
                                <td><?=$paket->booking_date?></td>
                                <td><?=$paket->tour_date?></td>
                                <td><?=$paket->jml_peserta?></td>
                                <td>Rp. <?=number_format($paket->total_harga)?></td>
                                <td><?=$paket->kategori?></td>
                                <td>
                                    <?php if($paket->gambar_bukti !='null'){ ?>
                                        <a href="<?=base_url('upload/')?><?=$paket->gambar_bukti?>" target="_blank"><img class="image-responsive" style="width:150px;" src="<?=base_url('upload/')?><?=$paket->gambar_bukti?>"/></a>
                                    <?php } else { echo "Belum Transfer"; } ?>
                                </td>
                                <td>
                                    <?php if($paket->status=='Menunggu Validasi Paket'){
                                        echo "<a class='btn btn-success btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Menunggu Verifikasi'){
                                        echo "<a class='btn btn-info btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Menunggu Pembayaran'){
                                        echo "<a class='btn btn-warning btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Proses'){
                                        echo "<a class='btn btn-primary btn-sm text-light'>$paket->status</a>";
                                    } ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning" id="btn-edit-transaction" data-id="<?=$paket->id_transaksi?>" data-toggle="modal" data-target="#myTrxEditModal" style="color:white;"><i class="fa fa-edit"></i> Edit</a>
                                    <a onclick="return confirm('Apakah anda yakin untuk menghapus transaksi?');" href="<?php echo base_url();?>admin/data_transaksi/delete/<?=$paket->id_transaksi?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
    <br/><br/>

    <!-- Add Modal -->
    <div class="modal fade" id="myTrxEditModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Status Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="user" id="form_add" action="<?php echo base_url();?>admin/data_transaksi" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input id="id-trx-edit" name="idtransaction" type="hidden" value="">
                                    <select class="form-control" name="status" required>
                                        <option value="">- Pilih Status -</option>
                                        <option value="Menunggu Validasi Paket">Menunggu Validasi Paket</option>
                                        <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                        <option value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                        <option value="Proses">Sudah Diterima</option>
                                        <option value="Dibatalkan">Batalkan/Tolak</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div><br/>
                        <input type="submit" name="save" class="btn btn-primary btn-block" value="Simpan" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script>
    $( document ).ready(function() {
        $('#dataTable').DataTable();
        $('#dataTable2').DataTable();
        <?php if (!empty($notif)) { ?>
            let alert = $('.alert');
            setTimeout(() => {
                alert.css('display', 'none');
            }, 3000);
        <?php } ?>
    });
</script>