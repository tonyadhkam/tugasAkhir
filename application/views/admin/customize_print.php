<section class="content">
  <div class="row">
    <div class="col-lg-12">
		<div class="card">
		  <a href="#" class="btn btn-info"><strong>Report Table of Tour Transaction</strong></a>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
          <table class="table table-bordered" id="trx-print-table2" width="100%" cellspacing="0">
                    <thead>
                        <tr>    
                            <th style="display: none">ID Paket</th>
                            <th>KD Transaksi</th>
                            <th>Pemesan</th>
                            <th>Bus</th>
                            <th>Hotel</th>
                            <th>Fasilitas</th>
                            <th>Objek Wisata</th>
                            <th>Harga</th>
                            <th>Bukti Trf</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($trxr)) {
                                foreach ($trxr as $paket) {
                        ?>
                            <tr>
                                <td style="display: none"><?=$paket->id_transaksi_request?></td>
                                <td><?=$paket->kd_transaksi_request?></td>
                                <td><?=$paket->nm_depan?> <?=$paket->nm_belakang?></td>
                                <td>Kapasitas Kursi: <?=$paket->seat?></td>
                                <td><?=$paket->nama_hotel?>, Bintang <?=$paket->bintang?></td>
                                <td><?=$paket->nm_daftar_paket?></td>
                                <td><?=$paket->nama_wisata?></td>
                                <td>Rp. <?=number_format($paket->harga_paket)?></td>
                                <td>
                                <?php if($paket->gambar_bukti!='null'){ ?>
                                    <a href="<?=base_url('upload/')?><?=$paket->gambar_bukti?>" target="_blank"><img class="image-responsive" style="width:150px;" src="<?=base_url('upload/')?><?=$paket->gambar_bukti?>"/></a>
                                <?php } else { echo "Belum Transfer"; } ?>
                                </td>
                                <td>
                                    <?php if($paket->status=='Menunggu Pembayaran'){
                                        echo "<a class='btn btn-warning btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Menunggu Verifikasi'){
                                        echo "<a class='btn btn-info btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Proses'){
                                        echo "<a class='btn btn-primary btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Selesai'){
                                        echo "<a class='btn btn-success btn-sm text-light'>$paket->status</a>";
                                    } else if($paket->status=='Dibatalkan'){
                                        echo "<a class='btn btn-danger btn-sm text-light'>$paket->status</a>";
                                    } ?>
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
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div><!-- ./col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<script>
	$(document).ready(function() {
	var trx_print_table = $('#trx-print-table2').DataTable({
      dom: 'Bfrtip',
      buttons: [
          {
             extend: 'copy',
             className: 'btn btn-default'
          },
          {
             extend: 'csv',
             className: 'btn btn-default'
          },
          {
             extend: 'excel',
             className: 'btn btn-default'
          },
          {
             extend: 'pdf',
             className: 'btn btn-default'
          },
          {
             extend: 'print',
             className: 'btn btn-default'
          }
      ],
    });
	});
</script>
